<?php include('../config/auto_load.php'); ?>

<?php include('editprofil_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">EDIT PROFIL</h1>
    <form class="user" method="POST" action="<?= $base_url ?>/siswa/editprofil.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $data_pendaftar['nama'] ?>">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" name="tempat_lahir" value="<?= $data_pendaftar['tmpt_lahir'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control datepicker" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Jenis Kelamin</label>
                        <?php
                        $laki = "";
                        $perempuan = "";

                        if($data_pendaftar['jenis_kelamin'] == "L") {
                            $laki = "checked";
                        } else {
                            $perempuan = "checked";
                        }
                        ?>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" <?= $laki ?>>
                            <label class="form-check-label" for="lk">
                                Laki Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P" <?= $perempuan ?>>
                            <label class="form-check-label" for="pr">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option value="islam" <?php if($data_pendaftar['agama'] == 'islam'){ echo "selected"; } ?>>Islam</option>
                            <option value="kristen" <?php if($data_pendaftar['agama'] == 'kristen'){ echo "selected"; } ?>>Kristen</option>
                            <option value="katolik" <?php if($data_pendaftar['agama'] == 'katolik'){ echo "selected"; } ?>>Katolik</option>
                            <option value="hindu" <?php if($data_pendaftar['agama'] == 'hindu'){ echo "selected"; } ?>>Hindu</option>
                            <option value="budha" <?php if($data_pendaftar['agama'] == 'budha'){ echo "selected"; } ?>>Budha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"><?= $data_pendaftar['alamat']; ?></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= $data_pendaftar['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="telepon">Telepon</label>
                        <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telepon" value="<?= $data_pendaftar['telepon'] ?>">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <label for="ulangi_password">Ulangi Password</label>
                        <input name="ulangi_password" type="password" class="form-control" id="ulangi_password" placeholder="Ulangi Password">
                    </div>
                </div> -->

                
                
            </div>
            <div class="col-md-4">
                <?php
                if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                } else {
                    $foto = '../assets/img/avatar.jpg';
                }
                ?>
                <img src="<?= $foto ?>" alt="foto profil" class="img-fluid">

                <input type="file" name="gambar" class="form-control mt-2">
            </div>
            <div class="col-md-12">
                <button type="submit" name="btn_simpan" value="simpan_profil" class="btn btn-primary mb-5">Ubah</button>
                <a href="dashboard.php" class="btn btn-danger mb-5">Kembali</a>
            </div>
        </div>
    </form>

  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>