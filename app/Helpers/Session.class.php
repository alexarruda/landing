<?php

/**
 * Session [ HELPER ]
 * Resposável pelas estatisticas, sessoes e atualizacoes de trafego do sistema!
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Session {

    private $Date;
    private $Cache;
    private $Traffic;
    private $Browser;

    function __construct($Cache = null) {
        session_start();
        $this->CheckSession($Cache);
    }

    private function CheckSession($Cache = null) {
        $this->Date = date('Y-m-d');
        $this->Cache = ((int) $Cache ? $Cache : 20);

        if (empty($_SESSION["useronline"])):
            $this->setTraffic();
            $this->setSession();
            $this->CheckBrowser();
            $this->BrowserUpdate();
            $this->setUsuario();
        else:
            $this->TrafficUpdate();
            $this->sessionUpdate();
            $this->CheckBrowser();
            $this->UsuarioUpdate();
        endif;

        $this->Date = null;
    }

    /*     * *********************************** 
     * ******* SESSAO DO USUARIO **********
     * ********************************** */

    // Inicia a sessão do usuário
    private function setSession() {
        $_SESSION["useronline"] = [
            "online_session" => session_id(),
            "online_startview" => date('Y-m-d'),
            "online_endview" => date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes")),
            "online_ip" => filter_input(INPUT_SERVER, "REMOTE_ADDR", FILTER_VALIDATE_IP),
            "online_url" => filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_DEFAULT),
            "online_agent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT", FILTER_DEFAULT)
        ];
    }

    // Atualiza a sessão do usuario
    private function sessionUpdate() {
        $_SESSION["useronline"]["online_endview"] = date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes"));
        $_SESSION["useronline"]["online_url"] = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_DEFAULT);
    }

    /*     * ************************************ 
     * * USUARIOS, VISITAS E ATUALIZACOES **
     * *********************************** */

    // Verifica e insere o trafego na tabela
    private function setTraffic() {
        $this->getTraffic();

        if (!$this->Traffic):
            $ArrSiteViews = ['siteviews_date' => $this->Date, 'siteviews_users' => 1, 'siteviews_views' => 1, 'siteviews_pages' => 1];
            $createSiteViews = new Create;
            $createSiteViews->ExeCreate('ws_siteviews', $ArrSiteViews);
        else:
            if (!$this->getCookie()):
                $ArrSiteViews = ['siteviews_users' => $this->Traffic['siteviews_users'] + 1, 'siteviews_views' => $this->Traffic['siteviews_views'] + 1, 'siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
            else:
                $ArrSiteViews = ['siteviews_views' => $this->Traffic['siteviews_views'] + 1, 'siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
            endif;

            $updateSiteViews = new Update;
            $updateSiteViews->ExeUpdate('ws_siteviews', $ArrSiteViews, 'WHERE siteviews_date = :date', "date={$this->Date}");
        endif;
    }

    // Verifica e Atualiza os pageviews (TRAFFIC)
    private function TrafficUpdate() {
        $this->getTraffic();
        $ArrSiteViews = ['siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
        $updatePagesViews = new Update;
        $updatePagesViews->ExeUpdate('ws_siteviews', $ArrSiteViews, 'WHERE siteviews_date = :date', "date={$this->Date}");

        $this->Traffic = null;
    }

    // Obtem dados da tabela [ HELPER TRAFFIC ] // ws_siteviews
    private function getTraffic() {
        $readSiteViews = new Read;
        $readSiteViews->ExeRead('ws_siteviews', 'WHERE siteviews_date = :date', "date={$this->Date}");

        if ($readSiteViews->getRowCount()):
            $this->Traffic = $readSiteViews->getResult()[0];
        endif;
    }

    // Verifica, cria e atualiza cookie do usuario [ HELPER TRAFFIC ]
    private function getCookie() {
        $Cookie = filter_input(INPUT_COOKIE, 'useronline', FILTER_DEFAULT);

        // time() + 86400 (tempo de 24hr)
        setcookie("useronline", base64_encode("Alex Developer"), time() + 86400);

        if (!$Cookie):
            return false;
        else:
            return true;
        endif;
    }

    /*     * *********************************** 
     * ***** NAVEGADORES DE ACESSO ********
     * ********************************** */

    // Identifica o Browser do usuario!
    private function CheckBrowser() {
        $this->Browser = $_SESSION['useronline']['online_agent'];

        if (strpos($this->Browser, 'Chrome')):
            $this->Browser = 'Chrome';
        elseif (strpos($this->Browser, 'Firefox')):
            $this->Browser = 'Firefox';
        elseif (strpos($this->Browser, 'MSIE') || strpos($this->Browser, 'Trident/')):
            $this->Browser = 'IE';
        else:
            $this->Browser = 'Outros';
        endif;
    }

    // Atualiza tabela com dados do navegadores
    private function BrowserUpdate() {
        $readAgent = new Read;
        $readAgent->ExeRead('ws_siteviews_agent', "WHERE agent_name = :agent", "agent={$this->Browser}");

        if (!$readAgent->getResult()):
            $ArrAgent = ['agent_name' => $this->Browser, 'agent_views' => 1];
            $createAgent = new Create;
            $createAgent->ExeCreate('ws_siteviews_agent', $ArrAgent);
        else:
            $ArrAgent = ['agent_views' => $readAgent->getResult()[0]['agent_views'] + 1];
            $updateAgent = new Update;
            $updateAgent->ExeUpdate('ws_siteviews_agent', $ArrAgent, "WHERE agent_name = :name", "name={$this->Browser}");
        endif;
    }

    /*     * *********************************** 
     * ******** USUARIOS ONLINE ***********
     * ********************************** */

    // Cadastra usuario ONline na tabela
    private function setUsuario() {
        $sesOnline = $_SESSION['useronline'];
        $sesOnline['agent_name'] = $this->Browser;

        $userCreate = new Create;
        $userCreate->ExeCreate('ws_siteviews_online', $sesOnline);
    }

    // Atualiza navegacao do usuario online!
    private function UsuarioUpdate() {
        $ArrOnline = [
            'online_endview' => $_SESSION['useronline']['online_endview'],
            'online_url' => $_SESSION['useronline']['online_url']
        ];

        $userUpdate = new Update;
        $userUpdate->ExeUpdate('ws_siteviews_online', $ArrOnline, "WHERE online_session = :ses", "ses={$_SESSION['useronline']['online_session']}");

        if (!$userUpdate->getRowCount()):
            $readSes = new Read;
            $readSes->ExeRead('ws_siteviews_online', 'WHERE online_session = :onses', "onses={$_SESSION['useronline']['online_session']}");

            if (!$readSes->getRowCount()):
                $this->setUsuario();
            endif;
        endif;
    }

}