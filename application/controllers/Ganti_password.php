<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Ganti_password Backend / Tampilan belakang Ganti_password
class Ganti_password extends CI_Controller
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
          $data['title'] = 'Ganti Password';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_ganti_pass', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah artikel
     public function ganti_password_aksi()
     {
          $this->form_validation->set_rules('password_lama', 'Password lama', 'required');
          $this->form_validation->set_rules('password_baru', 'Password baru', 'required');
          $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'required|matches[password_baru]', ['matches' => 'Password tidak sama!']);
          $this->form_validation->set_message('required', '%s masih kosong');

          //cek validasi
          if ($this->form_validation->run() != false) {
               //menangkap data dari form
               $password_lama = $this->input->post('password_lama');
               $password_baru = $this->input->post('password_baru');
               $konfirmasi_password = $this->input->post('konfirmasi_password');

               // cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
               $where = [
                    'pengguna_id' => $this->session->userdata('id'),
                    'pengguna_password' => md5($password_lama)
               ];

               $cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

               //cek kesesuaian password lama
               if ($cek > 0) {
                    //update data password pengguna

                    $w = [
                         'pengguna_id' => $this->session->userdata('id')
                    ];

                    $data = [
                         'pengguna_password' => md5($password_baru)
                    ];

                    $this->m_data->update_data($where, $data, 'pengguna');

                    //alihkan halaman kembali ke halaman ganti password
                    redirect('ganti_password?alert=sukses');
               } else {
                    //alihkan halaman kembali ke halaman ganti password
                    redirect('ganti_password?alert=gagal');
               }
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Ganti Password';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_ganti_pass', $data);
               $this->load->view('backend/footer');
          }
     }
}
