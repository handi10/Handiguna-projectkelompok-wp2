<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // CEK JIKA ADA GAMBAR DI UPLOAD 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudak ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function pendaftaran()
    {
        $this->load->model('Menu_model');  
        $iduser = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $hasil_user = $this->Menu_model->cek_iduser($iduser);

        if($hasil_user=0))
        {   

            $data['title'] = 'Pendaftaran';
            $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();


            $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
            $data['paket'] = $this->db->get('paket')->result_array();

            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('ttl', 'TTL', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
            $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
            $this->form_validation->set_rules('id_paket', 'Paket', 'required');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/pendaftaran', $data);
                $this->load->view('templates/footer');
            } else {
                $this->db->insert(
                    'pendaftaran',
                    [
                        'tgl_pendaftaran' => $this->input->post('tgl_pendaftaran'),
                        'nama' => $this->input->post('nama'),
                        'ttl' => $this->input->post('ttl'),
                        'alamat' => $this->input->post('alamat'),
                        'no_hp' => $this->input->post('no_hp'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'id_paket' => $this->input->post('id_paket'),
                        'status_pembayaran' => ('Belum Diverifikasi'),
                        'status_peserta' => ('Belum Aktif'),  
                        'id_user' => $this->input->post('id_user')
                    ]
                );

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
                redirect('user/datadiri');
            }
        }else{
           $this->load->model('Menu_model'); 
           $data['title'] = 'Data Pribadi';
           $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

           $data['data'] = $this->Menu_model->cekData(['email' => $this->session->userdata('email')])->row_array();

           if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/datadiri', $data);
            $this->load->view('templates/footer');
        }else {

            $id = $this->input->post('id');
            $ttl = $this->input->post('ttl');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $pendidikan = $this->input->post('pendidikan');

            $this->db->set('ttl', $ttl);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_hp', $no_hp);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->where('id_pendaftaran', $id);
            $this->db->update('pendaftaran');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user/pendaftaran');
        }
    }
}
}
