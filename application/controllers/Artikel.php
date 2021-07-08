<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Artikel Backend / Tampilan Belakang Artikel
class Artikel extends CI_Controller
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
          $data['artikel'] = $this->db->query("SELECT * FROM artikel,kategori,pengguna WHERE artikel_kategori=kategori_id and artikel_author=pengguna_id order by artikel_id desc")->result();
          $data['title'] = 'Artikel';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_artikel', $data);
          $this->load->view('backend/footer');
     }

     //tampilan tambah artikel
     public function artikel_tambah()
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
          $data['title'] = 'Artikel tambah';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_artikel_tambah', $data);
          $this->load->view('backend/footer');
     }

     //proses tambah artikel
     public function artikel_aksi()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[artikel.artikel_judul]');
          $this->form_validation->set_rules('konten', 'Konten', 'required');
          $this->form_validation->set_rules('kategori', 'Kategori', 'required');
          if (empty($_FILES['sampul']['name'])) {
               $this->form_validation->set_rules('sampul', 'Gambar sampul', 'required');
          }
          $this->form_validation->set_message('required', '%s masih kosong');

          if ($this->form_validation->run() != false) {
               $config['upload_path'] = './gambar/artikel/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('sampul')) {
                    //mengambil data tentang gambar
                    $gambar = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './gambar/artikel/' . $gambar['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '80%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './gambar/artikel/' . $gambar['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $tanggal = date('Y-m-d H:i:s');
                    $judul = $this->input->post('judul');
                    $slug = strtolower(url_title($judul));
                    $konten = $this->input->post('konten');
                    $sampul = $gambar['file_name'];
                    $author = $this->session->userdata('id');
                    $kategori = $this->input->post('kategori');
                    $status = $this->input->post('status');

                    $data = [
                         'artikel_tanggal' => $tanggal,
                         'artikel_judul' => $judul,
                         'artikel_slug' => $slug,
                         'artikel_konten' => $konten,
                         'artikel_sampul' => $sampul,
                         'artikel_author' => $author,
                         'artikel_kategori' => $kategori,
                         'artikel_status' => $status,
                    ];
                    $this->m_data->insert_data($data, 'artikel');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('artikel'));
               } else {
                    $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
                    $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
                    $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
                    $data['title'] = 'Artikel tambah';
                    $this->load->view('backend/header', $data);
                    $this->load->view('backend/sidebar');
                    $this->load->view('dashboard/v_artikel_tambah', $data);
                    $this->load->view('backend/footer');
               }
          } else {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
               $data['title'] = 'Artikel tambah';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_artikel_tambah', $data);
               $this->load->view('backend/footer');
          }
     }

     //tampilan edit artikel
     public function artikel_edit($id)
     {
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
          $where = ['artikel_id' => $id];
          $data['artikel'] = $this->m_data->edit_data($where, 'artikel')->result();
          $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
          $data['title'] = 'Artikel edit';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_artikel_edit', $data);
          $this->load->view('backend/footer');
     }

     //proses edit artikel
     public function artikel_update()
     {
          $this->form_validation->set_rules('judul', 'Judul', 'required');
          $this->form_validation->set_rules('konten', 'Konten', 'required');
          $this->form_validation->set_rules('kategori', 'Kategori', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');
          if ($this->form_validation->run() == false) {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $id = $this->input->post('id');
               $where = ['artikel_id' => $id];
               $data['artikel'] = $this->m_data->edit_data($where, 'artikel')->result();
               $data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
               $data['title'] = 'Artikel edit';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_artikel_edit', $data);
               $this->load->view('backend/footer');
          } else {
               $config['upload_path'] = './gambar/artikel/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               // $this->upload->initialize($config);
               if (!empty($_FILES['sampul']['name'])) {
                    if ($this->upload->do_upload('sampul')) {
                         $gambar = $this->upload->data();
                         //Compress Image
                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/artikel/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 600;
                         $config['height'] = 400;
                         $config['new_image'] = './gambar/artikel/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $id = $this->input->post('id');
                         $judul = $this->input->post('judul');
                         $slug = strtolower(url_title($judul));
                         $konten = $this->input->post('konten');
                         $kategori = $this->input->post('kategori');
                         $status = $this->input->post('status');
                         $sampul = $gambar['file_name'];

                         $old_image = $this->db->get_where('artikel', ['artikel_id' => $id])->row();
                         if ($old_image->artikel_sampul != null) {
                              $target_file = './gambar/artikel/' . $old_image->artikel_sampul;
                              unlink($target_file);
                         }

                         $where = [
                              'artikel_id' => $id
                         ];

                         $data = [
                              'artikel_judul' => $judul,
                              'artikel_slug' => $slug,
                              'artikel_konten' => $konten,
                              'artikel_kategori' => $kategori,
                              'artikel_status' => $status,
                              'artikel_sampul' => $sampul
                         ];

                         $this->m_data->update_data($where, $data, 'artikel');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('artikel'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('artikel'));
                    }
               } else {
                    $id = $this->input->post('id');
                    $judul = $this->input->post('judul');
                    $slug = strtolower(url_title($judul));
                    $konten = $this->input->post('konten');
                    $kategori = $this->input->post('kategori');
                    $status = $this->input->post('status');

                    $where = [
                         'artikel_id' => $id
                    ];

                    $data = [
                         'artikel_judul' => $judul,
                         'artikel_slug' => $slug,
                         'artikel_konten' => $konten,
                         'artikel_kategori' => $kategori,
                         'artikel_status' => $status,
                    ];

                    $this->m_data->update_data($where, $data, 'artikel');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('artikel'));
               }
          }
     }

     //proses hapus artkel
     public function artikel_hapus($id)
     {
          $artikel =  $this->db->get_where('artikel', ['artikel_id' => $id])->row();
          if ($artikel->artikel_sampul != null) {
               $target_file = './gambar/artikel/' . $artikel->artikel_sampul;
               unlink($target_file);
          }
          $where = ['artikel_id' => $id];
          $this->m_data->delete_data($where, 'artikel');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('artikel'));
     }
}
