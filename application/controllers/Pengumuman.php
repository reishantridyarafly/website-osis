<?php
defined('BASEPATH') or exit('No direct script access allowed');

//pengumuman backend / Tampilan belakang pengumuman
class Pengumuman extends CI_Controller
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
          $data['pengumuman'] = $this->m_data->get_data('pengumuman', 'tanggal_mulai', 'desc')->result();
          $data['title'] = 'Pengumuman';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengumuman', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah pengumuman
     public function pengumuman_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Tambah Pengumuman';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengumuman_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah artikel
     public function pengumuman_aksi()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
          $this->form_validation->set_rules('mulai', 'Tanggal mulai', 'trim|required');
          $this->form_validation->set_rules('selesai', 'Tanggal selesai', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
          if ($this->form_validation->run() != false) {
               $judul = $this->input->post('judul');
               $deskripsi = $this->input->post('deskripsi');
               $mulai = $this->input->post('mulai');
               $selesai = $this->input->post('selesai');

               $data = [
                    'pengumuman_judul' => $judul,
                    'pengumuman_deskripsi' => $deskripsi,
                    'tanggal_mulai' => $mulai,
                    'tanggal_selesai' => $selesai,
                    'pengumuman_author' => $this->session->userdata('nama'),
               ];
               $this->m_data->insert_data($data, 'pengumuman');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('pengumuman'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Tambah Pengumuman';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_pengumuman_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit pengumuman
     public function pengumuman_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['pengumuman_id' => $id];
          $data['pengumuman'] = $this->m_data->edit_data($where, 'pengumuman')->result();
          $data['title'] = 'Edit Pengumuman';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengumuman_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit pengumuman
     public function pengumuman_update()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
          $this->form_validation->set_rules('mulai', 'Tanggal mulai', 'trim|required');
          $this->form_validation->set_rules('selesai', 'Tanggal selesai', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');
               $judul = $this->input->post('judul');
               $deskripsi = $this->input->post('deskripsi');
               $mulai = $this->input->post('mulai');
               $selesai = $this->input->post('selesai');

               $where = ['pengumuman_id' => $id];

               $data = [
                    'pengumuman_judul' => $judul,
                    'pengumuman_deskripsi' => $deskripsi,
                    'tanggal_mulai' => $mulai,
                    'tanggal_selesai' => $selesai,
                    'pengumuman_author' => $this->session->userdata('nama'),
               ];
               $this->m_data->update_data($where, $data, 'pengumuman');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('pengumuman'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['pengumuman_id' => $id];
               $data['pengumuman'] = $this->m_data->edit_data($where, 'pengumuman')->result();
               $data['title'] = 'Edit Pengumuman';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_pengumuman_edit', $data);
               $this->load->view('backend/footer');
          }
     }

     //proses hapus pengumuman
     public function pengumuman_hapus($id)
     {
          $where = ['pengumuman_id' => $id];
          $this->m_data->delete_data($where, 'pengumuman');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('pengumuman'));
     }
}
