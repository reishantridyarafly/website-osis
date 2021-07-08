<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-8">
                    <?php
                    if (isset($_GET['alert'])) {
                         if ($_GET['alert'] == 'sukses') {
                              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                   Password berhasil<strong> diubah!</strong>
                                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                   <span aria-hidden='true'>&times;</span>
                                   </button>
                                   </div>";
                         } elseif ($_GET['alert'] == 'gagal') {
                              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                   Maaf, <strong>password lama</strong> yang anda masukan salah
                                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                   <span aria-hidden='true'>&times;</span>
                                   </button>
                                   </div>";
                         }
                    }
                    ?>
                    <div class="card">
                         <div class="card-header">
                              <h4>Ubah Password Anda</h4>
                         </div>
                         <div class="card-body">
                              <form action="<?= base_url('ganti_password/ganti_password_aksi') ?>" method="POST">
                                   <div class="form-group">
                                        <div class="form-group">
                                             <label for="password_lama">Password Lama *</label>
                                             <input type="password" class="form-control" id="password_lama" name="password_lama" value="<?= set_value('password_lama'); ?>" autocomplete="off" autofocus>
                                             <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label for="password_baru">Password Baru *</label>
                                             <input type="password" class="form-control" id="password_baru" name="password_baru" value="<?= set_value('password_baru'); ?>" autocomplete="off">
                                             <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="konfirmasi_password">Konfirmasi Password *</label>
                                             <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" value="<?= set_value('konfirmasi_password'); ?>" autocomplete="off">
                                             <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="card-footer text-right">
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
     </section>
</div>