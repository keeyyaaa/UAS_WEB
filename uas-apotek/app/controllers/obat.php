<?php 

class Obat extends Controller {

    // 1. KEAMANAN: CEK LOGIN
    public function __construct()
    {
        // Jika belum login, tendang ke halaman Login
        if( !isset($_SESSION['login']) ) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    // 2. HALAMAN UTAMA (READ + PAGINATION)
    public function index($page = 1)
    {
        $data['judul'] = 'Daftar Obat';
        
        // --- LOGIKA PAGINATION ---
        $limit = 5; // Tampilkan 5 data per halaman
        $halamanAktif = (int)$page;
        $totalData = $this->model('Obat_model')->countObat();
        $jumlahHalaman = ceil($totalData / $limit);
        
        // Hitung mulai dari index ke berapa
        $start = ($limit * $halamanAktif) - $limit;

        // Ambil data (pakai LIMIT, bukan getAllObat biasa)
        $data['obat'] = $this->model('Obat_model')->getObatLimit($start, $limit);
        
        // Kirim info halaman ke View
        $data['halamanAktif'] = $halamanAktif;
        $data['jumlahHalaman'] = $jumlahHalaman;
        // -------------------------

        $this->view('templates/header', $data);
        $this->view('obat/index', $data);
        $this->view('templates/footer');
    }

    // 3. FITUR TAMBAH DATA (CREATE)
    public function tambah()
    {
        // KEAMANAN ROLE: Cuma Admin yang boleh masuk sini
        if($_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }

        // Jika ada data POST dikirim -> Proses Simpan
        if( !empty($_POST) ) {
            if( $this->model('Obat_model')->tambahDataObat($_POST) > 0 ) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/obat');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/obat');
                exit;
            }
        }

        // Jika tidak ada POST -> Tampilkan Form
        $data['judul'] = 'Tambah Data Obat';
        $data['kategori'] = $this->model('Obat_model')->getAllKategori(); 

        $this->view('templates/header', $data);
        $this->view('obat/tambah', $data);
        $this->view('templates/footer');
    }

    // 4. FITUR HAPUS DATA (DELETE)
    public function hapus($id)
    {
        // KEAMANAN ROLE: Cuma Admin yang boleh hapus
        if($_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }

        if( $this->model('Obat_model')->hapusDataObat($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/obat');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/obat');
            exit;
        }
    }

    // 5. FITUR UBAH DATA (UPDATE)
    public function ubah($id)
    {
        // KEAMANAN ROLE: Cuma Admin yang boleh ubah
        if($_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL . '/obat');
            exit;
        }

        // Jika Tombol Simpan ditekan (POST) -> Proses Update
        if( !empty($_POST) ) {
            if( $this->model('Obat_model')->ubahDataObat($_POST) > 0 ) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/obat');
                exit;
            } else {
                // Kadang tidak ada data berubah (0 row), tapi query sukses.
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/obat');
                exit;
            }
        }

        // Tampilkan Form Ubah (GET)
        $data['judul'] = 'Ubah Data Obat';
        $data['obat'] = $this->model('Obat_model')->getObatById($id);
        $data['kategori'] = $this->model('Obat_model')->getAllKategori();

        $this->view('templates/header', $data);
        $this->view('obat/ubah', $data);
        $this->view('templates/footer');
    }

    // 6. FITUR CARI DATA (SEARCH)
    public function cari()
    {
        $data['judul'] = 'Daftar Obat';
        $data['obat'] = $this->model('Obat_model')->cariDataObat();
        
        // Saat pencarian, pagination diset 1 halaman saja biar simpel
        $data['halamanAktif'] = 1;
        $data['jumlahHalaman'] = 1;
        
        $this->view('templates/header', $data);
        $this->view('obat/index', $data);
        $this->view('templates/footer');
    }
}