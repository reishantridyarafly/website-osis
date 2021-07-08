<?php
defined('BASEPATH') or exit('No direct script access allowed');
//tentang Frontend / Tampilan Depan tentang
class Tentang extends CI_Controller
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

          //SEO META
          $data['meta_keyword'] = $data['pengaturan']->nama;
          $data['meta_description'] = $data['pengaturan']->deskripsi;

          $this->load->view('frontend/v_header', $data);
          $this->load->view('frontend/v_topbar', $data);
          $this->load->view('frontend/v_tentang', $data);
          $this->load->view('frontend/v_footer', $data);
     }
}
