<?php
class Mpekerjaan extends CI_Model {

    var $tabel = 'responden_pekerjaan';

    function __construct() {
        parent::__construct();
    }
	function get_all() {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
    function get_all_dropdown() {
        $this->db->from($this->tabel);
        $result = $this->db->get();
        $return = array();
        if ($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['ID_PEKERJAAN']] = $row['NAMA_PEKERJAAN'];
            }
        }
    }

    function get_byid($ID_PEKERJAAN) {
        $this->db->from($this->tabel);
        $this->db->where('ID_PEKERJAAN', $ID_PEKERJAAN);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($ID_PEKERJAAN,$data) {

        $this->db->where('ID_PEKERJAAN', $ID_PEKERJAAN);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($ID_PEKERJAAN) {
        $this->db->where('ID_PEKERJAAN', $ID_PEKERJAAN);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
