<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Album Backend / Tampilan Belakang Album
class Album extends CI_Controller
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

     //Tampilan Utama Album
     public function index()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
          $data['title'] = 'Album';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_album', $data);
          $this->load->view('backend/footer');
     }

     //Tampilan Tambah Album
     public function album_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Album';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_album_tambah', $data);
          $this->load->view('backend/footer');
     }

     //Proses Tambah Album
     public function album_aksi()
     {
          $this->form_validation->set_rules('nama', 'Album nama', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $nama = $this->input->post('nama');

               $data = [
                    'album_nama' => $nama,
                    'album_slug' => strtolower(url_title($nama))
               ];

               $this->m_data->insert_data($data, 'album');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('album'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Album';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_album_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //Tampilan Edit Album
     public function album_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['album_id' => $id];
          $data['album'] = $this->m_data->edit_data($where, 'album')->result();
          $data['title'] = 'Album';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_album_edit', $data);
          $this->load->view('backend/footer');
     }

     //Proses Tambah Album
     public function album_update()
     {
          $this->form_validation->set_rules('nama', 'Album nama', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');
               $nama = $this->input->post('nama');

               $data = [
                    'album_nama' => $nama,
                    'album_slug' => strtolower(url_title($nama))
               ];

               $where = [
                    'album_id' => $id
               ];

               $this->m_data->update_data($where, $data, 'album');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diedit!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('album'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['album_id' => $id];
               $data['album'] = $this->m_data->edit_data($where, 'album')->result();
               $data['title'] = 'Album';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_album_edit', $data);
               $this->load->view('backend/footer');
          }
     }

     //Hapus Album
     public function album_hapus($id)
     {
          $where = ['album_id' => $id];
          $this->m_data->delete_data($where, 'album');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('album'));
     }
}
