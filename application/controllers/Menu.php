<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menu/index');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added</div>');
            redirect('menu/submenu');
        }
    }
    public function paket()
    {
        $data['title'] = 'Paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['paket'] = $this->db->get('paket')->result_array();

        $this->form_validation->set_rules('nama_paket', 'Paket', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/paket', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert(
                'paket',
                [
                    'nama_paket' => $this->input->post('nama_paket'),
                    'jangka_waktu' => $this->input->post('jangka_waktu'),
                    'biaya' => $this->input->post('biaya')
                ]
            );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New paket Added</div>');
            redirect('menu/paket');
        }
    }

    public function hapusPaket($id)
    {
        $this->load->model('Paket_model');
        $this->Paket_model->hapusPaket($id);
        redirect('menu/paket');
    }

    public function datapendaftar()
    {
        $data['title'] = 'Data Pendaftar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['pendaftar'] = $this->menu->getjoinpaket();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/datapendaftar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapusMenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusMenu($id);
        redirect('menu/index/');
    }

    public function hapusSubMenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusSubMenu($id);
        redirect('menu/submenu/');
    }

    public function verifikasi()
    {
        $data['title'] = 'Verifikasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('status_peserta', 'Status Kepesertaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/verifikasi', $data);
            $this->load->view('templates/footer');
        } else {

            $status_pembayaran = $this->input->post('status_pembayaran');
            $status_peserta = $this->input->post('status_peserta');

            $upload_image = $_FILES['bukti_tf']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/upload/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('bukti_tf')) {
                    $old_image = $data['bukti_tf']['bukti_tf'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/upload/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('bukti_tf', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->db->set('status_pembayaran', $status_pembayaran);
            $this->db->where('status_peserta', $status_peserta);
            $this->db->update('pendaftaran');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terverifikasi</div>');
            redirect('menu/pendaftaran');
        }
    }
}
