<?php 

class Faq_model extends CI_Model {

    public function getFaqs()
    {
        $query = $query = $this->db->query("SELECT * FROM faq;");
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