<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $data['title'] = 'Paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['paket'] = $this->db->get('paket')->result_array();

        $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('paket/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert(
                'paket',
                [
                    'nama_paket' => $this->input->post('nama_paket'),
                    'jangka_waktu' => $this->input->post('jangka_waktu'),
                    'biaya' => $this->input->post('biaya'),
                    'deskripsi' => $this->input->post('deskripsi')
                ]
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New paket Added</div>');
            redirect('paket');
        }
    }

    public function hapusPaket($id)
    {
        $this->load->model('Paket_model');
        $this->Paket_model->hapusPaket($id);
        redirect('paket');
    }

    public function editPaket($paket)
    {

     $data['title'] = 'Paket Edit';
     $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

     $id_paket = $this->uri->segment('3');

     $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
     $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required');
     $this->form_validation->set_rules('biaya', 'Biaya', 'required');
     $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

     $data['paket'] = $this->db->get_where('paket', ['id_paket' => $id_paket])->row_array();
     
     if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_paket', $data);
        $this->load->view('templates/footer');
    } else {
        $nama_paket = $this->input->post('nama_paket');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $biaya = $this->input->post('biaya');
        $deskripsi = $this->input->post('deskripsi');
        $id_paket = $this->input->post('id_paket');

        $this->db->set('nama_paket', $nama_paket);
        $this->db->set('jangka_waktu', $jangka_waktu);
        $this->db->set('biaya', $biaya);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('id_paket', $id_paket);
        $this->db->update('paket');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Paket success</div>');
        redirect('paket');
    }
}
}
