<?php

class Rotinas extends CI_Controller {

	public function index()
	{
        echo "ok";
	}

    public function alterarDataELopDoTitulo()
    {

        $this->load->model('titulo_model');

        $inputLop   = (int) $this->input->post('inputLop');
        $inputData  = $this->input->post('inputData');
        $inputDocs  = $this->input->post('inputDocs');
        $inputTids  = $this->input->post('inputTids');

        if (!$inputData || !$this->validateDate($inputData) ) {
            $this->message->error("Data não informada ou inválida.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

        if (!$inputLop) {
            $this->message->error("Lop não informado ou inválido.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

        if ($inputDocs) {
            
            $data = $this->explodeDados($inputDocs);

            $results =  $this->titulo_model->getTidsForTitulos($data);

            if (count($results) > 0 ) {
                foreach($results as $result){
                    $this->updateDataELopDoTitulo($inputLop, $inputData, $result->tid);
                }
            }
            $this->message->info("Dados alterador com sucesso!");
            header('Location: http://192.168.22.79/vital-dash');
            die;           
        }

        if ($inputTids) {
            
            $data = $this->explodeDados($inputTids);

            $this->updateDataELopDoTitulo($inputLop, $inputData, $data);
            $this->message->info("Dados alterador com sucesso!");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

        
    }

    public function updateDataELopDoTitulo($inputLop, $inputData, $tid)
    {
        $this->load->model('titulo_model');
        return $this->titulo_model->updateDataELopDoTitulo($inputLop, $inputData, $tid);
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function alteraSituacaoParaAnalise()
    {
        $this->load->model('titulo_model');

        $inputNumero = $this->input->post('inputNumero');
        $inputSequencia = $this->input->post('inputSequencia');
        $inputSituacao = $this->input->post('inputSituacao');

        if (!$inputNumero) {
            $this->message->error("Título não informado ou inválido.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

        if (!$inputSequencia) {
            $this->message->error("Sequência não informada ou inválida.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

        if (!$inputSituacao) {
            $this->message->error("Situação não informada ou inválida.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }


        if ( $this->titulo_model->updateSituacao($inputNumero, $inputSequencia, $inputSituacao) ) {
            $this->message->info("Situação atualizada com sucesso.");
            header('Location: http://192.168.22.79/vital-dash');
            die;
        }

    }

    public function explodeDados($data)
    {
        $explode = explode(';', $data);
            $data = "";
            for ($i=0; $i< count($explode); $i++) {
                if ((count($explode)-1) == $i){
                    $data =  $data . "'". trim($explode[$i]) . "'";
                }else{
                    $data = $data . "'". trim($explode[$i]) . "',";
                }
            }
        
        return $data;
    }

    public function liberaPedidoParaAprovacao()
    {
        $inputPedido = (int) $this->input->post('inputNumero');

        if ($inputPedido) {
            
            $this->load->model('titulo_model');

            if ( $this->titulo_model->updateAprovacaoPedido($inputPedido) ){
                $this->message->info("Pedido atualizado com sucesso.");
                header('Location: http://192.168.22.79/vital-dash');
                die;
            }                       
        }
    }
}
