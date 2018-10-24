<?php

/**
 * Upload [ HELPER ]
 * Responsável por fazer  upload de imagens, arquivos e midia para o sistema
 * 
 * @copyright (c) 2015, Alex Developer
 */
class Upload {

    private $File;
    private $Name;
    private $Send;

    /** IMAGE UPLOAD */
    private $Width;
    private $Image;

    /** RESULT SET */
    private $Result;
    private $Error;

    /** DIRETÓRIOS */
    private $Folder;
    private static $BaseDir;

    function __construct($BaseDir = null) {

        self::$BaseDir = ((string) $BaseDir ? $BaseDir : '../uploads/');

        if (!file_exists(self::$BaseDir) && !is_dir(self::$BaseDir)):

            mkdir(self::$BaseDir, 0777);

        endif;
    }

    public function Image(array $Image, $Name = null, $Width = null, $Folder = null) {
        $this->Image = $Image;
        $this->Name = ((string) $Name ? $Name : substr($Image['name'], 0, strrpos($Image['name'], '.')));
        $this->Width = ((int) $Width ? $Width : 1024);
        $this->Folder = ((string) $Folder ? $Folder : 'images');

        $this->CheckFolder($this->Folder);
        $this->setFileName();
        $this->UploadImage();
    }

    public function File(array $File, $Name = null, $Folder = null, $MaxFileSize = null) {
        $this->File = $File;
        $this->Name = ((string) $Name ? $Name : substr($File['name'], 0, strpos($File['name'], '.')));
        $this->Folder = ((string) $Folder ? $Folder : 'files');
        $MaxFileSize = ((int) $MaxFileSize ? $MaxFileSize : 2);

        $FileAccept = [
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf'
        ];

        if ($this->File['size'] > ($MaxFileSize * (1024 * 1024))):
            $this->Result = false;
            $this->Error = "Arquivo grande! tamanho máximo {$MaxFileSize}Mb";
        elseif (!in_array($this->File['type'], $FileAccept)):
            $this->Result = false;
            $this->Error = 'Apenas Arquivos tipo .DOCX e .PDF';
        else:
            $this->CheckFolder($this->Folder);
            $this->setFileName();
            $this->MoveFile();
        endif;
    }
    
    public function Media(array $Media, $Name = null, $Folder = null, $MaxFileSize = null) {
        $this->File = $Media;
        $this->Name = ((string) $Name ? $Name : substr($Media['name'], 0, strpos($Media['name'], '.')));
        $this->Folder = ((string) $Folder ? $Folder : 'midias');
        $MaxFileSize = ((int) $MaxFileSize ? $MaxFileSize : 40);

        $FileAccept = [
            'audio/mp3',
            'video/mp4'
        ];

        if ($this->File['size'] > ($MaxFileSize * (1024 * 1024))):
            $this->Result = false;
            $this->Error = "Arquivo grande! tamanho máximo {$MaxFileSize}Mb";
        elseif (!in_array($this->File['type'], $FileAccept)):
            $this->Result = false;
            $this->Error = 'Apenas Media tipo .MP3 e .MP4';
        else:
            $this->CheckFolder($this->Folder);
            $this->setFileName();
            $this->MoveFile();
        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getError() {
        return $this->Error;
    }

    /*     * ************************************
     * *********** METODOS PRIVATE **********
     * ************************************* */

    // Verifica e cria os diretórios com base em tipos de arquivos, ano e mês!
    public function CheckFolder($Folder) {
        list($y, $m) = explode('/', date('Y/m'));
        $this->CreateFolder("{$Folder}");
        $this->CreateFolder("{$Folder}/{$y}");
        $this->CreateFolder("{$Folder}/{$y}/{$m}/");

        $this->Send = "{$Folder}/{$y}/{$m}/";
    }

    // Verifica e cria o diretório base!
    public function CreateFolder($Folder) {
        if (!file_exists(self::$BaseDir . $Folder) && !is_dir(self::$BaseDir . $Folder)):
            mkdir(self::$BaseDir . $Folder, 0777);
        endif;
    }

    // Verifica e monta o nome dos arquivos tratando a String!
    public function setFileName() {
        $FileName = Check::Name($this->Name) . strrchr($this->File['name'], '.');

        if (file_exists(self::$BaseDir . $this->Send . $FileName)):
            $FileName = Check::Name($this->Name) . '-' . time() . strrchr($this->File['name'], '.');
        endif;

        $this->Name = $FileName;
    }

    // Realiza  o upload  de imagens redimensionando a mesma!
    private function UploadImage() {

        switch ($this->File['type']):
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                $this->Image = imagecreatefromjpeg($this->File['tmp_name']);
                break;
            case 'image/png':
            case 'image/x-png':
                $this->Image = imagecreatefrompng($this->File['tmp_name']);
                break;
        endswitch;

        if (!$this->Image):
            $this->Result = false;
            $this->Error = 'Tipo de arquivo inválido. envia apenas JPG ou PNG!';
        else:
            $x = imagesx($this->Image);
            $y = imagesy($this->Image);
            $ImageX = ($this->Width < $x ? $this->Width : $x);
            $ImageH = ($ImageX * $y) / $x;

            $NewImage = imagecreatetruecolor($ImageX, $ImageH);
            imagealphablending($NewImage, false);
            imagesavealpha($NewImage, true);
            imagecopyresampled($NewImage, $this->Image, 0, 0, 0, 0, $ImageX, $ImageH, $x, $y);

            switch ($this->File['type']):
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewImage, self::$BaseDir . $this->Send . $this->Name);
                    break;
                case 'image/png':
                case 'image/x-png':
                    imagepng($NewImage, self::$BaseDir . $this->Send . $this->Name);
                    break;
            endswitch;

            if (!$NewImage):
                $this->Result = false;
                $this->Error = " Tipo de arquivo inválido. envie apenas JPG e PNG!!! $x $y $ImageX $ImageH";
            else:
                $this->Result = $this->Send . $this->Name;
                $this->Error = null;
            endif;

            imagedestroy($this->Image);
            imagedestroy($NewImage);
        endif;
    }

    /** Envia Arquivos e Midias */
    private function MoveFile() {
        if (move_uploaded_file($this->File['tmp_name'], self::$BaseDir . $this->Send . $this->Name)) :
            $this->Result = $this->Send . $this->Name;
            $this->Error = null;
        else:
            $this->Result = false;
            $this->Error = "Erro ao mover o Arquivo! tente novamente!";
        endif;
    }

}
