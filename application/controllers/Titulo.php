<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titulo extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
        
	}

	public function alterSituacao()
	{
		$titulo = $this->posTitulosValidate($_POST['inputNumeroTitulo']);
		$situacao = $this->postSelectValidate($_POST['inputSituacaoTitulo']);
		$sequencia = $this->posTitulosValidate($_POST['inputSequenciaTitulo']);
	
		if ( !$titulo ){
			header('Location: http://192.168.22.79/ci');
		}

		if (!$situacao){
			header('Location: http://192.168.22.79/ci');
			return false;
		}

		$this->load->model('titulo_model');

		$result = $this->titulo_model->updateSituacao($titulo, $sequencia, $situacao);

		
		header('Location: http://192.168.22.79/ci');
		return false;
	

	}

	public function posTitulosValidate($numero)
	{

		if (!isset($numero)){
			return false;
		}

		return (int) $numero;

		// $titulos =  explode(";", $inputNumeroTitulo);
		// $titulos = (object) $titulos;

		// foreach($titulos as $titulo){
		// 	if (!empty($titulo))
		// 		array_push($response,$titulo);
		// }

		// return (object) $response;
	}

	public function postSelectValidate($inputSelect)
	{
		if (!isset($inputSelect) && empty( $inputSelect ) ){
			return false;
		}

		return $inputSelect;
	}
}