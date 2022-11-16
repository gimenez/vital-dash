<?php

class Cpfl extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
        
	}

    public function uploadFile()
    {
        $filePath = $this->saveFile();

        if ($filePath) {
            $result = $this->readFile($filePath);
        }
        
        if (!empty($result))
            redirect('/system/index/');
    }

    public function saveFile()
    {
        $folder = date('Y-m-d');
        $path = "./uploads/".$folder. "/";

        if ( ! is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }

        $uploaddir  = $path;
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } else {
            return false;
        }
    }

    public function readFile($filePath)
    {
        if (file_exists($filePath)) {
            
            $data = [];
            $lista = file_get_contents($filePath);
            $lista_array = explode("\n", $lista);

            foreach($lista_array as $lista_item) {
                if (isset($lista_item[0]) && $lista_item[0] != 1 && $lista_item[0] !=9)
                    array_push($data, [
                        'tipoRegistro'          => substr($lista_item, 0,1),
                        'numeroUc'              => substr($lista_item, 1,10),
                        'identificacao'         => substr($lista_item, 11,20),
                        'valorCobrar'           => substr($lista_item, 31,15),
                        'codigoDoItem'          => substr($lista_item, 46,6),
                        'parcela'               => substr($lista_item, 52,30),
                        'parceirosDeNegocios'   => substr($lista_item, 82,10),
                        'brancos'               => substr($lista_item, 92,22),
                    ]);
            }
        }

        return $data;
    }
}