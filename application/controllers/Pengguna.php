<?php
defined('BASEPATH') or exit('No direct script access allowed');

//pengguna backend / Tampilan belakang backend
class Pengguna extends CI_Controller
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
          } else if ($this->session->userdata('level') != 'admin') {
               redirect('dashboard/blocked');
          }
     }

     //tampilan utama
     public function index()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['pengguna'] = $this->m_data->get_data('pengguna', 'pengguna_nama', 'asc')->result();
          $data['title'] = 'Pengguna Dan Hak Akses';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengguna', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah pengguna
     public function pengguna_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Tambah Pengguna';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengguna_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah pengguna
     public function pengguna_aksi()
     {
          $this->form_validation->set_rules('nama', 'Nama', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('level', 'Level', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
          $this->form_validation->set_rules('password_2', 'Konfirmasi password', 'required|matches[password]', ['matches' => 'Password tidak sama!']);
          $this->form_validation->set_message('required', '%s masih kosong');
          $this->form_validation->set_message('min_length', '%s terlalu pendek');

          if ($this->form_validation->run() != false) {
               $nama = $this->input->post('nama');
               $email = $this->input->post('email');
               $username = $this->input->post('username');
               $password = md5($this->input->post('password'));
               $level = $this->input->post('level');

               $data = [
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => 1
               ];

               $this->m_data->insert_data($data, 'pengguna');

               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('pengguna'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Tambah Pengguna';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_pengguna_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit pengguna
     public function pengguna_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['pengguna_id' => $id];
          $data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
          $data['title'] = 'Edit Pengguna';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengguna_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit pengguna
     public function pengguna_update()
     {
          $this->form_validation->set_rules('nama', 'Nama', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('level', 'Level', 'required');
          $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
          $this->form_validation->set_rules('password_2', 'Konfirmasi password', 'matches[password]', ['matches' => 'Password tidak sama!']);
          $this->form_validation->set_rules('status', 'Status', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');
          $this->form_validation->set_message('min_length', '%s terlalu pendek');

          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');

               $nama = $this->input->post('nama');
               $email = $this->input->post('email');
               $username = $this->input->post('username');
               $password = md5($this->input->post('password'));
               $level = $this->input->post('level');
               $status = $this->input->post('status');

               //cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya
               if ($this->input->post('password') == null) {
                    $data = [
                         'pengguna_nama' => $nama,
                         'pengguna_email' => $email,
                         'pengguna_username' => $username,
                         'pengguna_level' => $level,
                         'pengguna_status' => $status,
                    ];
               } else {
                    $data = [
                         'pengguna_nama' => $nama,
                         'pengguna_email' => $email,
                         'pengguna_username' => $username,
                         'pengguna_password' => $password,
                         'pengguna_level' => $level,
                         'pengguna_status' => $status,
                    ];
               }

               $where = [
                    'pengguna_id' => $id
               ];

               $this->m_data->update_data($where, $data, 'pengguna');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diedit!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('pengguna'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['pengguna_id' => $id];
               $data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
               $data['title'] = 'Edit Pengguna';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_pengguna_edit', $data);
               $this->load->view('backend/footer');
          }
     }


     //tampilan detail pengguna
     public function pengguna_detail($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['pengguna_id' => $id];
          $data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
          $data['title'] = 'Detail Pengguna';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengguna_detail', $data);
          $this->load->view('backend/footer');
     }

     //proses hapus pengguna
     public function pengguna_hapus($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = [
               'pengguna_id' => $id
          ];
          $data['pengguna_hapus'] = $this->m_data->edit_data($where, 'pengguna')->row();
          $data['pengguna_lain'] = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != $id")->result();
          $data['title'] = 'Hapus Pengguna';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengguna_hapus', $data);
          $this->load->view('backend/footer');
     }

     //proses mewariskan artikel
     public function pengguna_hapus_aksi()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $pengguna_hapus = $this->input->post('pengguna_hapus');
          $pengguna_tujuan = $this->input->post('pengguna_tujuan');

          $where = [
               'pengguna_id' => $pengguna_hapus
          ];

          $this->m_data->delete_data($where, 'pengguna');

          // pindahkan semua artikel pengguna yang dihapus ke pengguna yang dipilih
          $w = [
               'artikel_author' => $pengguna_hapus
          ];

          $d = [
               'artikel_author' => $pengguna_tujuan
          ];

          $this->m_data->update_data($w, $d, 'artikel');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('pengguna'));
     }
}
