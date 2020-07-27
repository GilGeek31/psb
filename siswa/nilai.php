<?php include('../config/auto_load.php'); ?>

<?php include('nilai_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">EDIT NILAI</h1>
  <div class="row">
  <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">EDIT DATA NILAI</h6>
        </div>
        <div class="card-body">
            <p class="text-danger">* Ubah jika ada kesalahan!</p>
            <form class="user" method="POST" action="<?= $base_url ?>/siswa/nilai.php">
              <?php if(isset($data_nilai)) {
                // echo "edit nilai";
                $id_nilai = $data_nilai['id'];
                echo "<input type='hidden' name='id_nilai' value='$id_nilai'>";

              } else {
                // echo "insert nilai";
              }
              ?>

                <div class="form-group">
                    <label for="un">Nilai Ujian Nasional</label>
                    <input type="text" class="form-control" id="un" placeholder="Masukkan Nilai Ujian Nasional" name="un" value="<?php if(isset($data_nilai['nilai_un'])) { echo $data_nilai['nilai_un']; } ?>">
                </div>
                <div class="form-group">
                    <label for="us">Nilai Ujian Sekolah</label>
                    <input type="text" class="form-control" id="us" placeholder="Masukkan Nilai Ujian Sekolah" name="us" value="<?php if(isset($data_nilai['nilai_us'])) { echo $data_nilai['nilai_us']; } ?>">
                </div>
                <div class="form-group">
                    <label for="uts_1">Nilai UTS 1</label>
                    <input type="text" class="form-control" id="uts_1" placeholder="Masukkan Nilai Ujian Sekolah" name="uts_1" value="<?php if(isset($data_nilai['nilai_uts_1'])) { echo $data_nilai['nilai_uts_1']; } ?>">
                </div>
                <hr>
                <div class="text-right">
                    <button type="submit" name="btn_simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                    <a href="dashboard.php" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>