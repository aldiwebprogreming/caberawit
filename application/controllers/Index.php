<?php 

/**
 * 
 */
class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$data['title'] = 'Caberawit';


		$this->db->limit(9);
		$this->db->order_by('id', 'desc');
		$data['produk'] = $this->db->get('tbl_produk')->result_array();
		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('utama/index');
		$this->load->view('template/footer');
	}

	function tentang_kami(){

		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();

		$data['title'] = 'Tentang Caberawit';
		$this->load->view('template/header', $data);
		$this->load->view('utama/tentang_kami');
		$this->load->view('template/footer');
	}

	function produk_kami(){

		$this->db->order_by('id','desc');
		$data['produk'] = $this->db->get('tbl_produk')->result_array();

		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();

		$data['title'] = 'Produk Caberawit';
		$this->load->view('template/header', $data);
		$this->load->view('utama/produk_kami');
		$this->load->view('template/footer');
	}

	function detail_produk($slug){

		$data['det_produk'] = $this->db->get_where('tbl_produk',['slug' => $slug])->row_array();
		$data['produk'] = $data['det_produk']['nama_produk'];

		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();

		$data['title'] = 'Detail Produk';
		$this->load->view('template/header', $data);
		$this->load->view('utama/detail_produk');
		$this->load->view('template/footer');
	}

	function kategori_produk($produk){

		$data['produk'] = $this->db->get_where('tbl_produk',['kategori' => $produk])->result_array();
		$data['kategori'] = $produk;

		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();

		$data['title'] = 'Kategori Produk';
		$this->load->view('template/header', $data);
		$this->load->view('utama/kategori_produk');
		$this->load->view('template/footer');
	}

	function testimoni(){
		$data['testimoni'] = $this->db->get('tbl_testimoni')->result_array();

		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('utama/testimoni_kami');
		$this->load->view('template/footer');
	}

	function kontak_kami(){
		$data['kategoriproduk'] = $this->db->get('tbl_kategori')->result_array();
		$data['title'] = 'Kontak Kami';
		$this->load->view('template/header', $data);
		$this->load->view('utama/kontak_kami');
		$this->load->view('template/footer');
	}


}
?>