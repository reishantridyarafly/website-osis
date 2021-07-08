<?php
defined('BASEPATH') or exit('No direct script access allowed');

//pengaturan backend / Tampilan belakang pengaturan
class Pengaturan extends CI_Controller
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
          $data['pengaturan_view'] = $this->m_data->get_data('pengaturan', 'nama')->result();
          $data['title'] = 'Pengaturan';
          $this->load->view('backend/header', $data);
          $this->load->view('backend/sidebar');
          $this->load->view('dashboard/v_pengaturan', $data);
          $this->load->view('backend/footer');
     }

     //proses edit pengaturan
     public function pengaturan_update()
     {
          $this->form_validation->set_rules('nama', 'Nama', 'required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
          $this->form_validation->set_message('required', '%s masih kosong');
          if ($this->form_validation->run() == false) {
               $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
               $data['pengaturan_view'] = $this->m_data->get_data('pengaturan', 'nama')->result();
               $data['title'] = 'Pengaturan';
               $this->load->view('backend/header', $data);
               $this->load->view('backend/sidebar');
               $this->load->view('dashboard/v_pengaturan', $data);
               $this->load->view('backend/footer');
          } else {
               $config['upload_path'] = './gambar/website/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               // $this->upload->initialize($config);
               if (!empty($_FILES['logo']['name'])) {
                    if ($this->upload->do_upload('logo')) {
                         $gambar = $this->upload->data();
                         //Compress Image
                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/website/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 450;
                         $config['height'] = 480;
                         $config['new_image'] = './gambar/website/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $nama = $this->input->post('nama');
                         $deskripsi = $this->input->post('deskripsi');
                         $link_facebook = $this->input->post('link_facebook');
                         $link_twitter = $this->input->post('link_twitter');
                         $link_instagram = $this->input->post('link_instagram');
                         $link_whatsapp = $this->input->post('link_whatsapp');
                         $logo = $gambar['file_name'];

                         $old_image = $this->m_data->get_data('pengaturan')->row();
                         if ($old_image->logo != null) {
                              $target_file = './gambar/website/' . $old_image->logo;
                              unlink($target_file);
                         }
                         $gambar = $this->upload->data('file_name');

                         $where = [];

                         $data = [
                              'nama' => $nama,
                              'deskripsi' => $deskripsi,
                              'logo' => $logo,
                              'link_facebook' => $link_facebook,
                              'link_twitter' => $link_twitter,
                              'link_instagram' => $link_instagram,
                              'link_whatsapp' => $link_whatsapp,
                         ];

                         $this->m_data->update_data($where, $data, 'pengaturan');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('pengaturan'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('pengaturan'));
                    }
               } else {
                    $nama = $this->input->post('nama');
                    $deskripsi = $this->input->post('deskripsi');
                    $link_facebook = $this->input->post('link_facebook');
                    $link_twitter = $this->input->post('link_twitter');
                    $link_instagram = $this->input->post('link_instagram');
                    $link_whatsapp = $this->input->post('link_whatsapp');

                    $where = [];

                    $data = [
                         'nama' => $nama,
                         'deskripsi' => $deskripsi,
                         'link_facebook' => $link_facebook,
                         'link_twitter' => $link_twitter,
                         'link_instagram' => $link_instagram,
                         'link_whatsapp' => $link_whatsapp,
                    ];

                    $this->m_data->update_data($where, $data, 'pengaturan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('pengaturan'));
               }
          }
     }
}
