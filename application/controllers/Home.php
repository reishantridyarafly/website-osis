<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Home Frontend / Tampilan Depan Home
class Home extends CI_Controller
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
		// //3 artikel terbaru
		// $data['artikel'] = $this->db->query("SELECT * FROM artikel,pengguna,kategori 
		// 									WHERE artikel_status='publish' AND artikel_author=pengguna_id
		// 									AND artikel_kategori=kategori_id ORDER BY artikel_id DESC LIMIT 3")->result();

		//pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$data['pengumuman'] = $this->db->query("SELECT * FROM pengumuman ORDER BY pengumuman_tanggal DESC LIMIT 3")->result();
		$data['agenda_detail'] = $this->db->query("SELECT * FROM agenda ORDER BY agenda_tanggal ASC LIMIT 3")->result();
		$data['siswa'] = $this->m_data->get_data('siswa')->num_rows();
		$data['agenda'] = $this->m_data->get_data('agenda')->num_rows();
		$data['artikel'] = $this->m_data->get_data('artikel')->num_rows();
		$data['pengumuman_rows'] = $this->m_data->get_data('pengumuman')->num_rows();

		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_topbar_home', $data);
		$this->load->view('frontend/v_homepage', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	//tampilan detail blog
	public function single($slug)
	{
		$data['artikel'] = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE artikel_status='publish'
											AND artikel_author=pengguna_id
											AND artikel_kategori=kategori_id
											AND artikel_slug='$slug'")->result();

		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();

		//SEO META
		if (count($data['artikel']) > 0) {
			$data['meta_keyword'] = $data['artikel'][0]->artikel_judul;
			$data['meta_description'] = substr($data['artikel'][0]->artikel_konten, 0, 100);
		} else {
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
		}

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_topbar', $data);
		$this->load->view('frontend/v_singel', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	//tampilan blog
	public function blog()
	{
		//data pengaturan
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		//SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_data = $this->m_data->get_data('artikel')->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'blog/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;

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

		$form = $this->uri->segment(2);
		if ($form == "") {
			$form = 0;
		}
		$this->pagination->initialize($config);

		$data['artikel'] = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE
										artikel_status='publish' 
										AND artikel_author=pengguna_id
										AND artikel_kategori=kategori_id
										ORDER BY artikel_tanggal DESC LIMIT $config[per_page] OFFSET $form")->result();
		$data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_topbar', $data);
		$this->load->view('frontend/v_blog', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	//tampilan kategori blog
	public function kategori($slug)
	{
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_artikel = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE
									artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=kategori_id AND
									kategori_slug='$slug'")->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'kategori/' . $slug;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 2;

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

		$from = $this->uri->segment(3);
		if ($from == "") {
			$from = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE
						artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=kategori_id AND
						kategori_slug='$slug' ORDER BY artikel_tanggal DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();


		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_topbar', $data);
		$this->load->view('frontend/v_kategori', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	//tampilan search/pencarian
	public function search()
	{
		//mengambil nilai keyword dari form pencarian
		$cari = htmlentities((trim($this->input->post('cari', true))) ? trim($this->input->post('cari', true)) : '');

		//jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
		$cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;

		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		//SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_artikel = $this->db->query("SELECT * FROM artikel,pengguna,kategori 
										WHERE artikel_status='publish' 
										AND artikel_author=pengguna_id
										AND artikel_kategori=kategori_id
										AND (artikel_judul LIKE '%$cari%' 
										OR artikel_konten LIKE '%$cari%')")->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'search/' . $cari;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 5;

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

		$form = $this->uri->segment(3);
		if ($form == '') {
			$form = 0;
		}
		$this->pagination->initialize($config);

		$data['artikel'] =  $this->db->query("SELECT * FROM artikel,pengguna,kategori 
										WHERE artikel_status='publish' 
										AND artikel_author=pengguna_id
										AND artikel_kategori=kategori_id
										AND (artikel_judul LIKE '%$cari%' 
										OR artikel_konten LIKE '%$cari%')
										ORDER BY artikel_id DESC LIMIT $config[per_page] OFFSET $form")->result();
		$data['kategori'] = $this->m_data->get_data('kategori', 'kategori_nama', 'asc')->result();
		$data['cari'] = $cari;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_topbar', $data);
		$this->load->view('frontend/v_search', $data);
		$this->load->view('frontend/v_footer', $data);
	}
}
