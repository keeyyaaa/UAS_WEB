<?php 

class Home extends Controller {
    
    // --- GEMBOK KEAMANAN ---
    public function __construct()
    {
        // Kalau belum login, paksa pindah ke halaman Login
        if( !isset($_SESSION['login']) ) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
    // -----------------------

    public function index()
    {
        $data['judul'] = 'Home';
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}