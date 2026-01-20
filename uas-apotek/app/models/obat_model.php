<?php 

class Obat_model {
    private $table = 'obat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // --- 1. CRUD UTAMA ---

    public function getAllObat()
    {
        // Join tabel obat dengan kategori
        $query = "SELECT obat.*, kategori.nama_kategori 
                  FROM " . $this->table . " 
                  JOIN kategori ON obat.kategori_id = kategori.id";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Fungsi ini PENTING untuk Form Tambah/Edit (biar dropdown muncul)
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM kategori');
        return $this->db->resultSet();
    }

    public function tambahDataObat($data)
    {
        $query = "INSERT INTO obat
                    (kode_obat, nama_obat, kategori_id, harga_beli, harga_jual, stok, keterangan, gambar)
                  VALUES
                    (:kode_obat, :nama_obat, :kategori_id, :harga_beli, :harga_jual, :stok, :keterangan, 'default.jpg')";
        
        $this->db->query($query);
        
        $this->db->bind('kode_obat', htmlspecialchars($data['kode_obat']));
        $this->db->bind('nama_obat', htmlspecialchars($data['nama_obat']));
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga_beli', $data['harga_beli']);
        $this->db->bind('harga_jual', $data['harga_jual']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataObat($id)
    {
        $query = "DELETE FROM obat WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getObatById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataObat($data)
    {
        $query = "UPDATE obat SET
                    kode_obat = :kode_obat,
                    nama_obat = :nama_obat,
                    kategori_id = :kategori_id,
                    harga_beli = :harga_beli,
                    harga_jual = :harga_jual,
                    stok = :stok,
                    keterangan = :keterangan
                  WHERE id = :id";
        
        $this->db->query($query);
        
        $this->db->bind('kode_obat', htmlspecialchars($data['kode_obat']));
        $this->db->bind('nama_obat', htmlspecialchars($data['nama_obat']));
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga_beli', $data['harga_beli']);
        $this->db->bind('harga_jual', $data['harga_jual']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataObat()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT obat.*, kategori.nama_kategori 
                  FROM obat 
                  JOIN kategori ON obat.kategori_id = kategori.id
                  WHERE nama_obat LIKE :keyword OR kode_obat LIKE :keyword";
        
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    // --- 2. FITUR PAGINATION (WAJIB ADA) ---

    // Ambil data tapi dibatasi (misal cuma 5 baris)
    public function getObatLimit($start, $limit)
    {
        $query = "SELECT obat.*, kategori.nama_kategori 
                  FROM " . $this->table . " 
                  JOIN kategori ON obat.kategori_id = kategori.id
                  LIMIT :start, :limit";
        
        $this->db->query($query);
        $this->db->bind('start', $start);
        $this->db->bind('limit', $limit);
        return $this->db->resultSet();
    }

    // Hitung total semua obat (biar tahu ada berapa halaman)
    public function countObat()
    {
        $this->db->query('SELECT id FROM ' . $this->table);
        $this->db->execute();
        return $this->db->rowCount();
    }
}