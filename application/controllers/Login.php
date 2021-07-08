<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tampilan login
class Login extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          if ($this->session->userdata('status') == "telah_login") {
               redirect(base_url() . 'dashboard');
          }
          $this->load->model('m_data');
     }

     //tampilan utama
     public function index()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Halaman Login';
          $this->load->view('backend/auth_header', $data);
          $this->load->view('auth/v_login', $data);
          $this->load->view('backend/auth_footer');
     }

     //proses login
     public function aksi()
     {
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               //menangkap data username dan password
               $username = $this->input->post('username');
               $password = $this->input->post('password');

               $where = [
                    'pengguna_username' => $username,
                    'pengguna_password' => md5($password),
                    'pengguna_status' => 1
               ];

               $this->load->model('m_data');

               //cek kesusuaian login pada tabel
               $cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

               if ($cek > 0) {
                    //ambil data pengguna menggunakan login
                    $data = $this->m_data->cek_login('pengguna', $where)->row();

                    //buat session untuk pengguna berhasil login
                    $data_session = [
                         'id' => $data->pengguna_id,
                         'nama' => $data->pengguna_nama,
                         'email' => $data->pengguna_email,
                         'username' => $data->pengguna_username,
                         'level' => $data->pengguna_level,
                         'status' => 'telah_login'
                    ];

                    $this->session->set_userdata($data_session);

                    //alihkan ke halaman dashboard
                    redirect(base_url('dashboard'));
               } else {
                    redirect(base_url('login?alert=gagal'));
               }
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Halaman Login';
               $this->load->view('backend/auth_header', $data);
               $this->load->view('auth/v_login');
               $this->load->view('backend/auth_footer');
          }
     }
}
