<?php

class Usuario extends CI_Controller {

	public function index()
	{
        $this->getUsersFacta();
	}

    public function getUsersFacta()
    {
        $this->load->model('usuario_model');
        /**
         * Pega todos os usuários que não possuem CPF com formatação
         */
        $results = $this->usuario_model->getUsersSemFormatacao();

        
        if ( count($results) <= 0 ) {
            return;
        }
        
        $results = (object) $results;
        $quantidadeModificados = 0;
        $idsModificados = [];

        foreach ( $results as $result ) {
            $cpfFormatado = $this->mask($result->documento, '###.###.###-##');
            echo "++++++++++++++++++ </br>";
            echo "Nome: ".$result->p_nome_completo. 
            " </br> Pessoa :".$result->p_pessoa. 
            " </br>Pessoa id: ".$result->p_id. 
            " </br>Documento : ". $cpfFormatado.
            " </br>Documento id: ". $result->dp_id.
            " </br>Contrato : ".$result->contrato_servicos.
            " </br>Situação do contrato : ".$result->situacao_contrato;
            echo "<br> ++++++++++++++++++ </br></br>";


            $idNovo = $result->p_id;

            /**
             * Verifica se existe registros com formatação
             */
            $documentoAntigo = $this->usuario_model->getDocumentoComFormatacao($cpfFormatado);
            
            if( count($documentoAntigo) <= 0 ){
                /**
                 * Altera somente a mascara do CPF, pois não existe esse CPF cadastrado no sistema
                 */
                $quantidadeModificados++;
                array_push($idsModificados,["Atualizado" => $idNovo]);
                $this->usuario_model->updateCPF($result->p_id, $cpfFormatado);
                $this->usuario_model->updatePessoas($idNovo);
                
            }else{  
                
                if (!isset($documentoAntigo[0]->pessoa_id)) {
                    return;
                }
                $quantidadeModificados++;
                $idAntigo   = $documentoAntigo[0]->pessoa_id;
                array_push($idsModificados,["Deletado" => $idNovo]);

                /**
                 * Busca contatos
                 */
                $contatos = $this->usuario_model->getContatosByIdPessoa($idNovo);

                    if ( count($contatos) > 0 ) {
                        $this->usuario_model->updateContatos($idAntigo, $idNovo);
                    }
                

                /**
                 * Busca Pessoas Contato
                 */
                $pessoasContatos = $this->usuario_model->getPessoasContatosByIdPessoa($idNovo);

                    if ( count($pessoasContatos) > 0 ) {
                        $this->usuario_model->updatePessoasContatos($idAntigo, $idNovo);
                    }
                   
                /**
                 * Busca Pedidos
                 */
                $pedidos = $this->usuario_model->getPedidosByIdPessoa($idNovo);
                
                    if ( count($pedidos) > 0 ) {
                        $this->usuario_model->updatePedidos($idAntigo, $idNovo);
                    }
                
                /**
                 * Busca Pedidos Pessoas
                 */
                $pedidosPessoas = $this->usuario_model->getPedidosPessoasByIdPessoa($idNovo);

                    if ( count($pedidosPessoas) > 0 ) {
                        $this->usuario_model->updatePedidosPessoas($idAntigo, $idNovo);
                    }
                /**
                 * Busca Contratos Serviços
                 */
                $contratoServicos = $this->usuario_model->getContratoServicosByIdPessoa($idNovo);
                    if ( count($contratoServicos) > 0 ) {
                        $this->usuario_model->updateContratoServicos($idAntigo, $idNovo);
                    }

                 /**
                 * Busca Pessoas Contratos
                 */
               
                $pessoasContratos = $this->usuario_model->getContratoServicosByIdPessoa($idNovo);
            

                    if ( count($pessoasContratos) > 0 ) {
                        $this->usuario_model->updatePessoaContratos($idAntigo, $idNovo);
                    }
                /**
                 * Busca titulos
                 */
            
                $titulos = $this->usuario_model->getTitulosByIdPessoa($idNovo);

                    if ( count($titulos) > 0  ) {
                        $this->usuario_model->updateTitulos($idAntigo, $idNovo);
                    }

                /**
                 * Busca Cartoes Pessoas
                 */
                $cartoesPessoas = $this->usuario_model->getCartoesPessoasByIdPessoa($idNovo);
                if ( count($cartoesPessoas) > 0 ) {
                    $this->usuario_model->updateCartoesPessoas($idAntigo, $idNovo);
                }

                /**
                 * Busca Dados Pessoas
                 */
                $dadosPessoas = $this->usuario_model->getDadosPessoasByIdPessoa($idNovo);


                    if ( count($dadosPessoas ) > 0 ) {
                        $this->usuario_model->updateDadosPessoas($idAntigo, $idNovo);
                    }
                
                /**
                 * Busca Arquivos Anexos Pessoas
                 */
                $arquivosAnexosPessoas = $this->usuario_model->getArquivosAnexosPessoasByIdPessoa($idNovo);

                if ( count($arquivosAnexosPessoas ) > 0 ) {
                        $this->usuario_model->updateArquivosAnexosPessoas($idAntigo, $idNovo);
                    }

                /**
                 * Documentos Pessoas
                 */
                $documentosPessoas = $this->usuario_model->getDocumentosPessoasByIdPessoa($idNovo);

                    if ( count($documentosPessoas ) > 0 ) {
                        $this->usuario_model->updateDocumentosPessoas($idAntigo, $idNovo);
                    }

                /**
                 * Endereços
                 */
                $enderecos = $this->usuario_model->getEnderecosByIdPessoa($idNovo);
                
                if ( count($enderecos ) > 0  ) {
                    $this->usuario_model->updateEnderecos($idAntigo, $idNovo);
                }

                /**
                 * Caracteristicas Pessoas
                 */
                $caracteristicasPessoas = $this->usuario_model->getCaracteristicasPessoasByIdPessoa($idNovo);

                    if ( count($caracteristicasPessoas ) > 0 ) {
                        $this->usuario_model->updateCaracteristicasPessoas($idAntigo, $idNovo);
                    }

                /**
                 * Trasações de integração
                 */
                $trasacoesDeIntegracao = $this->usuario_model->getTransacoesDeIntegracaoByIdPessoa($idNovo);

                if ( count($trasacoesDeIntegracao ) > 0 ) {
                    $this->usuario_model->updateTransacoesDeIntegracao($idAntigo, $idNovo);
                }
                
                /**
                 * Delete id 
                 */
                $this->usuario_model->deleteById($idNovo);

                /**
                 * Atualiza pessoas
                 */
                $this->usuario_model->updatePessoas($idAntigo);
                
                
            }          

        }

        $idsModificados = json_encode($idsModificados);

        echo "<pre> " .$idsModificados." </pre>";
        $this->usuario_model->createLog($idsModificados, $quantidadeModificados);
        die();
    }

    public function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }
}
