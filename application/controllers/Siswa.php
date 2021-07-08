<?php
defined('BASEPATH') or exit('No direct script access allowed');

//siswa backend / Tampilan belakang backend
class Siswa extends CI_Controller
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
          $data['siswa'] = $this->db->query("SELECT siswa.*,kelas_nama,jurusan_nama,jabatan_nama FROM siswa 
                                             JOIN kelas ON siswa_kelas_id = kelas_id
                                             JOIN jurusan ON siswa_jurusan_id = jurusan_id
                                             JOIN jabatan ON siswa_jabatan_id = jabatan_id ORDER BY siswa_nama ASC")->result();
          $data['title'] = 'Anggota Osis';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_siswa', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah siswa
     public function siswa_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['kelas'] = $this->m_data->get_data('kelas')->result();
          $data['jurusan'] = $this->m_data->get_data('jurusan', 'jurusan_nama', 'asc')->result();
          $data['jabatan'] = $this->m_data->get_data('jabatan', 'jabatan_nama', 'asc')->result();
          $data['title'] = 'Anggota Osis';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_siswa_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah siswa
     public function siswa_aksi()
     {
          $this->form_validation->set_rules('nis', 'NIS', 'trim|min_length[7]');
          $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
          $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required');
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
          $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
          $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong');
          $this->form_validation->set_message('min_length', '%s minimal 5 karakter');

          if ($this->form_validation->run() != false) {
               $config['upload_path'] = './gambar/osis/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('foto')) {
                    //mengambil data tentang gambar
                    $gambar = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './gambar/osis/' . $gambar['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '80%';
                    $config['width'] = 354;
                    $config['height'] = 472;
                    $config['new_image'] = './gambar/osis/' . $gambar['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $nis = $this->input->post('nis');
                    $nama = $this->input->post('nama');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $jabatan = $this->input->post('jabatan');
                    $kelas = $this->input->post('kelas');
                    $jurusan = $this->input->post('jurusan');
                    $foto = $gambar['file_name'];

                    $data = [
                         'siswa_nis' => $nis,
                         'siswa_nama' => $nama,
                         'siswa_jenis_kelamin' => $jenis_kelamin,
                         'siswa_jabatan_id' => $jabatan,
                         'siswa_kelas_id' => $kelas,
                         'siswa_jurusan_id' => $jurusan,
                         'status' => "1",
                         'siswa_photo' => $foto
                    ];

                    $this->m_data->insert_data($data, 'siswa');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('siswa'));
               } else {
                    $nis = $this->input->post('nis');
                    $nama = $this->input->post('nama');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $jabatan = $this->input->post('jabatan');
                    $kelas = $this->input->post('kelas');
                    $jurusan = $this->input->post('jurusan');

                    $data = [
                         'siswa_nis' => $nis,
                         'siswa_nama' => $nama,
                         'siswa_jenis_kelamin' => $jenis_kelamin,
                         'siswa_jabatan_id' => $jabatan,
                         'siswa_kelas_id' => $kelas,
                         'siswa_jurusan_id' => $jurusan,
                         'status' => "1",
                    ];
                    $this->m_data->insert_data($data, 'siswa');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('siswa'));
               }
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['kelas'] = $this->m_data->get_data('kelas')->result();
               $data['jurusan'] = $this->m_data->get_data('jurusan', 'jurusan_nama', 'asc')->result();
               $data['jabatan'] = $this->m_data->get_data('jabatan', 'jabatan_nama', 'asc')->result();
               $data['title'] = 'Anggota Osis';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_siswa_tambah', $data);
               $this->load->view('backend/footer');
          }
     }
     //tampilan edit siswa
     public function siswa_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['siswa_id' => $id];
          $data['siswa'] = $this->m_data->edit_data($where, 'siswa')->result();
          $data['kelas'] = $this->m_data->get_data('kelas')->result();
          $data['jurusan'] = $this->m_data->get_data('jurusan', 'jurusan_nama', 'asc')->result();
          $data['jabatan'] = $this->m_data->get_data('jabatan', 'jabatan_nama', 'asc')->result();
          $data['title'] = 'Anggota Osis';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_siswa_edit', $data);
          $this->load->view('backend/footer');
     }
     //proses siswa
     public function siswa_update()
     {
          $this->form_validation->set_rules('nis', 'NIS', 'trim|min_length[7]');
          $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
          $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required');
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
          $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
          $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
          $this->form_validation->set_rules('status', 'Status', 'trim|required');
          $this->form_validation->set_message('required', '%s masih kosong');
          $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
          if ($this->form_validation->run() == false) {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['siswa_id' => $id];
               $data['siswa'] = $this->m_data->edit_data($where, 'siswa')->result();
               $data['kelas'] = $this->m_data->get_data('kelas')->result();
               $data['jurusan'] = $this->m_data->get_data('jurusan', 'jurusan_nama', 'asc')->result();
               $data['jabatan'] = $this->m_data->get_data('jabatan', 'jabatan_nama', 'asc')->result();
               $data['title'] = 'Anggota Osis';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_siswa_edit', $data);
               $this->load->view('backend/footer');
          } else {
               $config['upload_path'] = './gambar/osis/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               // $this->upload->initialize($config);
               if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                         $gambar = $this->upload->data();
                         //Compress Image
                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/osis/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 354;
                         $config['height'] = 472;
                         $config['new_image'] = './gambar/osis/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $id = $this->input->post('id');
                         $nis = $this->input->post('nis');
                         $nama = $this->input->post('nama');
                         $jenis_kelamin = $this->input->post('jenis_kelamin');
                         $jabatan = $this->input->post('jabatan');
                         $kelas = $this->input->post('kelas');
                         $jurusan = $this->input->post('jurusan');
                         $status = $this->input->post('status');
                         $foto = $gambar['file_name'];

                         $old_image = $this->db->get_where('siswa', ['siswa_id' => $id])->row();
                         if ($old_image->siswa_photo != null) {
                              $target_file = './gambar/osis/' . $old_image->siswa_photo;
                              unlink($target_file);
                         }

                         $where = [
                              'siswa_id' => $id
                         ];

                         $data = [
                              'siswa_nis' => $nis,
                              'siswa_nama' => $nama,
                              'siswa_jenis_kelamin' => $jenis_kelamin,
                              'siswa_jabatan_id' => $jabatan,
                              'siswa_kelas_id' => $kelas,
                              'siswa_jurusan_id' => $jurusan,
                              'status' => $status,
                              'siswa_photo' => $foto,
                         ];

                         $this->m_data->update_data($where, $data, 'siswa');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('siswa'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('siswa'));
                    }
               } else {
                    $id = $this->input->post('id');
                    $nis = $this->input->post('nis');
                    $nama = $this->input->post('nama');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $jabatan = $this->input->post('jabatan');
                    $kelas = $this->input->post('kelas');
                    $jurusan = $this->input->post('jurusan');
                    $status = $this->input->post('status');

                    $where = [
                         'siswa_id' => $id
                    ];

                    $data = [
                         'siswa_nis' => $nis,
                         'siswa_nama' => $nama,
                         'siswa_jenis_kelamin' => $jenis_kelamin,
                         'siswa_jabatan_id' => $jabatan,
                         'siswa_kelas_id' => $kelas,
                         'siswa_jurusan_id' => $jurusan,
                         'status' => $status,
                    ];


                    $this->m_data->update_data($where, $data, 'siswa');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('siswa'));
               }
          }
     }
     //hapus siswa
     public function siswa_hapus($id)
     {
          $siswa =  $this->db->get_where('siswa', ['siswa_id' => $id])->row();
          if ($siswa->siswa_photo != null) {
               $target_file = './gambar/osis/' . $siswa->siswa_photo;
               unlink($target_file);
          }
          $where = ['siswa_id' => $id];
          $this->m_data->delete_data($where, 'siswa');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('siswa'));
     }
     //tampilan detail siswa
     public function siswa_detail($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['siswa'] = $this->db->query("SELECT siswa.*,kelas_nama,jurusan_nama,jabatan_nama FROM siswa 
          JOIN kelas ON siswa_kelas_id = kelas_id
          JOIN jurusan ON siswa_jurusan_id = jurusan_id
          JOIN jabatan ON siswa_jabatan_id = jabatan_id WHERE siswa_id='$id'")->result();
          $data['title'] = 'Anggota Osis';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_siswa_detail', $data);
          $this->load->view('backend/footer');
     }
}
