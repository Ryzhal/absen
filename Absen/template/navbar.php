<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success border border-3 border-warning">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-2 " href="<?= $main_url ?>index.php"><span class="fw-bold h5" style="color: red;">TI <span class="" style="color: red;"> UNIPOL </span></span>  2022 <img src="<?= $main_url?>tools/image/logo.png" alt="logo" class="rounded ms-1" width="20%"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <span class="text-dark text-capitalize h5 "> <?= $_SESSION["ssUser"] ?></span>
                
            </form>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#mdlProfilUser" data-bs-toggle="modal">Profile User</a></li>
                        <li><a class="dropdown-item" href="<?= $main_url ?>kampus/profile-kampus.php">Profile Universitas</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= $main_url ?>auth/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php
$username = $_SESSION["ssUser"];
$queryUser = mysqli_query ($koneksi, " SELECT * FROM tb_user WHERE username = '$username'");
$profile = mysqli_fetch_array($queryUser);

?>

        <div class="modal" tabindex="-1" id="mdlProfilUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Profile User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card mb-3 border-0" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= $main_url ?>tools/image/<?= $profile['foto']?>" class="img-fluid rounded-start" width="100%" alt="Gambar User">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h4 class="card-tittle mb-3 text-capitalize ps-1"><?= $profile['username']?></h4>
      <hr>
      <div class="row">
    <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9">
      <input type="text" readonly class="form-control border-0 bg-transparaent" id="nama" value=": <?= $profile['nama']?>">
    </div>
  </div>
      <div class="row">
    <label for="status" class="col-sm-3 col-form-label">Status</label>
    <div class="col-sm-9">
      <input type="text" readonly class="form-control border-0 bg-transparaent" id="status" value=": <?= $profile['status']?>">
    </div>
  </div>
      <div class="row">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9">
      <input type="text" readonly class="form-control border-0 bg-transparaent" id="alamat" value=": <?= $profile['alamat']?>">
    </div>
  </div>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>
        