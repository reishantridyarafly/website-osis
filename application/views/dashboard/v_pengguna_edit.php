<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                         <div class="card-header">
                              <h4>Update Pengguna Website</h4>
                         </div>
                         <div class="card-body">
                              <?php foreach ($pengguna as $p) { ?>
                                   <form action="<?= base_url('pengguna/pengguna_update') ?>" method="POST">
                                        <div class="form-group">
                                             <label for="nama">Nama Pengguna *</label>
                                             <input type="hidden" name="id" value="<?= $p->pengguna_id ?>">
                                             <input type="text" class="form-control" id="nama" name="nama" value="<?= $p->pengguna_nama; ?>" autocomplete="off" autofocus>
                                             <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="email">Email *</label>
                                             <input type="email" class="form-control" id="email" name="email" value="<?= $p->pengguna_email; ?>" autocomplete="off">
                                             <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="username">Username *</label>
                                             <input type="text" class="form-control" id="username" name="username" value="<?= $p->pengguna_username; ?>" autocomplete="off">
                                             <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="password">Password</label> <small>(Biarkan kosong jika tidak di ganti)</small>
                                             <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                             <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="password_2">Konfirmasi Password</label>
                                             <input type="password" class="form-control" id="password_2" name="password_2" autocomplete="off">
                                             <?= form_error('password_2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="level">Level *</label>
                                             <select name="level" id="level" class="form-control">
                                                  <option value="">-- Pilih Level --</option>
                                                  <option <?php if ($p->pengguna_level == "admin") {
                                                                 echo "selected='selected'";
                                                            } ?> value="admin">Admin</option>
                                                  <option <?php if ($p->pengguna_level == "penulis") {
                                                                 echo "selected='selected'";
                                                            } ?> value="penulis">Penulis</option>
                                             </select>
                                             <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="status">Status *</label>
                                             <select name="status" id="status" class="form-control">
                                                  <option value="">-- Pilih Status --</option>
                                                  <option <?php if ($p->pengguna_status == 1) {
                                                                 echo "selected='selected'";
                                                            } ?> value="1">Aktif</option>
                                                  <option <?php if ($p->pengguna_status == "0") {
                                                                 echo "selected='selected'";
                                                            } ?> value="0">Non Aktif</option>
                                             </select>
                                             <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="card-footer text-right">
                                             <a href="<?= base_url() ?>pengguna" class="btn btn-warning mr-2">Kembali</a>
                                             <button class="btn btn-primary">Submit</button>
                                        </div>
                                   </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
     </section>
</div>