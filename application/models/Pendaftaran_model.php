<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_model extends CI_Model
{

    public function getPaket()
    {
        $query = "SELECT * FROM paket";
        return $this->db->query($query)->result_array();
    }

     public function hapusPaket($id)
    {
    	$this->db->where('id_paket', $id);
        $this->db->delete('paket');
    }
}
