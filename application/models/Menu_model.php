<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
        FROM user_sub_menu JOIN user_menu
        ON user_sub_menu.menu_id = user_menu.id       
        ";
        return $this->db->query($query)->result_array();
    }

    public function getjoinpaket()
    {
        $query = "SELECT pendaftaran.*, paket.*
        FROM pendaftaran JOIN paket
        ON pendaftaran.id_paket = paket.id_paket      
        ";
        return $this->db->query($query)->result_array();
    }

    public function joinuser($iduser){

        $sql = "select pendaftaran.*, user.* from pendaftaran, user where id_user='$iduser' and user.id=pendaftaran.id_user"; 
        $hasil = $this->db->query($sql);
        return $hasil->result();    
    }

    public function hapusMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function hapusSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function cek_iduser($iduser){

        $sql = "select count(pendaftaran.id_user) from pendaftaran, user where id_user='$iduser' and user.id=pendaftaran.id_user"; 
        $hasil = $this->db->query($sql);
        return $hasil->result();    
    }

    public function cekData($where)
    {
        return $this->db->get_where('view_daftar', $where);
    }

    public function updatePendaftaran($data = null, $where = null)
    {
        $this->db->update('view_daftar', $data, $where);
    }




}
