<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{

		$data['blog'] = $this->db->get('blog');
		$this->load->view('admin/home',$data);
	}

	public function artikel(){
		$data['blog'] = $this->db->get('blog');
		$data['art'] = $this->db->query("SELECT * FROM artikel order by id_artikel DESC");
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/artikel/artikel', $data);
            $this->load->view('admin/tree/js', $data);
	}

	public function artikel_tambah(){
		if (isset($_POST['simpan'])) {
			$data = array (
			'foto'	=> $this->input->post('foto'),
			'judul'	=> $this->input->post('judul'),
			'konten'=> $this->input->post('konten'),
			'kategori' => $this->input->post('kategori')
		);
		$this->db->insert('artikel',$data);
		redirect('admin/artikel/artikel');
		} else {
			$data['kat'] = $this->db->get('kategori');
			$data['blog'] = $this->db->get('blog');
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/artikel/tambah', $data);
            $this->load->view('admin/tree/js', $data);
		}
	}
	public function artikel_edit($id){
		if (isset($_POST['simpan'])) {
			$data = array (
			'foto'	=> $this->input->post('foto'),
			'judul'	=> $this->input->post('judul'),
			'konten'=> $this->input->post('konten'),
			'kategori' => $this->input->post('kategori'),
			'penulis' => $this->input->post('penulis')
		);
		$this->db->where('id_artikel',$id);
		$this->db->update('artikel',$data);
		redirect('admin/artikel');
		} else {
			$data['blog'] = $this->db->get('blog');
			$data['kat'] = $this->db->get('kategori');
			$data['art'] = $this->db->query("SELECT * FROM artikel where id_artikel='$id'");
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/artikel/edit', $data);
            $this->load->view('admin/tree/js', $data);
		}
	}

	public function artikel_hapus($id){
		$this->db->where('id_artikel',$id);
		$this->db->delete('artikel');
		redirect('admin/artikel');
	}

	public function kategori(){
		if (isset($_POST['simpan'])) {
			$data = array (
				'kategori'	=> $this->input->post('kategori')
			);
			$this->db->insert('kategori',$data);
			redirect('admin/kategori');
		}else{
			$data['blog'] = $this->db->get('blog');
			$data['kat'] = $this->db->get('kategori');
			$this->load->view('admin/kategori',$data);
		}
	}

	public function kategori_hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
		redirect('admin/kategori');
	}

	public function user(){
		$data['blog'] = $this->db->get('blog');
		$data['art'] = $this->db->query("SELECT * FROM users");
            $this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/pengguna/view', $data);
            $this->load->view('admin/tree/js', $data);
	}

	public function user_tambah(){
		if (isset($_POST['simpan'])) {
			$data = array (
			'foto'	=> $this->input->post('foto'),
			'nama'	=> $this->input->post('nama'),
			'username'=> $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email'	=> $this->input->post('email'),
			'role'	=> $this->input->post('role')
		);
		$this->db->insert('users',$data);
		redirect('admin/user');
		} else {
			$data['blog'] = $this->db->get('blog');
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/pengguna/tambah', $data);
            $this->load->view('admin/tree/js', $data);
		}
	}
	public function user_edit($id){
		if (isset($_POST['simpan'])) {
			$data = array (
			'foto'	=> $this->input->post('foto'),
			'nama'	=> $this->input->post('nama'),
			'username'=> $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email'	=> $this->input->post('email'),
			'role'	=> $this->input->post('role')
		);
		$this->db->where('id_user',$id);
		$this->db->update('users',$data);
		redirect('admin/user');
		} else {
			$data['blog'] = $this->db->get('blog');
			$data['user'] = $this->db->query("SELECT * FROM users where id_user='$id'");
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/pengguna/edit', $data);
            $this->load->view('admin/tree/js', $data);
		}
	}

	public function user_hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('artikel');
		redirect('admin/artikel');
	}

	public function profile($id){
		$data['blog'] = $this->db->get('blog');
		$data['art'] = $this->db->query("SELECT * FROM user where id='$id'");
            $this->load->view('admin/profile', $data);
	}

	public function profile_Edit($id){
		if (isset($_POST['simpan'])) {
			$data = array (
			'nama'	=> $this->input->post('nama'),
			'foto'	=> $this->input->post('foto'),
			'username'	=> $this->input->post('username'),
			'email'=> $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->db->where('id',$id);
		$this->db->update('artikel',$data);
		redirect('admin/profile');
		} else {
			$data['blog'] = $this->db->get('blog');
			$data['art'] = $this->db->query("SELECT * FROM users where id_user='$id'");
			$this->load->view('admin/profile_edit',$data);
		}
	}

	public function pengaturan(){
		if (isset($_POST['simpan'])) {
			$data = array (
			'nama'	=> $this->input->post('nama'),
			'logo'	=> $this->input->post('logo'),
			'tentang'	=> $this->input->post('tentang')
		);
			$id=1;
		$this->db->where('id',$id);
		$this->db->update('blog',$data);
		redirect('admin/pengaturan');
		} else {
			$data['blog'] = $this->db->query("SELECT * FROM blog where id='1'");
			$this->load->view('admin/tree/head', $data);
			$this->load->view('admin/tree/sidebar', $data);
			$this->load->view('admin/tree/navbar', $data);
            $this->load->view('admin/pengaturan/edit', $data);
            $this->load->view('admin/tree/js', $data);
		}
	}

}
