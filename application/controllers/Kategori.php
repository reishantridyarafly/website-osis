<?php
defined('BASEPATH') or exit('No direct script access allowed');

//kategori backend / Tampilan belakang kategori
class Kategori extends CI_Controller
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
          $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
          $data['title'] = 'Kategori';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_kategori', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah kategori
     public function kategori_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Kategori tambah';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_kategori_tambah', $data);
          $this->load->view('backend/footer');
     }


     //proses tambah kategori
     public function kategori_aksi()
     {
          $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $kategori = $this->input->post('nama_kategori');

               $data = [
                    'kategori_nama' => $kategori,
                    'kategori_slug' => strtolower(url_title($kategori))
               ];

               $this->m_data->insert_data($data, 'kategori');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('kategori'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Kategori tambah';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_kategori_tambah', $data);
               $this->load->view('backend/footer');
          }
     }


     //tampilan edit kategori
     public function kategori_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['kategori_id' => $id];
          $data['kategori'] = $this->m_data->edit_data($where, 'kategori')->result();
          $data['title'] = 'Kategori edit';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_kategori_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit kategori
     public function kategori_update()
     {
          $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');
               $kategori = $this->input->post('nama_kategori');

               $where = [
                    'kategori_id' => $id
               ];

               $data = [
                    'kategori_nama' => $kategori,
                    'kategori_slug' => strtolower(url_title($kategori))
               ];

               $this->m_data->update_data($where, $data, 'kategori');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diedit!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('kategori'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['kategori_id' => $id];
               $data['kategori'] = $this->m_data->edit_data($where, 'kategori')->result();
               $data['title'] = 'Kategori edit';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_kategori_edit', $data);
               $this->load->view('backend/footer');
          }
     }

     //proses hapus kategori
     public function kategori_hapus($id)
     {
          $where = ['kategori_id' => $id];
          $this->m_data->delete_data($where, 'kategori');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('kategori'));
     }
}
