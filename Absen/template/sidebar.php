<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg_light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu ">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading " >Home</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt "></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon "><i class="fa-solid fa-user"></i></div>
                                User    
                            </a>
                           
                            <a class="nav-link" href="<?= $main_url ?>user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>siswa/siswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Mahasiswa
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>dosen/dosen.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Dosen
                            </a>
                            
                            <a class="nav-link" href="<?= $main_url ?>matakuliah/matakuliah.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Mata Kuliah
                            </a>
                           
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list"></i></div>
                                Absensi
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small ">Logged in as:</div>
                        <?=  $_SESSION["ssUser"] ?>
                    </div>
                </nav>
</div>