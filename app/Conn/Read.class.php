<?php

/**
 * <b>Read.class</b> 
 * Classe responsavel pela leitura generica dos dados no DB
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Read extends Conn {

    private $Select;
    private $Places;
    private $Result;

    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    /**
     * <b>ExeRead:</b> Executa a leitura dos dados ao receber os paremetros necessarios
     * 
     * @param STRING $Tabela = Informe o nome da tabela no DB.
     * @param STRING $Termos = Se houver clausula WHERE devera ser informado.
     * @param STRING $ParseString = Valores para a ser inserido.
     */
    public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
        
        if (!empty($ParseString)):
            parse_str($ParseString, $this->Places);
        endif;
        
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        
        $this->Execute();
    }

    /**
     * <b>Metodo getResult:</b> Retorna FALSE ou retorna o ultimo valor inserido
     * com sucesso no banco de dados.
     */
    public function getResult() {
        return $this->Result;
    }
    
    /** Retorna a quantidade de linha proveniente da busca efetuada */
    public function getRowCount() {
        return $this->Read->rowCount();
    }
      
    /**
     * <b>Full Read:</b> Utilizado para efetuar o 
     * SELECT todo de uma unica vez
     * 
     * @param STRING $Query = Informe a expressão da consulta.
     * @param STRING $ParseString = Informe Valores para a consulta.
     */
    public function FullRead($Query, $ParseString = null) {
        $this->Select = (string) $Query;
        
        if(!empty($ParseString)):
            parse_str($ParseString, $this->Places);
        endif;
        
        $this->Execute();
    }
    
    /**
     * <b>setPlaces:</b> Utilizado para manipular apenas os valores  
     * 
     * @param STRING $ParseString = Informe Valores para a consulta.
     */
    public function setPlaces($ParseString) {
        
        parse_str($ParseString, $this->Places);
        
        $this->Execute();
    }

    /*     * ****************************************
     * ********* METODOS PRIVADOS ***************
      +**************************************** */

    // Obtem o PDO e prepara a query
    private function Connect() {
        
        $this->Conn = parent::getConn();
        
        $this->Read = $this->Conn->prepare($this->Select);
        
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }

    // Cria a sintaxe da query para prepared statement
    private function getSyntax() {
        
        if($this->Places):
            foreach ($this->Places as $Vinculo => $Valor):
                if($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int) $Valor;
                endif;
                
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
                
            endforeach;
        endif;
    }

    // Utiliza o metodo Connect() e a Syntax() para executar a query!
    private function Execute() {
        
        $this->Connect();
        
        try {
            
            $this->getSyntax();
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
            
        } catch (PDOException $e) {
            
            $this->Result;
            WSErro("<b>Erro ao efetuar a leitura: </b> {$e->getMessage()}", $e->getCode());
            
        }
    }

}
