<?php
class FileUploadService{
    private $uploadDir;

    public function __construct($uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    public function upload($file){
        if(!empty($file['name'])){
            #concatenação com uniqid permite criação de um identificador que evita sobreposição de imagem em nomes iguais
            $fileName = uniqid().$file['name'];
            $fileDir = $this->uploadDir.DIRECTORY_SEPARATOR.$fileName;

            move_uploaded_file($file['tmp_name'],$fileDir);

            return $fileName;
        }
        return "";
    }
}
?>