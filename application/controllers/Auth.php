<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// halaman login
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('admin/template/login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] ==  1) {
				// cek passeord
				if (password_verify($password, $user['password'])) {
					$data  = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'id_user' => $user['id_user'],
						'nama' => $user['name']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('dashboard');
					} else {

						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
					redirect('auth');
				}
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi</div>');
				redirect('auth');
			}
		} else {
			$querySanggar = $this->db->get_where('sanggar', ['email_ketua' => $email])->row_array();
			if($querySanggar){
				if($querySanggar['status'] == 1){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sanggar Belum Diaktivasi</div>');
					redirect('auth');
				}else if($querySanggar['status'] == 2){
					if (password_verify($password, $querySanggar['password'])) {
						$data  = [
							'email' => $querySanggar['email_ketua'],
							'id_sanggar' => $querySanggar['id_sanggar'],
							'nama' => $querySanggar['nama_ketua'],
							'nama_sanggar' => $querySanggar['nama_sanggar']
						];
						$this->session->set_userdata($data);
						redirect('pengelola');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email dan username salah</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">sanggar belum terdaftar</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email belum terdaftar</div>');
				redirect('auth');
			}
		}
	}



	// halaman registrasi
	public function registration()
	{

		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'email sudah didaftarkan'
		]);

		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'password tidak cocok!',
			'min_length' => 'password terlalu pendek!'
		]);

		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Daftar inGIS ';
			$this->load->view('admin/template/register', $data);
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0

			];

			$token = base64_encode(random_bytes(29));
			$user_token = [
				'email' => $email,
				'token' => $token,
				// verifikasi agar expired
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda telah dibuat. Silahkan cek email untuk aktivasi! </div>');
			redirect('auth');
		}
	}


	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => '',
			'smtp_pass' => '',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('oa.corp101@gmail.com', 'onlyandri corporation');
		$this->email->to($this->input->post('email'));

		// verifikasi token
		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun website template login');
			$this->email->message('Klik link aktivasi dibawah ini untuk verifikasi akun anda! : <br />
				<a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a> ');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik link dibawah ini untuk mereset password! : <br />
				<a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> ');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	// agar bisa login
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('sanggar', ['email_ketua' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				// batasi waktu aktivasi
				$this->db->set('status', 2);
				$this->db->where('email_ketua', $email);
				$this->db->update('sanggar');

				$this->db->delete('user_token', ['email' => $email]);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah diaktivasi! silahkan login.</div>');
				redirect('auth');
			} else {
				// menghindari input data secara manual dari url
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Invalid!</div>');
				redirect('auth');
			}
		} else {
			// menghindari input data secara manual dari url
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi token gagal! email salah.</div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama_sanggar');
		$this->session->unset_userdata('id_sanggar');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar! </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgotpassword');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
			if ($user) {
				$token  = base64_encode(random_bytes(29));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email untuk mereset password! </div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau diaktivasi! </div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Token salah.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email salah.</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		// agar user tidak sembarangan ganti password tanpa dari email
		if (!$this->session->userdata('reset_email')) {
			redirect(auth);
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[4]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ganti Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/changepassword');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			// hapus session reset
			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! Silahkan login.</div>');
			redirect('auth');
		}
	}
}
