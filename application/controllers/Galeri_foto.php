<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Galeri_foto Frontend / Tampilan Depan Galeri_foto
class Galeri_foto extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          $this->load->model('m_data');
     }

     //tamppilan utama
     public function index()
     {
          //data pengaturan website
          $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

          //konfigurasi pagination
          $this->load->library('pagination');
          $config['base_url'] = site_url('galeri_foto/index'); //site url
          $config['total_rows'] = $this->db->count_all('galeri'); //total row
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

          $data['galeri'] = $this->db->query("SELECT galeri.*,album.* FROM galeri 
                                                       JOIN album ON galeri_album_id = album_id ORDER BY galeri_tanggal DESC LIMIT $config[per_page] OFFSET $data[page]")->result();
          $data['album'] = $this->db->query("SELECT * FROM album ORDER BY album_tanggal DESC LIMIT 5")->result();

          //SEO META
          $data['meta_keyword'] = $data['pengaturan']->nama;
          $data['meta_description'] = $data['pengaturan']->deskripsi;

          $this->load->view('frontend/v_header', $data);
          $this->load->view('frontend/v_topbar', $data);
          $this->load->view('frontend/v_galeri', $data);
          $this->load->view('frontend/v_footer', $data);
     }
}
