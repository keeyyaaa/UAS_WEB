<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h4 style="color: #3B7A57; font-weight: 700;">✏️ Ubah Data Obat</h4>
                </div>
                
                <div class="card-body px-4 pb-4">
                    <form action="<?= BASEURL; ?>/obat/ubah/<?= $data['obat']['id']; ?>" method="post">
                        
                        <input type="hidden" name="id" value="<?= $data['obat']['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Kode Obat</label>
                            <input type="text" class="form-control rounded-pill px-3" name="kode_obat" value="<?= $data['obat']['kode_obat']; ?>" required style="border-color: #A8E6CF;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Nama Obat</label>
                            <input type="text" class="form-control rounded-pill px-3" name="nama_obat" value="<?= $data['obat']['nama_obat']; ?>" required style="border-color: #A8E6CF;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Kategori</label>
                            <select class="form-select rounded-pill px-3" name="kategori_id" style="border-color: #A8E6CF;">
                                <?php foreach($data['kategori'] as $cat) : ?>
                                    <option value="<?= $cat['id']; ?>" <?= ($cat['id'] == $data['obat']['kategori_id']) ? 'selected' : ''; ?>>
                                        <?= $cat['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small text-muted">Harga Beli</label>
                                <input type="number" class="form-control rounded-pill px-3" name="harga_beli" value="<?= $data['obat']['harga_beli']; ?>" required style="border-color: #A8E6CF;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small text-muted">Harga Jual</label>
                                <input type="number" class="form-control rounded-pill px-3" name="harga_jual" value="<?= $data['obat']['harga_jual']; ?>" required style="border-color: #A8E6CF;">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small text-muted">Stok</label>
                                <input type="number" class="form-control rounded-pill px-3" name="stok" value="<?= $data['obat']['stok']; ?>" required style="border-color: #A8E6CF;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3" style="border-radius: 15px; border-color: #A8E6CF;"><?= $data['obat']['keterangan']; ?></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-lg text-white" style="background-color: #3B7A57; border-radius: 50px;">Simpan Perubahan</button>
                            <a href="<?= BASEURL; ?>/obat" class="btn btn-link text-muted" style="text-decoration: none;">Batal, kembali ke daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>