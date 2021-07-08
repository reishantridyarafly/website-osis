<?php
defined('BASEPATH') or exit('No direct script access allowed');

//pengumuman Frontend / Tampilan Depan pengumuman
class Pengumuman_kegiatan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          $this->load->model('m_data');
     }

     //tampilan utama
     public function index()
     {
          //data pengaturan website
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

          //konfigurasi pagination
          $this->load->library('pagination');
          $config['base_url'] = site_url('pengumuman_kegiatan/index'); //site url
          $config['total_rows'] = $this->db->count_all('pengumuman'); //total row
          $config['per_page'] = 5;  //show record per halaman
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

          $data['pengumuman'] = $this->db->query("SELECT * FROM pengumuman ORDER BY tanggal_mulai DESC LIMIT $config[per_page] OFFSET $data[page]")->result();

          $this->load->view('frontend/v_header', $data);
          $this->load->view('frontend/v_topbar', $data);
          $this->load->view('frontend/v_pengumuman', $data);
          $this->load->view('frontend/v_footer', $data);
     }
}
