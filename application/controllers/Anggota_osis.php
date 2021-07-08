<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Anggota OSIS Frontend / Tampilan Depan Anggota OSIS
class Anggota_osis extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          $this->load->model('m_data');
     }

     //Tampilan Utama Anggota OSIS
     public function index()
     {
          //data pengaturan website
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

          //konfigurasi pagination
          $this->load->library('pagination');
          $config['base_url'] = site_url('anggota_osis/index'); //site url
          $config['total_rows'] = $this->db->count_all('siswa'); //total row
          $config['per_page'] = 12;  //show record per halaman
          $config["uri_segment"] = 3;  // uri parameter
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = floor($choice);

          // Membuat Style pagination untuk BootStrap v4
          $config['first_link'] = 'First';
          $config['last_link'] = 'Last';
          $config['next_link'] = 'Next';
          $config['prev_link'] = 'Prev';
          $config['full_tag_open'] = ' <div class="blog-pagination"><ul class="justify-content-center">';
          $config['full_tag_close'] = '</ul></div>';
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
          $config['cur_tag_open'] = '<li class="active"><a>';
          $config['cur_tag_close'] = '</a></li>';
          $config['next_tag_open'] = '<li>';
          $config['next_tagl_close'] = 'Next</li>';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tagl_close'] = 'Next</li>';
          $config['first_tag_open'] = '<li>';
          $config['first_tagl_close'] = '</li>';
          $config['last_tag_open'] = '<li>';
          $config['last_tagl_close'] = '</li>';

          $this->pagination->initialize($config);

          $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

          //SEO META
          $data['meta_keyword'] = $data['pengaturan']->nama;
          $data['meta_description'] = $data['pengaturan']->deskripsi;

          $data['siswa'] = $this->db->query("SELECT siswa.*,kelas_nama,jurusan_nama,jabatan_nama FROM siswa 
                                                  JOIN kelas ON siswa_kelas_id = kelas_id
                                                  JOIN jurusan ON siswa_jurusan_id = jurusan_id
                                                  JOIN jabatan ON siswa_jabatan_id = jabatan_id WHERE status='1' ORDER BY siswa_nama ASC LIMIT $config[per_page] OFFSET $data[page]")->result();

          $this->load->view('frontend/v_header', $data);
          $this->load->view('frontend/v_topbar', $data);
          $this->load->view('frontend/v_siswa', $data);
          $this->load->view('frontend/v_footer', $data);
     }
}
