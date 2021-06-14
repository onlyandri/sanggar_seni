<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct(){


		parent::__construct();

		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

 
	public function index(){
		$data['sanggar'] = $this->db->query("SELECT COUNT(id_sanggar) as jumlah_sanggar from sanggar where id_sanggar = 2")->row_array();
		$data['pengajuan'] = $this->db->query("SELECT COUNT(id_sanggar) as jumlah_pengajuan from sanggar where id_sanggar != 2")->row_array();
		$data['kategori'] = $this->db->query("SELECT COUNT(id_kategori) as jumlah_kategori from kategori")->row_array();
		$data['postingan'] = $this->db->query("SELECT count(id_kegiatan) as jumlah_kegiatan from kegiatan")->row_array();
		$data['kecamatan'] = $this->db->query("SELECT count(id_kecamatan) as jumlah_kecamatan from kecamatan")->row_array();
		$data['kelurahan'] = $this->db->query("SELECT count(id_kelurahan) as jumlah_kelurahan from kelurahan")->row_array();
		$data['side'] = 'home';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}

	public function kelolaPengajuan(){
		$data['side'] = 'pengajuan';
		$data['pengajuan'] = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where s.status != 2")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/pengajuan');
		$this->load->view('admin/template/footer');
	}

	public function pengajuanDetail($id_sanggar){
		$data['side'] = 'pengajuan';
		$data['sanggar'] = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where s.id_sanggar = '$id_sanggar'")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/pengajuanDetail');
		$this->load->view('admin/template/footer');
	}

	public function kelolaSanggar(){
		$data['side'] = 'sanggar';
		$data['pengajuan'] = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where s.status = 2")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/sanggar');
		$this->load->view('admin/template/footer');
	}

	public function detailSanggar($id_sanggar){
		$data['side'] = 'sanggar';
		$data['sanggar'] = $this->db->query("SELECT * FROM sanggar s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan join kategori kt on kt.id_kategori = s.id_kategori where s.id_sanggar = '$id_sanggar'")->row_array();
		$data['jumlahPosting'] = $this->db->query("SELECT COUNT(id_kegiatan) as jumlahKegiatan from kegiatan where id_sanggar = $id_sanggar")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/detailSanggar');
		$this->load->view('admin/template/footer');
	}

	public function kelolaKategori(){
		$data['side'] = 'kategori';
		$data['kategori'] = $this->db->query("SELECT * FROM KATEGORI")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/kelolaKategori');
		$this->load->view('admin/template/footer');
	}

	public function sendEmail($id_sanggar,$konf){

		$query = $this->db->query("SELECT email_ketua,id_otomatis FROM sanggar where id_sanggar = $id_sanggar")->row_array();
		$token = base64_encode(random_bytes(29));
		$user_token = [
			'email' => $query['email_ketua'],
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('user_token', $user_token);
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'oa.corp101@gmail.com',
			'smtp_pass' => 'Lenggokgoreng8.',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('oa.corp101@gmail.com', 'Sanggar Seni Kota Pekalongan');
		$this->email->to($query['email_ketua']);

		// verifikasi token
		$this->email->subject('Pengajuan sanggar Seni Kota Pekalongan');

		if($konf == 'tolak'){
			$this->email->message('pengajuan sanggar anda <p style="font-size:17px; font-weight:bold">Ditolak</p> berkas yang di kirimkan tidak valid');
		}else{
			$this->email->message('pengajuan anda telah disetujui gunakan <p style="font-size:17px; font-weight:bold"> '.$query['id_otomatis'].' </p> sebagai password login, segera ganti password anda untuk menjaga keamanan,  Klik tombol aktivasi dibawah ini untuk verifikasi akun sanggar anda : <br />
				<div style="border-radius: 50px;font-size: 14px;color: #fff;text-transform: capitalize;background-size: 200% auto;border: 1px solid transparent;box-shadow: 0px 12px 20px 0px rgba(255, 126, 95, 0.15);">
				<a href="' . base_url() . 'auth/verify?email=' . $query['email_ketua'] . '&token=' . urlencode($token) . '">Aktivasi</a></div>');
		}

		if ($this->email->send()) {
			if($konf == 'tolak'){
				$queryUpdate = $this->db->query("UPDATE sanggar set status = 4 where id_sanggar= $id_sanggar");
			}else{
				$queryUpdate = $this->db->query("UPDATE sanggar set status = 3 where id_sanggar= $id_sanggar");
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">berhasil dikonfirmasi status sanggar</div>');
			redirect('dashboard/kelolaPengajuan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">konfirmasi gagal ulangi lagi</div>');
			redirect('dashboard/kelolaPengajuan');
		}
	}


	public function hapusPengajuan($id_sanggar){
		$query = $this->db->query("SELECT * FROM Sanggar where id_sanggar = $id_sanggar")->row_array();

		$fotoKtp = $query['ktp'];
		$fotoKetua = $query['foto_ketua'];
		$berkas = $query['berkas'];
		$foto = $query['foto'];
		unlink(FCPATH . 'upload/sanggar/'.$foto);
		unlink(FCPATH . 'upload/sanggar/'.$fotoKetua);
		unlink(FCPATH . 'upload/sanggar/'.$fotoKtp);
		unlink(FCPATH . 'upload/sanggar/'.$berkas);

		$queryHapus = $this->db->query("DELETE from sanggar where id_sanggar = $id_sanggar");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Pengajuan Berhasil Dihapus</div>');
			redirect('dashboard/kelolaPengajuan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">pengajuan gagal dihapus</div>');
			redirect('dashboard/kelolaPengajuan');
		}
	}

	public function hapusSanggar($id_sanggar){

		$querySanggar = $this->db->query("SELECT * FROM Sanggar where id_sanggar = $id_sanggar")->row_array();

		$fotoKtp = $querySanggar['ktp'];
		$fotoKetua = $querySanggar['foto_ketua'];
		$berkas = $querySanggar['berkas'];
		$foto = $querySanggar['foto'];
		unlink(FCPATH . 'upload/sanggar/'.$foto);
		unlink(FCPATH . 'upload/sanggar/'.$fotoKetua);
		unlink(FCPATH . 'upload/sanggar/'.$fotoKtp);
		unlink(FCPATH . 'upload/sanggar/'.$berkas);

		$queryKegiatan = $this->db->query("SELECT * FROM kegiatan where id_sanggar = $id_sanggar")->result();

		foreach ($queryKegiatan as $key => $value) {
			# code...
			$id_kegiatan = $value->id_kegiatan;
			$fotoKegiatan = $value->foto_kegiatan;
			unlink(FCPATH . 'upload/kegiatan/'.$fotoKegiatan);

			$queryKomen = $this->db->query("SELECT * FROM komentar where id_kegiatan = $id_kegiatan")->result();

			foreach ($queryKomen as $key => $value2) {
			# code...
				$id_komentar = $value2->id_komentar;
				$queryBalas = $this->db->query("DELETE FROM balas_komentar where id_komentar = $id_komentar");
			}

			$querDeleteKomentar = $this->db->query("DELETE FROM komentar where id_kegiatan = $id_kegiatan");
		}

		$queryDeleteKegiatan = $this->db->query("DELETE from kegiatan where id_sanggar = $id_sanggar");
		$queryDeleteSanggar = $this->db->query("DELETE FROM sanggar where id_sanggar = $id_sanggar");

		if($queryDeleteKegiatan && $queryDeleteSanggar){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">sanggar berhasil dihapus</div>');
			redirect('dashboard/kelolaSanggar');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">pengajuan gagal dihapus</div>');
			redirect('dashboard/kelolaSanggar');
		}
	}

	public function tambahKategori(){

		$data = [
			'nama_kategori' => $this->input->post('nama_kategori'),
			'icon' => $this->input->post('icon'),
			'deskripsi' => $this->input->post('deskripsi'),
		];
		$query = $this->db->insert('kategori', $data);
		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diunggah</div>');
			header('location:'.base_url().'dashboard/kelolaKategori');
		}
	}

	public function editKategori($id_kategori){
		$nama_kategori = $this->input->post("nama_kategori");
		$deskripsi = $this->input->post("deskripsi");
		$icon = $this->input->post("icon");
		if($icon ==''){
			$query = $this->db->query("UPDATE kategori set nama_kategori = '$nama_kategori', deskripsi = '$deskripsi' where id_kategori = $id_kategori");
		}else{
			$query = $this->db->query("UPDATE kategori set nama_kategori = '$nama_kategori', deskripsi = '$deskripsi', icon = '$icon' where id_kategori = $id_kategori");
		}
		

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah</div>');
			header('location:'.base_url().'dashboard/kelolaKategori');
		}
	}

	public function hapusKategori($id_kategori){
		$query = $this->db->query("DELETE FROM kategori where id_kategori = $id_kategori");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil dihapus</div>');
			header('location:'.base_url().'dashboard/kelolaKategori');
		}
	}

	public function ubahPassword(){

		$data['side'] = 'password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header',$data);
			$this->load->view('admin/template/ubahPassword');
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
					redirect('dashboard/ubahPassword');
				} else {
                    // password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);


					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! </div>');
					redirect('dashboard/ubahPassword');
				}
			}
		}
	}

	public function laporan(){
		$data['side'] = 'laporan';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/laporan');
		$this->load->view('admin/template/footer');
	}

		public function laporan_json(){

 		$jenis = $this->input->post('jenis');
 		$output = '';
 		$no = 0;

 		if($jenis == 'semua'){
 			$data = $this->db->query("SELECT * FROM sanggar s join kategori k on s.id_kategori = k.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan")->result();
 		}else{
 			$data = $this->db->query("SELECT * FROM sanggar s join kategori k on s.id_kategori = k.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where k.id_kategori = $jenis")->result();
 		}
 		foreach ($data as $key => $dt) {
 			# code...

 			$no++;

 			$output .=' <tr>
 			<td>'.$no.'</td>
 			 <td>'.$dt->id_otomatis.'</td>
 			 <td>'.$dt->nama_kategori.'</td>
              <td>'.$dt->nama_sanggar.'</td>
              <td>'.$dt->nama_ketua.'</td>
              <td>'.$dt->email_ketua.'</td>
              <td>'.$dt->nama_kelurahan.'</td>
              <td>'.$dt->rt.'</td>
              <td>'.$dt->rw.'</td>
              <td>'.$dt->nama_kecamatan.'</td>
            </tr>';
 		}
 		
 		echo json_encode($output);
 		
 	}

 	public function cetak_laporan(){
 		$data['side'] = 'laporan';

 		$jenis = $this->input->post('kategori');
 		$output = '';
 		$no = 0;

 		if($jenis == 'semua'){
 			$data2 = $this->db->query("SELECT * FROM sanggar s join kategori k on s.id_kategori = k.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where s.status = 2")->result();
 			
 		}else{
 			$data2 = $this->db->query("SELECT * FROM sanggar s join kategori k on s.id_kategori = k.id_kategori join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where k.id_kategori = $jenis and s.status = 2")->result();
 		}
 		$data['km'] = $data2;
		
		$this->load->view('admin/cetak_laporan',$data);
 	}

}