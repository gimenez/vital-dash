<?php 

class Titulo_model extends CI_Model {

    public function getTitulos()
    {
        $query = $query = $this->db->query("SELECT titulo.*, lop.lop FROM titulos AS titulo 
            INNER JOIN lops AS lop
                ON titulo.lop_id = lop.id
            WHERE data_previsao_pagamento = current_date -5
                AND valor > 1 
                --AND situacao in ('A', 'PR') 
                AND lop.id in ('4986392','509613718','533570479', '535608704', '98154792', '535608791')");
        return $query->result();
    }

    public function updateSituacao($titulo, $sequencia, $situacao)
    {
        // $sql = "UPDATE TITULOS
        // SET SITUACAO = '".$situacao. "'
        // WHERE ID in (".$titulos.") 
        // AND sequencia = ".$sequencia;

        // $query = $this->db->query($sql);
        // return $query;

        $this->db->set('situacao', $situacao);
        $this->db->where('numero_titulo', $titulo);
        $this->db->where('sequencia', $sequencia);
        $this->db->update('titulos'); 
        return;
    }
}