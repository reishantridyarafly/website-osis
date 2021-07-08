<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Agenda Backend / Tampilan Belakang Agenda
class Agenda extends CI_Controller
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
          $data['agenda'] = $this->m_data->get_data('agenda', 'agenda_tanggal', 'asc')->result();
          $data['title'] = 'Agenda';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_agenda', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah agenda
     public function agenda_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['title'] = 'Tambah Agenda';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_agenda_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah agenda
     public function agenda_aksi()
     {
          $this->form_validation->set_rules('nama_agenda', 'Agenda', 'trim|required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
          $this->form_validation->set_rules('agenda_mulai', 'Agenda mulai', 'trim|required');
          $this->form_validation->set_rules('agenda_selesai', 'Agenda selesai', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
          if ($this->form_validation->run() != false) {
               $nama_agenda = $this->input->post('nama_agenda');
               $deskripsi = $this->input->post('deskripsi');
               $agenda_mulai = $this->input->post('agenda_mulai');
               $agenda_selesai = $this->input->post('agenda_selesai');
               $tempat = $this->input->post('tempat');
               $waktu = $this->input->post('waktu');

               $data = [
                    'agenda_nama' => $nama_agenda,
                    'agenda_deskripsi' => $deskripsi,
                    'agenda_mulai' => $agenda_mulai,
                    'agenda_selesai' => $agenda_selesai,
                    'agenda_tempat' => $tempat,
                    'agenda_waktu' => $waktu,
                    'agenda_author' => $this->session->userdata('nama'),
               ];

               $this->m_data->insert_data($data, 'agenda');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('agenda'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['title'] = 'Tambah Agenda';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_agenda_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit agenda
     public function agenda_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['agenda_id' => $id];
          $data['agenda'] = $this->m_data->edit_data($where, 'agenda')->result();
          $data['title'] = 'Edit Agenda';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_agenda_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit agenda
     public function agenda_update()
     {
          $this->form_validation->set_rules('nama_agenda', 'Agenda', 'trim|required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
          $this->form_validation->set_rules('agenda_mulai', 'Agenda mulai', 'trim|required');
          $this->form_validation->set_rules('agenda_selesai', 'Agenda selesai', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
          if ($this->form_validation->run() != false) {
               $id = $this->input->post('id');
               $nama_agenda = $this->input->post('nama_agenda');
               $deskripsi = $this->input->post('deskripsi');
               $agenda_mulai = $this->input->post('agenda_mulai');
               $agenda_selesai = $this->input->post('agenda_selesai');
               $tempat = $this->input->post('tempat');
               $waktu = $this->input->post('waktu');

               $where = ['agenda_id' => $id];

               $data = [
                    'agenda_nama' => $nama_agenda,
                    'agenda_deskripsi' => $deskripsi,
                    'agenda_mulai' => $agenda_mulai,
                    'agenda_selesai' => $agenda_selesai,
                    'agenda_tempat' => $tempat,
                    'agenda_waktu' => $waktu,
                    'agenda_author' => $this->session->userdata('nama'),
               ];

               $this->m_data->update_data($where, $data, 'agenda');
               if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil<strong> diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
               }
               redirect(base_url('agenda'));
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['agenda_id' => $id];
               $data['agenda'] = $this->m_data->edit_data($where, 'agenda')->result();
               $data['title'] = 'Edit Agenda';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_agenda_edit', $data);
               $this->load->view('backend/footer');
          }
     }

     //hapus agenda
     public function agenda_hapus($id)
     {
          $where = ['agenda_id' => $id];
          $this->m_data->delete_data($where, 'agenda');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('agenda'));
     }
}
