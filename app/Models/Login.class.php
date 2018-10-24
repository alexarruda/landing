<?php

/**
 * Login [ MODEL ]
 * Responsável por autenticar, validar e checar usuário do sistema de login! 
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Login {

    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Infroma nivel: </b>Informe o nivel de acesso minimo para areas restritas.
     * @param INT $Level = Nível minímo para acesso!
     */
    function __construct($Level) {
        $this->Level = (int) $Level;
    }

    /**
     * <b>Efetuar login: </b>Envelope um array atributivo com indices STRING user [email], STRING pass.
     * Ao passar este array no ExeLogin() os dados são verificados e o login é feito! 
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin($UserData) {
        $this->Email = (string) strip_tags(trim($UserData['user']));
        $this->Senha = (string) strip_tags(trim($UserData['pass']));
        $this->setLogin();
    }

    /**
     * <b>Verificar Login: </b>Executenado o getResult é possivel verificar se foi ou não efetuado
     * acesso aos dados
     * @return BOOL $Var = true para login e false para erro
     */
    function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro: </b>Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associativo com o erro.
     * @param INT $Level = Nível minímo para acesso!
     */
    function getError() {
        return $this->Error;
    }

    /**
     * <b>Chrcar Login: </b>Execute este metodo para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritivas
     * @return BOOLEAN $login = Retorna true ou mata a sessão e retorna false
     */
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['user_level'] < $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
    }

    /* ########################################
     * ############## PRIVATE #################
     * #######################################
     */

    // Valida os dados e armazena os erros caso exitam. Executa login! 
    private function setLogin() {
        if (!$this->Email || !$this->Senha || !Check::Email($this->Email)):
            $this->Error = ['Informe Usuário e Senha', WS_INFOR];
            $this->Result = false;
        elseif (!$this->getUser()):
            $this->Error = ['Dados incorretos (Usuário ou Senha Inválido!)', WS_ALERT];
            $this->Result = false;
        elseif ($this->Result['user_level'] < $this->Level):
            $this->Error = ["Desculpe {$this->Result['user_name']}, você não tem acesso a está área! ", WS_ERROR];
            $this->Result = false;
        else:
            $this->Execute();
        endif;
    }

    // Verifica usuario e senha no banco de dados!
    private function getUser() {
        $this->Senha = md5($this->Senha);
        
        $read = new Read;
        $read->ExeRead('ws_users', 'WHERE user_email = :e AND user_password = :p', "e={$this->Email}&p={$this->Senha}");

        if ($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }
    
    // Executa login e armazena a sessão
    private function Execute() {
        if (!session_id()):
            session_start();
        endif;

        $_SESSION['userlogin'] = $this->Result;
        $this->Error = ["Bemvindo {$this->Result['user_name']}, aguarde redirecionamento!", WS_ACCEPT];
        $this->Result = true;
    }
    
    private function RecuperaSenha() {
        
    }
}
