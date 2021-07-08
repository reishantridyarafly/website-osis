<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Galeri backend / Tampilan belakang Galeri
class Galeri extends CI_Controller
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
          $data['gambar'] = $this->db->query("SELECT galeri.*,album_nama FROM galeri 
                                                  JOIN album ON galeri_album_id = album_id ORDER BY galeri_tanggal DESC")->result();
          $data['title'] = 'Galeri';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_galeri', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah galeri
     public function galeri_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
          $data['title'] = 'Galeri';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_galeri_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah artikel
     public function galeri_aksi()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'required');
          $this->form_validation->set_rules('album', 'Album', 'required');
          if (empty($_FILES['foto']['name'])) {
               $this->form_validation->set_rules('foto', 'Foto', 'required');
          }
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $config['upload_path'] = './gambar/galeri/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('foto')) {
                    //mengambil data tentang gambar
                    $gambar = $this->upload->data();

                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './gambar/galeri/' . $gambar['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '80%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './gambar/galeri/' . $gambar['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $judul = $this->input->post('judul');
                    $foto = $gambar['file_name'];
                    $album = $this->input->post('album');
                    $author = $this->session->userdata('nama');

                    $data = [
                         'galeri_judul' => $judul,
                         'galeri_gambar' => $foto,
                         'galeri_album_id' => $album,
                         'galeri_author' => $author
                    ];
                    $this->m_data->insert_data($data, 'galeri');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('galeri'));
               } else {
                    $this->form_validation->set_rules('foto', 'Foto', 'required');
                    $this->form_validation->set_message('required', '%s masih kosong');
                    $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
                    $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
                    $data['title'] = 'Galeri';
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/sidebar');
                    $this->load->view('dashboard/v_galeri_tambah', $data);
                    $this->load->view('backend/footer');
               }
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
               $data['title'] = 'Galeri';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_galeri_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit galeri
     public function galeri_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['galeri_id' => $id];
          $data['galeri'] = $this->m_data->edit_data($where, 'galeri')->result();
          $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
          $data['title'] = 'Galeri';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_galeri_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit artikel
     public function galeri_update()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'required');
          $this->form_validation->set_rules('album', 'Album', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');
          if ($this->form_validation->run() == false) {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['galeri_id' => $id];
               $data['galeri'] = $this->m_data->edit_data($where, 'galeri')->result();
               $data['album'] = $this->m_data->get_data('album', 'album_nama', 'asc')->result();
               $data['title'] = 'Galeri';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_galeri_edit', $data);
               $this->load->view('backend/footer');
          } else {
               $config['upload_path'] = './gambar/galeri/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               // $this->upload->initialize($config);
               if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                         $gambar = $this->upload->data();
                         //Compress Image
                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/galeri/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 600;
                         $config['height'] = 400;
                         $config['new_image'] = './gambar/galeri/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $id = $this->input->post('id');
                         $judul = $this->input->post('judul');
                         $album = $this->input->post('album');
                         $author = $this->session->userdata('nama');
                         $foto = $_FILES['foto']['name'];

                         $old_image = $this->db->get_where('galeri', ['galeri_id' => $id])->row();
                         if ($old_image->galeri_gambar != null) {
                              $target_file = './gambar/galeri/' . $old_image->galeri_gambar;
                              unlink($target_file);
                         }

                         $where = [
                              'galeri_id' => $id
                         ];

                         $data = [
                              'galeri_judul' => $judul,
                              'galeri_album_id' => $album,
                              'galeri_author' => $author,
                              'galeri_gambar' => $foto,
                         ];

                         $this->m_data->update_data($where, $data, 'galeri');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('galeri'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('galeri'));
                    }
               } else {
                    $id = $this->input->post('id');
                    $judul = $this->input->post('judul');
                    $album = $this->input->post('album');
                    $author = $this->session->userdata('nama');

                    $where = [
                         'galeri_id' => $id
                    ];

                    $data = [
                         'galeri_judul' => $judul,
                         'galeri_album_id' => $album,
                         'galeri_author' => $author,
                    ];


                    $this->m_data->update_data($where, $data, 'galeri');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('galeri'));
               }
          }
     }

     //hapus artikel
     public function galeri_hapus($id)
     {
          $galeri =  $this->db->get_where('galeri', ['galeri_id' => $id])->row();
          if ($galeri->galeri_gambar != null) {
               $target_file = './gambar/galeri/' . $galeri->galeri_gambar;
               unlink($target_file);
          }
          $where = ['galeri_id' => $id];
          $this->m_data->delete_data($where, 'galeri');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('galeri'));
     }
}
