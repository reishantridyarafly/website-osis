<?php
defined('BASEPATH') or exit('No direct script access allowed');

//dashboard backend / Tampilan Depan dashboard
class Dashboard extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          // cek session yang login,
          // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
          // maka halaman akan di alihkan kembali ke halaman login.
          date_default_timezone_set('Asia/Jakarta');
          $this->load->model('m_data');
          if ($this->session->userdata('status') != "telah_login") {
               redirect(base_url() . 'login?alert=belum_login');
          }
     }

     //tampilan utama
     public function index()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
          $data['jumlah_agenda'] = $this->m_data->get_data('agenda')->num_rows();
          $data['jumlah_pengumuman'] = $this->m_data->get_data('pengumuman')->num_rows();
          $data['jumlah_siswa'] = $this->m_data->get_data('siswa')->num_rows();
          $data['title'] = 'Dashboard';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_index', $data);
          $this->load->view('backend/footer');
     }


     //logout
     public function keluar()
     {
          $this->session->sess_destroy();
          redirect('login?alert=logout');
     }

     //tampilan notfound
     public function notfound()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = '404 Not Found';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/v_notfound', $data);
     }

     //tampilan tidak tersedia
     public function blocked()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Access Blocked';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/v_blocked');
     }
}
