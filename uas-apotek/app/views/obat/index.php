<div class="container mt-4">
    
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-4 align-items-center">
        <div class="col-lg-6">
            <h3 style="color: #3B7A57; font-weight: 700;">📦 Daftar Obat</h3>
            <p class="text-muted small">
                Login sebagai: <span class="fw-bold text-success"><?= $_SESSION['nama']; ?> (<?= ucfirst($_SESSION['role']); ?>)</span>
            </p>
        </div>
        <div class="col-lg-6">
            <div class="d-flex gap-2 justify-content-end">
                <form action="<?= BASEURL; ?>/obat/cari" method="post" class="d-flex w-75">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Cari obat..." name="keyword" autocomplete="off" style="border-color: #A8E6CF;">
                    <button class="btn btn-outline-success rounded-circle" type="submit">🔍</button>
                </form>
                
                <?php if($_SESSION['role'] == 'admin') : ?>
                    <a href="<?= BASEURL; ?>/obat/tambah" class="btn text-white px-3 py-2 shadow-sm d-flex align-items-center" style="background-color: #A8E6CF; color: #3B7A57 !important; font-weight:bold; border-radius: 50px; border: 2px solid #3B7A57;">
                        + <span class="d-none d-md-inline ms-1">Baru</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <table class="table table-hover mb-0" style="vertical-align: middle;">
                <thead style="background-color: #A8E6CF; color: #3B7A57;">
                    <tr>
                        <th class="py-3 ps-4">No</th>
                        <th class="py-3">Kode</th>
                        <th class="py-3">Nama Obat</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Stok</th>
                        <th class="py-3">Harga</th>
                        
                        <?php if($_SESSION['role'] == 'admin') : ?>
                            <th class="py-3 text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['obat'])) : ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">Data tidak ditemukan</td>
                        </tr>
                    <?php endif; ?>

                    <?php $no = 1; foreach( $data['obat'] as $obat ) : ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted"><?= $no++; ?></td>
                        <td>
                            <span class="badge rounded-pill" style="background-color: #FFD3B6; color: #555;">
                                <?= $obat['kode_obat']; ?>
                            </span>
                        </td>
                        <td class="fw-bold text-dark"><?= $obat['nama_obat']; ?></td>
                        <td><?= $obat['nama_kategori']; ?></td>
                        <td>
                            <?php if($obat['stok'] < 10) : ?>
                                <span class="badge bg-danger rounded-pill">Habis! (<?= $obat['stok']; ?>)</span>
                            <?php else : ?>
                                <span class="badge bg-success bg-opacity-75 rounded-pill"><?= $obat['stok']; ?> pcs</span>
                            <?php endif; ?>
                        </td>
                        <td style="color: #3B7A57; font-weight: bold;">
                            Rp <?= number_format($obat['harga_jual'], 0, ',', '.'); ?>
                        </td>
                        
                        <?php if($_SESSION['role'] == 'admin') : ?>
                            <td class="text-center">
                                <a href="<?= BASEURL; ?>/obat/ubah/<?= $obat['id']; ?>" class="btn btn-sm btn-warning text-white rounded-circle" title="Ubah">✏️</a>
                                <a href="<?= BASEURL; ?>/obat/hapus/<?= $obat['id']; ?>" class="btn btn-sm btn-danger rounded-circle" onclick="return confirm('Yakin mau hapus obat ini?');" title="Hapus">🗑️</a>
                            </td>
                        <?php endif; ?>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if($data['halamanAktif'] > 1) : ?>
                    <li class="page-item">
                        <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/obat/index/<?= $data['halamanAktif'] - 1; ?>" style="color: #3B7A57; border: 1px solid #A8E6CF;">&laquo;</a>
                    </li>
                <?php endif; ?>

                <?php for($i = 1; $i <= $data['jumlahHalaman']; $i++) : ?>
                    <?php if( $i == $data['halamanAktif'] ) : ?>
                        <li class="page-item active">
                            <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/obat/index/<?= $i; ?>" style="background-color: #3B7A57; border-color: #3B7A57; color: white;"><?= $i; ?></a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/obat/index/<?= $i; ?>" style="color: #3B7A57; border: 1px solid #A8E6CF;"><?= $i; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
                    <li class="page-item">
                        <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/obat/index/<?= $data['halamanAktif'] + 1; ?>" style="color: #3B7A57; border: 1px solid #A8E6CF;">&raquo;</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>