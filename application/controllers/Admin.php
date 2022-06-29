<?php 

	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			if ($this->session->username == null) {
				
				redirect('login/');
			}
		}


		function index(){

			$data['produk'] = $this->db->get('tbl_produk')->num_rows();
			$data['kategori'] = $this->db->get('tbl_kategori')->num_rows();
			$data['admin'] = $this->db->get('tbl_admin')->num_rows();

			$this->load->view('template_admin/header');
			$this->load->view('admin/index', $data);
			$this->load->view('template_admin/footer');
		}

		function data_produk(){

			$data['produk'] = $this->db->get('tbl_produk')->result_array();
			$data['kategori_produk'] = $this->db->get('tbl_kategori')->result_array();
			$data['satuan_harga'] = $this->db->get('tbl_satuan_harga')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/data_produk', $data);
			$this->load->view('template_admin/footer');
		}

		function tambah_produk(){
			if (isset($_POST['kirim'])) {

				$config['upload_path']          = './assets/produk/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['min_size']             = 9000000;
				$config['remove_spaces']        = false;


				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('img')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Gambar yang anda masukan terlalu besar", "", "warning" );');
					redirect('admin/data_produk');

				}else{

					$slug = str_replace(" ", "-", $this->input->post('nama_produk'));

					$data = [

						'nama_produk' => $this->input->post('nama_produk'),
						'keterangan' => $this->input->post('keterangan'),
						'kategori' => $this->input->post('kategori'),
						'satuan_harga' => $this->input->post('satuan_harga'),
						'harga' => $this->input->post('harga'),
						'slug' => $slug,
						'gambar' => $_FILES['img']['name'],
					];

					$this->db->insert('tbl_produk', $data);
					$this->session->set_flashdata('message', 'swal("Sukses!", "Produk berhasil ditambah", "success");');
					redirect('admin/data_produk');

				}

			}
		}

		function hapus_produk(){

			$id = $this->input->post('id');

			$this->db->delete('tbl_produk',['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Data berhasil dihapus", "success");');
			redirect('admin/data_produk');
		}

		function edit_produk($id){
			$data['produk'] = $this->db->get_where('tbl_produk',['id' => $id])->row_array();
			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();

			$data['satuan_harga'] = $this->db->get('tbl_satuan_harga')->result_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/edit_produk', $data);
			$this->load->view('template_admin/footer');
		}

		function act_edit_produk(){

			$id = $this->input->post('id');

			$config['upload_path']          = './assets/produk/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['min_size']             = 9000000;
			$config['remove_spaces']        = false;

			$img = $_FILES['img']['name'];

			if ($img == true) {

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('img')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Opps", "Anda gagal upload gambar", "warning" );');
					redirect("admin/edit_produk/$id");

				}else{


				// $kode = "produk-".rand(1, 100000);

					$data = [
						'nama_produk' => $this->input->post('nama_produk'),
						'keterangan' => $this->input->post('keterangan'),
						'harga' => $this->input->post('harga'),
						'satuan_harga' => $this->input->post('satuan_harga'),
						'kategori' => $this->input->post('kategori_produk'),
						'slug' => 	$slug = str_replace(" ", "-", $this->input->post('nama_produk')),
						'gambar' => $_FILES['img']['name'],
					];

					$this->db->where('id',$this->input->post('id'));
					$this->db->update('tbl_produk', $data);
					$this->session->set_flashdata('message', 'swal("Sukses!", "Produk barhasil di ubah", "success");');
					redirect('admin/data_produk');

				}
			}else{

				$data = [
					
					'nama_produk' => $this->input->post('nama_produk'),
					'keterangan' => $this->input->post('keterangan'),
					'harga' => $this->input->post('harga'),
					'satuan_harga' => $this->input->post('satuan_harga'),
					'kategori' => $this->input->post('kategori_produk'),
					'slug' => 	$slug = str_replace(" ", "-", $this->input->post('nama_produk')),
					
				];

				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_produk', $data);
				$this->session->set_flashdata('message', 'swal("Sukses!", "Produk barhasil di ubah", "success");');
				redirect('admin/data_produk');

			}

		}




		function data_kategori(){

			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/data_kategori', $data);
			$this->load->view('template_admin/footer');
		}

		function tambah_kategori(){
			$data = [
				'nama_kategori' => $this->input->post('nama_kategori'), 
			];	

			$this->db->insert('tbl_kategori', $data);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Kategori berhasil ditambah", "success");');
			redirect('admin/data_kategori');

		}

		function edit_kategori($id){

			$data['kate'] = $this->db->get_where('tbl_kategori',['id' => $id])->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/edit_kategori', $data);
			$this->load->view('template_admin/footer');
		}


		function act_edit_kategori(){

			$data = [
				'nama_kategori' => $this->input->post('nama_kategori')
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_kategori', $data);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Kategori barhasil di ubah", "success");');
			redirect('admin/data_kategori');


		}

		function hapus_kategori(){

			$id = $this->input->post('id');
			$this->db->delete('tbl_kategori',['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Data berhasil dihapus", "success");');
			redirect('admin/data_kategori');
		}

		function data_admin(){
			$data['admin'] = $this->db->get('tbl_admin')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/data_admin', $data);
			$this->load->view('template_admin/footer');
		}

		function tambah_admin(){

			$data = [
				'username' => $this->input->post('username'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
			];

			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Data berhasil ditambah", "success");');
			redirect('admin/data_admin');

		}

		function hapus_admin(){

			$id = $this->input->post('id');
			$this->db->delete('tbl_admin',['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Data berhasil dihapus", "success");');
			redirect('admin/data_admin');

		}

		function data_testimoni(){
			$data['testimoni'] = $this->db->get('tbl_testimoni')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/data_testimoni', $data);
			$this->load->view('template_admin/footer');

		}

		function tambah_testimoni(){

			if (isset($_POST['kirim'])) {

				$config['upload_path']          = './assets/testimoni/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['min_size']             = 9000000;
				$config['remove_spaces']        = false;


				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('img')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Gambar yang anda masukan terlalu besar", "", "warning" );');
					redirect('admin/data_testimoni');

				}else{

					

					$data = [

						
						'keterangan' => $this->input->post('keterangan'),
						'gambar' => $_FILES['img']['name'],
					];

					$this->db->insert('tbl_testimoni', $data);
					$this->session->set_flashdata('message', 'swal("Sukses!", "Testimoni berhasil ditambah", "success");');
					redirect('admin/data_testimoni');

				}

			}

		}

		function edit_testimoni($id){
			$data['testimoni'] = $this->db->get_where('tbl_testimoni',['id' => $id])->row_array();


			$this->load->view('template_admin/header');
			$this->load->view('admin/edit_testimoni', $data);
			$this->load->view('template_admin/footer');
		}

		function act_edit_testimoni(){

			$id = $this->input->post('id');

			$config['upload_path']          = './assets/testimoni/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['min_size']             = 9000000;
			$config['remove_spaces']        = false;

			$img = $_FILES['img']['name'];

			if ($img == true) {

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('img')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Opps", "Anda gagal upload gambar", "warning" );');
					redirect("admin/edit_produk/$id");

				}else{


					$data = [

						'keterangan' => $this->input->post('keterangan'),
						'gambar' => $_FILES['img']['name'],
					];

					$this->db->where('id',$this->input->post('id'));
					$this->db->update('tbl_testimoni', $data);
					$this->session->set_flashdata('message', 'swal("Sukses!", "Testimoni barhasil di ubah 1", "success");');
					redirect('admin/data_testimoni');

				}
			}else{

				$data = [
					
					'keterangan' => $this->input->post('keterangan'),
				];

				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_testimoni', $data);
				$this->session->set_flashdata('message', 'swal("Sukses!", "Testimoni barhasil di ubah 2", "success");');
				redirect('admin/data_testimoni');

			}

		}

		function hapus_testimoni(){

			$id = $this->input->post('id');
			$this->db->delete('tbl_testimoni',['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Sukses!", "Data berhasil dihapus", "success");');
			redirect('admin/data_testimoni');

		}

		function keluar(){

			$this->session->unset_userdata('username');
			redirect('login/');
		}

	}

?>