<?php 

class Titulo_model extends CI_Model {

    public function getTitulos()
    {
        $query = $this->db->query("SELECT titulo.*, lop.lop FROM titulos AS titulo 
            INNER JOIN lops AS lop
                ON titulo.lop_id = lop.id
            WHERE data_previsao_pagamento >= current_date
                AND valor > 1 
                AND situacao in ('A', 'PR') 
                AND lop.id in ('4986392','509613718','533570479', '535608704', '98154792', '535608791')");
        return $query->result();
    }

    public function updateSituacao($titulo, $sequencia, $situacao)
    {
        $this->db->set('situacao', $situacao);
        $this->db->where('numero_titulo', $titulo);
        $this->db->where('sequencia', $sequencia);
        return $this->db->update('titulos');
    }

    public function getTidsForTitulos($data)
	{
		$query = "SELECT tid
                    FROM TRANSACOES_INTEGRACAO
                    WHERE numero_documento IN ( ".$data.")";
        $query = $this->db->query($query);
        return $query->result();
	}

    public function updateDataELopDoTitulo($inputLop, $inputData, $tid)
    {
        return true;
        $sql = "UPDATE titulos 
                    SET data_pagamento = '".$inputData."',
                        lop_id = " .$inputLop.",
                        situacao = 'L'
                        WHERE (numero_titulo, sequencia, id) IN (
                            SELECT t.numero_titulo, t.sequencia,t.id
                            FROM TRANSACOES_INTEGRACAO ti
                                    LEFT JOIN TRANSACOES_INTEGRACAO_titulos tt ON (tt.transacao_id = ti.id)
                                    LEFT JOIN titulos t ON (t.id = tt.titulo_id)
                                    LEFT JOIN contratos_servicos cs ON (cs.id = t.contrato_id)
                            WHERE ti.TID IN ('".$tid."'))";

        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function updateAprovacaoPedido($pedidoId)
    {
        $this->db->set('data_conclusao', null);
        $this->db->set('situacao', 'P');
        $this->db->where('pedido', $pedidoId);
        return $this->db->update('pedidos');
    }

    public function getTaxasCartoes()
    {
        $sql = "SELECT lop.lop, tipos_cartao.tipo_cartao, tc.data_fim, tc.taxa  
            FROM taxa_cartao tc
                INNER JOIN lops AS lop ON tc.lop_id = lop.id
                INNER JOIN tipos_cartoes AS tipos_cartao ON tc.bandeira_id = tipos_cartao.id
                WHERE data_fim > current_date";

        $query = $this->db->query($sql);
        return $query->result();
    }
}