<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct(){


		parent::__construct();
		$this->load->library('form_validation');

	}


	public function index(){
		$data['nav'] = 'home';
		$data['kategori'] = $this->db->query("SELECT * FROM ketegori")->result();
		$data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
		$this->load->view('user/template/header',$data);
		$this->load->view('user/depan');
		$this->load->view('user/template/footer');
	}

	public function jelajah(){
		$data['nav'] = 'jelajah';
		$data['sanggar'] = $this->db->query("SELECT * FROM sanggar s join kategori k on k.id_kategori = s.id_kategori where s.status = 2 order by id_sanggar desc")->result();
		$this->load->view('user/template/header',$data);
		$this->load->view('user/sanggar');
		$this->load->view('user/template/footer');
	}

	public function pengajuan(){
		$data['nav'] = 'pengajuan';
		$data['kategori']  = $this->db->query("SELECT * FROM ketegori")->result();
		$data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result(); 

		$que = $this->db->query("SELECT id_sanggar from sanggar order by id_sanggar desc limit 1");

		if($que->num_rows() > 0){
			$dt = $que->row_array();
			$kode=intval($dt['id_sanggar'])+1;
		}else{
			$kode = 1;
		} 

		$kode_max = str_pad($kode,6,"0",STR_PAD_LEFT);
		$kode_jadi = "sgr".$kode_max;

		$data['kode'] = $kode_jadi;

		$this->load->view('user/template/header',$data);
		$this->load->view('user/pengajuan');
		$this->load->view('user/template/footer');
	}

	public function insert(){
		if(!empty($_FILES['ktp']['name']) & !empty($_FILES['berkas']['name'])& !empty($_FILES['foto']['name']) & !empty($_FILES['foto_ketua']['name'])){

			$email = $this->input->post('email');

			$id_otomatis = $this->input->post('password');
			$nik = $this->input->post('nik');

			$queryEmail = $this->db->query("SELECT * FROM sanggar WHERE email_ketua = '$email'")->num_rows();
			$queryNik = $this->db->query("SELECT * FROM sanggar WHERE nik = '$nik'")->num_rows();

			if($queryEmail > 0){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email sudah terdaftar</div>');
				header('location:'.base_url().'user/pengajuan');
			}else{
				if($queryNik > 0){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nik sudah terdaftar</div>');
					header('location:'.base_url().'user/pengajuan');
				}else{
					$config['upload_path'] = 'upload/sanggar';
            //restrict uploads to this mime types
					$config['allowed_types'] = 'jpg|jpeg|png|mp3|pdf|docx';
					$config['max_size'] = 999999999;
					$config['file_name1'] = $_FILES['ktp']['name'];
					$config['file_name2'] = $_FILES['berkas']['name'];
					$config['file_name3'] = $_FILES['foto']['name'];
					$config['file_name4'] = $_FILES['foto_ketua']['name'];


            //Load upload library and initialize configuration
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					$this->upload->do_upload('ktp');
					$uploadKtp = $this->upload->data();
					$fileKtp = $uploadKtp['file_name'];

					$this->upload->do_upload('foto');
					$uploadFoto = $this->upload->data();
					$fileFoto = $uploadFoto['file_name'];

					$this->upload->do_upload('foto_ketua');
					$uploadFotoKetua = $this->upload->data();
					$fileFotoKetua = $uploadFotoKetua['file_name'];


					$this->upload->do_upload('berkas');
					$uploadBerkas = $this->upload->data();
					$fileBerkas = $uploadBerkas['file_name'];
					$data = [
						'nama_ketua' => $this->input->post('nama_ketua'),
						'nama_sanggar' => $this->input->post('nama_sanggar'),
						'nik' => $this->input->post('nik'),
						'id_otomatis' => $this->input->post('password'),
						'email_ketua' => $this->input->post('email'),
						'id_kategori' => $this->input->post('kategori'),
						'id_kelurahan' => $this->input->post('kelurahan'),
						'no_hp' => $this->input->post('hp'),
						'alamat' => $this->input->post('alamat'),
						'longitude' => $this->input->post('longitude'),
						'latitude' => $this->input->post('latitude'),
						'ktp' => $fileKtp,
						'berkas' => $fileBerkas,
						'pesan' => $this->input->post('pesan'),
						'status' => 1,
						'foto' => $fileFoto,
						'foto_ketua' => $fileFotoKetua,
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					];
					$query = $this->db->insert('sanggar', $data);
					if ($query) {

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil diajukan</div>');
						header('location:'.base_url().'user/pengajuanDetail/'.$id_otomatis.'/'.$nik);
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">file harus gambar</div>');
						header('location:'.base_url().'user/pengajuan');

					}
				}
				
			}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">file harus diisi</div>');
			header('location:'.base_url().'user/pengajuan');
		}

	}

	public function sanggar($id_sanggar){
		$data['nav'] = 'jelajah';
		$data['kegiatan'] = $this->db->query("SELECT * FROM sanggar s join kegiatan k on k.id_sanggar = s.id_sanggar where s.id_sanggar = '$id_sanggar' and k.status_posting = 1")->result();
		$data['sanggar'] = $this->db->query("SELECT * from sanggar s join kategori k on k.id_kategori = s.id_kategori join kelurahan kl on s.id_kelurahan = kl.id_kelurahan join kecamatan kc on kl.id_kecamatan = kc.id_kecamatan  where s.id_sanggar = '$id_sanggar'")->row_array();
		$this->load->view('user/template/header',$data);
		$this->load->view('user/jelajah');
		$this->load->view('user/template/footer');
	}
	public function kegiatan($id_sanggar,$id_kegiatan){
		$data['nav'] = 'jelajah';
		$data['kegiatan'] = $this->db->query("SELECT * FROM sanggar s join kegiatan k on k.id_sanggar = s.id_sanggar where $id_kegiatan = '$id_kegiatan' and k.status_posting = 1")->row_array();
		$data['semuaKegiatan'] = $this->db->query("SELECT * FROM sanggar s join kegiatan k on k.id_sanggar = s.id_sanggar where $id_sanggar = '$id_sanggar' and k.status_posting = 1")->result();
		$data['sanggar'] = $this->db->query("SELECT * from sanggar where id_sanggar = '$id_sanggar'")->row_array();
		$data['koment'] = $this->db->query("SELECT * from komentar where id_kegiatan = '$id_kegiatan'")->result();
		$data['jumlah'] = $this->db->query("SELECT count(id_komentar) as jumlah_koment from komentar where id_kegiatan = '$id_kegiatan'")->row_array();
		$this->load->view('user/template/header',$data);
		$this->load->view('user/kegiatan');
		$this->load->view('user/template/footer');
	}

	public function koment($id_sanggar,$id_kegiatan){

		$data = [
			'nama_komentar' => $this->input->post('nama'),
			'email_komentar' => $this->input->post('email'),
			'komen' => $this->input->post('komentar'),
			'id_kegiatan' => $id_kegiatan
		];

		$query = $this->db->insert('komentar', $data);
		if ($query) {

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar Terkirim</div>');
			header('location:'.base_url().'user/kegiatan/'.$id_sanggar.'/'.$id_kegiatan);
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Komentar tidak terkirim</div>');
			header('location:'.base_url().'user/kegiatan/'.$id_sanggar.'/'.$id_kegiatan);
		}

	}

	public function getKelurahan(){
		$id_kec = $this->input->post('kecamatan_id');
		$output ='';
		if($id_kec){
			$data = $this->db->query("SELECT * FROM kelurahan where id_kecamatan = $id_kec")->result();

			foreach ($data as $dt) {

				$nama_kelurahan= $dt->nama_kelurahan;
				$id_kelurahan = $dt->id_kelurahan;

				$output .=' <option value="'.$id_kelurahan.'">'.$nama_kelurahan.'</option>';
			}
			
			echo json_encode($output);
		}
	}

	public function viewmarker($nama_kecamatan, $jenis)
	{
		$nama = $nama_kecamatan;
		$jenis = $jenis;

		if ($jenis == 'kk') {
			$query = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = k.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where kc.id_kecamatan = $nama and s.status = 2");
			if($query->num_rows() > 0){
				$data = $query->result();
			}else{
				$data = '';
			}
		} else if($jenis == 's' and $nama == 'k'){
			$query = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = k.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where s.status = 2");
			if($query->num_rows() > 0){
				$data = $query->result();
			}else{
				$data = '';
			}
		}else{
			$query = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = k.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where kc.id_kecamatan = $nama and kt.id_kategori = $jenis and s.status = 2");
			if($query->num_rows() > 0){
				$data = $query->result();
			}else{
				$data = '';
			}
		}

		echo json_encode($data);
	}

	public function pengajuanDetail($id_otomatis){
		$data['nav'] ='pengajuan';
		$querySanggar = $this->db->query("SELECT * FROM sanggar s join kategori k on k.id_kategori = s.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where s.id_otomatis = '$id_otomatis'");
		$data['pengajuan'] = $querySanggar->row_array();

		if($querySanggar->num_rows() > 0){
			$this->load->view('user/template/header',$data);
			$this->load->view('user/pengajuanDetail');
			$this->load->view('user/template/footer');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger font-weight-bold" role="alert">data tidak ditemukan</div>');
			header('location:'.base_url().'user/info_lanjut');
		}
	}

	public function info_lanjut(){
		$data['nav'] ='info';
		$this->load->view('user/template/header',$data);
		$this->load->view('user/info_lanjut');
		$this->load->view('user/template/footer');
	}

	public function cetakBukti($id_otomatis){
		$data['nav'] ='pengajuan';
		$querySanggar = $this->db->query("SELECT * FROM sanggar s join kategori k on k.id_kategori = s.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where s.id_otomatis = '$id_otomatis'");
		$data['bukti'] = $querySanggar->row_array();

		if($querySanggar->num_rows() > 0){
			$this->load->view('user/template/header',$data);
			$this->load->view('user/cetakBukti');
			$this->load->view('user/template/footer');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger font-weight-bold" role="alert">data tidak ditemukan</div>');
			header('location:'.base_url().'user/pengajuan');
		}
	}

}