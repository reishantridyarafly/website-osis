<?php
defined('BASEPATH') or exit('No direct script access allowed');

//jabatan backend / Tampilan belakang jabatan
class Jabatan extends CI_Controller
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
          $data['jabatan'] = $this->m_data->get_data('jabatan', 'jabatan_nama', 'asc')->result();
          $data['title'] = 'Jabatan';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_jabatan', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah jabatan
     public function jabatan_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Jabatan Tambah';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_jabatan_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah jabatan
     public function jabatan_aksi()
     {
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi!');

          if ($this->form_validation->run() != false) {
               $jabatan = $this->input->post('jabatan');

               $data = ['jabatan_nama' => $jabatan];

               $this->m_data->insert_data($data, 'jabatan');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('jabatan'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Jabatan Tambah';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_jabatan_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit jabatan
     public function jabatan_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['jabatan_id' => $id];
          $data['jabatan'] = $this->m_data->edit_data($where, 'jabatan')->result();
          $data['title'] = 'Jabatan Edit';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_jabatan_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit jabatan
     public function jabatan_update()
     {
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi!');

          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');
               $jabatan = $this->input->post('jabatan');

               $where = ['jabatan_id' => $id];

               $data = ['jabatan_nama' => $jabatan];

               $this->m_data->update_data($where, $data, 'jabatan');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('jabatan'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['jabatan_id' => $id];
               $data['jabatan'] = $this->m_data->edit_data($where, 'jabatan')->result();
               $data['title'] = 'Jabatan Edit';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_jabatan_edit', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan hapus jabatan
     public function jabatan_hapus($id)
     {
          $where = ['jabatan_id' => $id];
          $this->m_data->delete_data($where, 'jabatan');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('jabatan'));
     }
}
