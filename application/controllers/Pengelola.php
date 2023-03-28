<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {


	public function __construct(){


		parent::__construct();
		if (!$this->session->userdata('nama_sanggar')) {
			redirect('auth');
		}
		$this->load->library('form_validation');

	}


	public function index(){
		$id_sanggar = $this->session->userdata("id_sanggar");
		$data['side'] = 'home';
		$data['kegiatan'] = $this->db->query("SELECT COUNT(id_kegiatan) as jumlah_kegiatan from kegiatan where id_sanggar = $id_sanggar")->row_array();

		$data['komentar'] = $this->db->query("SELECT COUNT(id_komentar) as jumlah_komentar from sanggar s join kegiatan k on k.id_sanggar = s.id_sanggar join komentar ko on k.id_kegiatan = ko.id_kegiatan where s.id_sanggar = $id_sanggar")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('pengelola/dashboard');
		$this->load->view('admin/template/footer');
	}
	public function kelolaSanggar(){
		$id_sanggar = $this->session->userdata('id_sanggar');
		$data['kategori'] = $this->db->query("SELECT  * FROM kategori")->result();
		$data['sanggar'] = $this->db->query("SELECT * FROM sanggar s join kelurahan k on s.id_kelurahan = k.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori WHERE s.id_sanggar = '$id_sanggar'")->row_array();
		$data['side'] = 'kelola';
		$this->load->view('admin/template/header',$data);
		$this->load->view('pengelola/kelola',$data);
		$this->load->view('admin/template/footer');
	}

	public function editSanggar(){
		$id_sanggar = $this->session->userdata('id_sanggar');
		$nama_sanggar = $this->input->post('nama_sanggar');
		$id_kategori = $this->input->post('kategori');
		$nama_ketua = $this->input->post('nama_ketua');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('noHp');
		$pesan = $this->input->post('pesan');
		$prestasi = $this->input->post('prestasi');

		$query = $this->db->query("UPDATE sanggar set nama_sanggar = '$nama_sanggar',id_kategori = '$id_kategori',nama_ketua = '$nama_ketua',pesan = '$pesan',alamat='$alamat',no_hp='$no_hp',prestasi='$prestasi' where id_sanggar = '$id_sanggar'");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah</div>');
			header('location:'.base_url().'pengelola/kelolaSanggar');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diubah</div>');
			header('location:'.base_url().'pengelola/kelolaSanggar');
		}
	}

	public function kegiatan(){
		$id_sanggar = $this->session->userdata('id_sanggar');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

		$data['kegiatan'] = $this->db->query("SELECT * FROM kegiatan where id_sanggar = '$id_sanggar' order by id_kegiatan desc")->result();
		$data['side'] = 'kegiatan';
		if ($this->form_validation->run() == false) {

			$this->load->view('admin/template/header',$data);
			$this->load->view('pengelola/kegiatan',$data);
			$this->load->view('admin/template/footer');
		}else{

			if(!empty($_FILES['foto']['name'])){
				$config['upload_path'] = 'upload/kegiatan'; 
            //restrict uploads to this mime types
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 999999999;
				$config['file_name1'] = $_FILES['foto']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('foto');
				$uploadFoto = $this->upload->data();
				$fileFoto = $uploadFoto['file_name'];

				$data = [
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'id_sanggar' => $id_sanggar,
					'deskripsi_kegiatan' => $this->input->post('deskripsi'),
					'foto_kegiatan' => $fileFoto,
				];

				$query = $this->db->insert('kegiatan', $data);
				if($query){
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diunggah</div>');
					header('location:'.base_url().'pengelola/kegiatan');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diunggah</div>');
					header('location:'.base_url().'pengelola/kegiatan');
				}


			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diunggah s</div>');
				header('location:'.base_url().'pengelola/kegiatan');
			}


		}
	}

	public function hapusKegiatan($id_kegiatan){

		$queryKegiatan = $this->db->query("SELECT * FROM kegiatan where id_kegiatan = $id_kegiatan")->row_array();

		$foto = $queryKegiatan['foto_kegiatan'];
		unlink(FCPATH . 'upload/kegiatan/'.$foto);

		$queryKoment = $this->db->query("SELECT * FROM komentar where id_kegiatan = $id_kegiatan")->result();

		foreach ($queryKoment as $key => $value) {
			# code...
			$id_komentar = $value->id_komentar;
			$queryBalas = $this->db->query("DELETE FROM balas_komentar where id_komentar = $id_komentar");
		}
		$queryDeleteKoment = $this->db->query("DELETE FROM komentar where id_kegiatan = $id_kegiatan");
		$query = $this->db->query("DELETE FROM kegiatan WHERE id_kegiatan ='$id_kegiatan'");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil dihapus</div>');
			header('location:'.base_url().'pengelola/kegiatan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal dihapus s</div>');
			header('location:'.base_url().'pengelola/kegiatan');
		}
	}

	public function detailKegiatan($id_kegiatan){
		$id_sanggar = $this->session->userdata('id_sanggar');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

		$data['kegiatan'] = $this->db->query("SELECT * FROM kegiatan where id_kegiatan = '$id_kegiatan'")->row_array();
		$data['side'] = 'kegiatan';
		if ($this->form_validation->run() == false) {

			$this->load->view('admin/template/header',$data);
			$this->load->view('pengelola/kegiatanDetail',$data);
			$this->load->view('admin/template/footer');
		}else{

			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$deskripsi = $this->input->post('deskripsi');
			$status = 0;

			if(!empty($_FILES['foto']['name'])){
				$datagbr= $this->db->get_where('kegiatan',['id_kegiatan' => $id_kegiatan]) -> row_array();

				$file_gbr= $datagbr['foto_kegiatan'];

				unlink(FCPATH . 'upload/kegiatan/'.$file_gbr);

				$config['upload_path'] = 'upload/kegiatan'; 
            //restrict uploads to this mime types
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 999999999;
				$config['file_name1'] = $_FILES['foto']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('foto');
				$uploadFoto = $this->upload->data();
				$fileFoto = $uploadFoto['file_name'];
				$foto = $fileFoto;

				$query = $this->db->query("UPDATE kegiatan set nama_kegiatan = '$nama_kegiatan', deskripsi_kegiatan = '$deskripsi',foto_kegiatan = '$foto',status_posting = 0 where id_kegiatan = '$id_kegiatan' ");
				if($query){
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diunggah</div>');
					header('location:'.base_url().'pengelola/kegiatan');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data gagal diunggah</div>');
					header('location:'.base_url().'pengelola/kegiatan');
				}

			}else{
				$query = $this->db->query("UPDATE kegiatan set nama_kegiatan = '$nama_kegiatan', deskripsi_kegiatan = '$deskripsi',status_posting = 0 where id_kegiatan = '$id_kegiatan' ");

				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">berhasil</div>');
				header('location:'.base_url().'pengelola/kegiatan');
			}


		}
	}

	public function balasKomentar($id_kegiatan,$id_komen){

		$data = [
			'balas_komen' => $this->input->post('balas'),
			'id_komentar' => $id_komen
		];

		$query = $this->db->insert('balas_komentar',$data);

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">komentar diunggah s</div>');
			header('location:'.base_url().'pengelola/detailKegiatan/'.$id_kegiatan);
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">komentar gagal diubah s</div>');
			header('location:'.base_url().'pengelola/detailKegiatan/'.$id_kegiatan);
		}
	}

	public function ubahPassword(){

		$data['side'] = 'password';
		$data['user'] = $this->db->get_where('sanggar', ['email_ketua' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header',$data);
			$this->load->view('pengelola/ubahPassword');
			$this->load->view('admin/template/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah! </div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru harus berbeda dengan password lama! </div>');
					redirect('pengelola/ubahPassword');
				} else {
                    // password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);


					$this->db->set('password', $password_hash);
					$this->db->where('email_ketua', $this->session->userdata('email'));
					$this->db->update('sanggar');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! </div>');
					redirect('pengeola/ubahPassword');
				}
			}
		}
	}

}