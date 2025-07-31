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

    #método responsável por armazenar várias imagens ao mesmo tempo
    public function multUpload($files, $imovelId){
        $fileNames = [];
        $fileDir = $this->uploadDir.DIRECTORY_SEPARATOR."casa".$imovelId;

        if(!is_dir($fileDir)){
            mkdir($fileDir, 0777, true);
        }

        if(is_array($$files['name'])){
            foreach($files['name'] as $key=>$value){
                if(!empty($value)){
                    $fileName = uniqid().'-'.$value;
                    $saveDir = $fileDir.DIRECTORY_SEPARATOR.$fileNames;

                    if(move_uploaded_file($files['tmp_name'][$key], $saveDir)){
                        $fileNames[] = 'casa'.$imovelId.DIRECTORY_SEPARATOR.$fileName;
                    }
                }
            }
        }
        return $fileNames;
    }
}
?>