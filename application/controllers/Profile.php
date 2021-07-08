<?php
defined('BASEPATH') or exit('No direct script access allowed');

//profile backend / Tampilan belakang profile
class Profile extends CI_Controller
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
          $id = $this->session->userdata('id');
          $where = ['pengguna_id' => $id];
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['profile'] = $this->m_data->edit_data($where, 'pengguna')->result();
          $data['title'] = 'Profile';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_profile', $data);
          $this->load->view('backend/footer');
     }

     //proses edit profile
     public function profile_update()
     {
          $this->form_validation->set_rules('nama', 'Nama', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $id = $this->session->userdata('id');

               $nama = $this->input->post('nama');
               $email = $this->input->post('email');

               $where = [
                    'pengguna_id' => $id
               ];

               $data = [
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email
               ];

               $this->m_data->update_data($where, $data, 'pengguna');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('profile'));
          } else {
               $id_pengguna = $this->session->userdata('id');

               $where = [
                    'pengguna_id' => $id_pengguna
               ];
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['profile'] = $this->m_data->edit_data($where, 'pengguna')->result();
               $data['title'] = 'Profile';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_profile', $data);
               $this->load->view('backend/footer');
          }
     }
}
