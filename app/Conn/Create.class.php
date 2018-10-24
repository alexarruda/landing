<?php

/**
 * <b>Create.class</b> 
 * Classe responsavel pela inserção generica no DB
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Create extends Conn {
    
    private $Tabela;
    private $Dados;
    private $Result;
    
    /** @var PDOStatement */
    private $Create;
    
    /** @var PDO */
    private $Conn;
    
    /** 
     * <b>Metodo ExeCreate:</b> Executa um cadastro simples no banco de dados utilizando
     * prepared statements. Informe o nome da tabela e um array com nome da coluna e valor!
     * 
     * @param STRING $Tabela = Informe o nome da tabela (mesmo do DB)
     * @param ARRAY $Dados = Informe um array atribuitivo ( Nome coluna -> Valor )
     */
    public function ExeCreate($Tabela, array $Dados) {
        
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        
        $this->getSyntax();
        $this->Execute();
    }
    
    /** 
     * <b>Metodo getResult:</b> Retorna FALSE ou retorna o ultimo valor inserido
     * com sucesso no banco de dados.
     */
    public function getResult() {
        return $this->Result;
    }
     
    /******************************************
    ********** METODOS PRIVADOS ***************
    +*****************************************/
    
    // Obtem o PDO e prepara a query
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($this->Create);
    }
    
    // Cria a sintaxe da query para prepared statement
    private function getSyntax() {
        $Fileds = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $this->Create = "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
    }
    
    // Utiliza o metodo Connect() e a Syntax() para executar a query!
    private function Execute() {
        
        $this->Connect();
        
        try {
            
            $this->Create->execute($this->Dados);
            $this->Result = $this->Conn->lastInsertId();
            
        } catch (PDOException $e) {
            
            $this->Result = null;
            WSErro("<b>Ops! Erro no cadastro: </b>{$e->getMessage()}", $e->getCode());
            
        }
        
    }
}
