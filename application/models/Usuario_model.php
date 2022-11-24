<?php 

class Usuario_model extends CI_Model {

    public function getUsersSemFormatacao()
    {
        $query = "SELECT    P.nome_completo AS P_NOME_COMPLETO,
                            P.pessoa AS P_PESSOA,
                            P.id AS P_ID,
                            DP.documento AS DP_id,
                            DP.documento, P.situacao,
                            CS.contrato_servicos AS contrato_servicos,
                            CS.situacao_contrato AS situacao_contrato
                                FROM documentos_pessoas AS DP 
                                JOIN pessoas P ON DP.pessoa_id = P.ID 
                                LEFT JOIN contratos_servicos cs  ON cs.contratante_id = P.ID 
                                WHERE tipo_documento_id = 580
                                and dp.pessoa_id = 542077361
                               -- AND CHAR_LENGTH(documento)='11'
                               -- AND contratos_parceiro_id  IN ('468335894')
                                --AND cs.contratante_id = 542700974
                                LIMIT 25";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function createLog($idsDeletados, $quantidadeDeletados)
    {   
        $sql = "INSERT INTO z_pessoas_duplicadas_facta (id, data_hora, qtde, pessoas_deletar)
        VALUES ((SELECT COUNT(id)+1 FROM z_pessoas_duplicadas_facta), CURRENT_TIMESTAMP, '$quantidadeDeletados', '$idsDeletados')";
        return $this->db->query($sql);
    }

    public function deleteById($idPessoa)
    {
        /**
         * Exclui tabela pessoas
         */
        $this->db->where('pessoa_id', $idPessoa);
        $this->db->delete('documentos_pessoas');


        $this->db->where('pessoa_id', $idPessoa);
        $this->db->delete('categorias_pessoas');
        
        /**
         * Exclui primeiro tabela clientes
         */
        $this->db->where('id', $idPessoa);
        $this->db->delete('clientes');


        

        /**
         * Exclui da tabela pessoas
         */
        $this->db->where('id', $idPessoa);
        $this->db->delete('pessoas');

    }

    public function getDocumentoComFormatacao($documento)
    {
        return $this->db->where('documento', $documento)
                        ->get('documentos_pessoas')
                        ->result();     
    }

    public function updateCPF($idPessoa, $cpf)
    {
        $this->db->set('documento',$cpf );
        $this->db->where('pessoa_id', $idPessoa);
        return $this->db->update('documentos_pessoas');
    }

    /**
     * Contato
     */
    public function getContatosByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('contatos')
                        ->result();
    }

    public function updateContatos($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('contatos');
    }

    /**
     * Pessoas Contato
     */
    public function getPessoasContatosByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('pessoas_contatos')
                        ->result();
    }

    public function updatePessoasContatos($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->set('pessoa_representada_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        $this->db->where('pessoa_id =','pessoa_representada_id');
        $this->db->update('pessoas_contatos');

        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        $this->db->where('pessoa_id !=','pessoa_representada_id');
        return $this->db->update('pessoas_contatos');
        
    }

    /**
     * Pedidos
     */    
    public function getPedidosByIdPessoa($idPessoa)
    {
        return $this->db->where('cliente_id', $idPessoa)
                        ->get('pedidos')
                        ->result();
    }

    public function updatePedidos($idAntigo, $idNovo)
    {
        $this->db->set('cliente_id', $idAntigo);
        $this->db->set('grupo_cliente_id', $idAntigo);
        $this->db->where('cliente_id', $idNovo);
        return $this->db->update('pedidos');
    }

    /**
     * Pedidos Pessoa
     */ 
    public function getPedidosPessoasByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('pedidos_pessoas')
                        ->result();
    }

    public function updatePedidosPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('pedidos_pessoas');
    }

    /**
     * Contratos Serviços
     */
    public function getContratoServicosByIdPessoa($idPessoa)
    {
        return $this->db->where('contratante_id', $idPessoa)
                        ->get('contratos_servicos')
                        ->result();
    }

    public function updateContratoServicos($idAntigo, $idNovo)
    {
        $this->db->set('contratante_id', $idAntigo);
        $this->db->where('contratante_id', $idNovo);
        return $this->db->update('contratos_servicos');
    }

    /**
     * Pessoas Contratos
     */
    public function getPessoaContratosByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa', $idPessoa)
                        ->get('pessoas_contratos')
                        ->result();
    }

    public function updatePessoaContratos($idAntigo, $idNovo)
    {
        $this->db->set('pessoa', $idAntigo);
        $this->db->where('pessoa', $idNovo);
        return $this->db->update('pessoas_contratos');
    }

    /**
     * Titulos
     */
    public function getTitulosByIdPessoa($idPessoa)
    {
        return $this->db->where('destinatario_id', $idPessoa)
                        ->get('titulos')
                        ->result();
    }

    public function updateTitulos($idAntigo, $idNovo)
    {
        $this->db->set('destinatario_id', $idAntigo);
        $this->db->where('destinatario_id', $idNovo);
        return $this->db->update('titulos');
    }

    /**
     * Cartoes Pessoas
     */
    public function getCartoesPessoasByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('cartoes_pessoas')
                        ->result();
    }

    public function updateCartoesPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('cartoes_pessoas');
    }

    /**
     * Dados Pessoas
     */
    public function getDadosPessoasByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('dados_pessoas')
                        ->result();
    }

    public function updateDadosPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('dados_pessoas');
    }

    /**
     * Arquivos Anexos Pessoas
     */
    public function getArquivosAnexosPessoasByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('arquivos_anexos_pessoas')
                        ->result();
    }

    public function updateArquivosAnexosPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('arquivos_anexos_pessoas');
    }

    /**
     * Documentos Pessoas
     */
    public function getDocumentosPessoasByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('documentos_pessoas')
                        ->result();
    }

    public function updateDocumentosPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        $this->db->where('tipo_documento_id != ', 580);
        return $this->db->update('documentos_pessoas');
    }

    /**
     * Endereços
     */
    public function getEnderecosByIdPessoa($idPessoa)
    {
        return $this->db->where('pessoa_id', $idPessoa)
                        ->get('enderecos')
                        ->result();
    }

    public function updateEnderecos($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('enderecos');
    }

     /**
     * Caracteristicas Pessoas
     */
    public function getCaracteristicasPessoasByIdPessoa($idPessoa)
    {
         return $this->db->where('pessoa_id', $idPessoa)
                        ->get('caracteristicas_pessoas')
                        ->result();
    }

    public function updateCaracteristicasPessoas($idAntigo, $idNovo)
    {
        $this->db->set('pessoa_id', $idAntigo);
        $this->db->where('pessoa_id', $idNovo);
        return $this->db->update('caracteristicas_pessoas');
    }

     /**
     * Trasações de integração
     */
    public function getTransacoesDeIntegracaoByIdPessoa($idPessoa)
    {
         return $this->db->where('sacado_id', $idPessoa)
                        ->get('transacoes_integracao')
                        ->result();
    }

    public function updateTransacoesDeIntegracao($idAntigo, $idNovo)
    {
        $this->db->set('sacado_id', $idAntigo);
        $this->db->where('sacado_id', $idNovo);
        return $this->db->update('transacoes_integracao');
    }

    public function updatePessoas($idAntigo)
    {
        $this->db->set('data_ultima_atualizacao', date("Y-m-d") );
        $this->db->set('data_alteracao ', date("Y-m-d") );
        $this->db->set('usuario_ultima_alteracao_id', 469278982 ); // Pessoa Facta
        $this->db->set('usuario_alteracao_id', 469279018 ); // Login Facta
        $this->db->where('id', $idAntigo);
        return $this->db->update('pessoas');
    }
}