<?php

/**
 * <b>Delete.class</b> 
 * Classe responsavel pela Exclusão generica dos dados no DB
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Delete extends Conn {

    private $Tabela;
    private $Termos;
    private $Places;
    private $Result;

    /** @var PDOStatement */
    private $Delete;

    /** @var PDO */
    private $Conn;

    public function ExeDelete($Tabela, $Termos, $ParseString) {
        $this->Tabela = (string) $Tabela;
        $this->Termos = (string) $Termos;
        
        parse_str($ParseString, $this->Places);
        
        $this->getSyntax();
        $this->Execute();
    }

    public function getResult() {
        return $this->Result;
    }

    public function getRowCount() {
        return $this->Delete->rowCount();
    }

    // serve para executar StoredProcedures
    public function setPlaces($ParseString) {

        parse_str($ParseString, $this->Places);

        $this->getSyntax();

        $this->Execute();
    }

    /*     * ****************************************
     * ********* METODOS PRIVADOS ***************
      +**************************************** */

    // Obtem o PDO e prepara a query
    private function Connect() {

        $this->Conn = parent::getConn();

        $this->Delete = $this->Conn->prepare($this->Delete);
    }

    // Cria a sintaxe da query para prepared statement
    private function getSyntax() {
        $this->Delete = "DELETE FROM {$this->Tabela} {$this->Termos}";
    }

    // Utiliza o metodo Connect() e a Syntax() para executar a query!
    private function Execute() {
        $this->Connect();
        
        try {
            
            $this->Delete->execute($this->Places);
            $this->Result = true;
            
        } catch (PDOException $e) {
            
            $this->Result = null;
            WSErro("<b>Ops! Não foi possível Excluir o registro:</b> {$e->getMessage()}", $e->getCode());
            
        }
        
    }

}
