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
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

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
                    'biaya' => $this->input->post('biaya'),
                    'deskripsi' => $this->input->post('deskripsi')
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

        
        $data['pendaftar'] = $this->db->get('view_daftar')->result_array();


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

        $data['title'] = 'Verifikasi Pendaftaran';       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->uri->segment('3');
        $data['daftar'] = $this->db->get_where('view_daftar', ['id_pendaftaran' => $id])->row_array();

        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('status_peserta', 'Status Kepesertaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/verifikasi', $data);
            $this->load->view('templates/footer');
        } else {

            $data=[

                'status_pembayaran' => $this->input->post('status_pembayaran'),
                'status_peserta' => $this->input->post('status_peserta',),
                'aktif_mulai' => $this->input->post('aktif_mulai'),
                'aktif_selesai' => $this->input->post('aktif_selesai'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            ];


            $this->db->where('id_pendaftaran', $data['id_pendaftaran']);
            $this->db->update('pendaftaran',$data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diverifikasi</div>');
            redirect('menu/datapendaftar');
        }
    }

    public function uploadsertifikat()
    {

        $data['title'] = 'Upload Sertifikat';       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->uri->segment('3');
        $data['daftar'] = $this->db->get_where('view_daftar', ['id_pendaftaran' => $id])->row_array();


        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/uploadsertifikat', $data);
        $this->load->view('templates/footer');
        
    }

    public function simpansertifikat()
    {

        $upload_image = $_FILES['sertifikat']['name'];
        $id = $this->input->post('id_pendaftaran');
        $data = [
            'status_peserta'=>$this->input->post('status_peserta'),
            'sertifikat'=>$upload_image
        ];

            // CEK JIKA ADA GAMBAR DI UPLOAD 


        if ($upload_image) 
        {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/sertifikat/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sertifikat'))

            {

                $upload_image = $this->upload->data('file_name');

                $this->db->where('id_pendaftaran', $id);
                $this->db->update('pendaftaran', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diverifikasi</div>');
                redirect('menu/datapendaftar');
            } 
            else 
            {

             echo $this->upload->dispay_errors();
         }
     }

 }


 public function editMenu()
 {

    $data['title'] = 'Menu Edit';
    $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

    $menuId = $this->uri->segment('3');

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    $data['menu'] = $this->db->get_where('user_menu', ['id' => $menuId])->row_array();
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('templates/footer');
    } else {
        $menu = $this->input->post('menu');
        $id = $this->input->post('id');

        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success</div>');
        redirect('menu');
    }
}

public function editPaket()
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
    $this->load->view('menu/edit_paket', $data);
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
    redirect('menu/paket');
}
}

public function editSubmenu()
{
    $data['title'] = 'Submenu Edit';
    $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    $id = $this->uri->segment('3');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('menu/edit_submenu', $data);
    $this->load->view('templates/footer');
}
public function simpaneditSubmenu()
{
    $id = $this->input->post('id');
    $data=[
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
    ];
    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit submenu success</div>');
    redirect('menu/submenu');
}

}
