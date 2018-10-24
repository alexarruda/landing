<?php

/**
 * AdminLead [ MODEL ]
 * Responsável por gerenciar as categorias do sistema no admin
 * @copyright (c) 2016, Alex Developer
 */
class AdminLead {

    private $Data;
    private $LeadId;
    private $Error;
    private $Result;

    // Nome da tabela no banco de dados
    const Entity = 'lead';

    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ['<b>Erro ao Cadastrar:</b> Para concluir o cadastro do Contato, preencha todos os campos!', WS_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->Create();
        endif;
    }

    public function ExeUpdate($LeadId, array $Data) {
        $this->LeadId = (int) $LeadId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao Atualizar:</b> Para atualizar o Contato {$this->Data['lead_name']}, preencha todos os campos!", WS_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->Update();
        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getError() {
        return $this->Error;
    }

    // PRIVATE 
    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['lead_date'] = Check::Data($this->Data['lead_date']);
    }

    private function setName() {
        $Where = (!empty($this->LeadId) ? "lead_id != {$this->LeadId} AND" : '');

        $readName = new Read;
        $readName->ExeRead(self::Entity, "WHERE {$Where} lead_name = :t", "t={$this->Data['lead_name']}");

        if ($readName->getResult()):
            $this->Data['lead_name'] = $this->Data['lead_name'] . "-" . $readName->getRowCount();
        endif;
    }

    private function Create() {
        $create = new Create;
        $create->ExeCreate(self::Entity, $this->Data);

        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Error = ["<b>Sucesso!</b> O contato {$this->Data['lead_name']} foi cadastrado.", WS_ACCEPT];
        endif;
    }

    private function Update() {
        $update = new Update;
        $update->ExeUpdate(self::Entity, $this->Data, "WHERE lead_id = :leadid", "leadid={$this->LeadId}");

        if ($update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso!</b> O contato {$this->Data['lead_name']} foi atualizado.", WS_ACCEPT];
        endif;
    }

}
