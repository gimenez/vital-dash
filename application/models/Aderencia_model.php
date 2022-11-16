<?php 

class Aderencia_model extends CI_Model {

    public function getAderenciaDia($date)
    {
        $query = $this->db->query("SELECT dia, login, EO.equipe 
        FROM ADERENCIA_OPERADORES AS AO
        INNER JOIN equipes_operacao AS EO ON (AO.equipe_id = EO.id)
        WHERE TO_CHAR(DIA,'YYYY-MM') = '".$date."' ORDER BY dia DESC");
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