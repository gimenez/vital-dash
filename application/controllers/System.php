<?php

class System extends CI_Controller {

	public function index()
	{
        $data['titulos'] = $this->getTitulos();
        $data['aderencias'] = $this->getAderencias();
		$this->load->view('system/container', $data);
	}

    public function getTitulos()
    {
        $this->load->model('titulo_model');
        return $result = $this->titulo_model->getTitulos();
    }

    public function getAderencias()
    {
        $this->load->model('aderencia_model');
        return $result = $this->aderencia_model->getAderenciaDia(date("Y-m"));
    }

}
