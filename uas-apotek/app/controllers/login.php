<?php 

class Login extends Controller {
    public function index()
    {
        $data['judul'] = 'Login Apotek';
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function proses()
    {
        // 1. Ambil data user berdasarkan username
        $user = $this->model('User_model')->getUserByUsername($_POST['username']);
        
        // 2. Cek apakah user ada?
        if( $user ) {
            // 3. Cek Password (User dummy kita pakai MD5)
            if( md5($_POST['password']) == $user['password'] ) {
                
                // 4. Jika benar, buat SESSION
                $_SESSION['login'] = true;
                $_SESSION['role'] = $user['role'];      // admin atau kasir
                $_SESSION['nama'] = $user['nama_lengkap'];

                header('Location: ' . BASEURL . '/obat');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Password salah', 'danger');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal', 'Username tidak ditemukan', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy(); // Hancurkan sesi
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}