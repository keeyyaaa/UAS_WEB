<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="mb-3">
                <?php Flasher::flash(); ?>
            </div>

            <div class="card border-0 shadow-lg" style="border-radius: 25px; overflow: hidden;">
                <div class="card-header border-0 py-4 text-center" style="background-color: #A8E6CF;">
                    <h2 class="fw-bold m-0" style="color: #3B7A57;">🌿 Login Area</h2>
                    <small class="text-white fw-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Sistem Informasi Apotek</small>
                </div>
                
                <div class="card-body p-5 bg-white">
                    <form action="<?= BASEURL; ?>/login/proses" method="post">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Username</label>
                            <input type="text" name="username" class="form-control rounded-pill px-4 py-3" placeholder="Contoh: admin" required style="border-color: #A8E6CF; background-color: #F9FDFB;">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Password</label>
                            <input type="password" name="password" class="form-control rounded-pill px-4 py-3" placeholder="Contoh: 12345" required style="border-color: #A8E6CF; background-color: #F9FDFB;">
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-lg fw-bold text-white shadow-sm" style="background-color: #3B7A57; border-radius: 50px; padding: 12px;">
                                Masuk Sekarang 🚀
                            </button>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center bg-light border-0 py-3">
                    <small class="text-muted">Lupa password? Hubungi IT Support</small>
                </div>
            </div>

        </div>
    </div>
</div>