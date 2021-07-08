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
                              <h4>Tambah Pengguna Website</h4>
                         </div>
                         <div class="card-body">
                              <form action="<?= base_url('pengguna/pengguna_aksi') ?>" method="POST">
                                   <div class="form-group">
                                        <label for="nama">Nama Pengguna *</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off" autofocus>
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="username">Username *</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" autocomplete="off">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" autocomplete="off">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="password_2">Konfirmasi Password *</label>
                                        <input type="password" class="form-control" id="password_2" name="password_2" value="<?= set_value('password_2'); ?>" autocomplete="off">
                                        <?= form_error('password_2', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="level">Level *</label>
                                        <select name="level" id="level" class="form-control">
                                             <option value="">-- Pilih Level --</option>
                                             <option value="admin">Admin</option>
                                             <option value="penulis">Penulis</option>
                                        </select>
                                        <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <a href="<?= base_url() ?>pengguna" class="btn btn-warning mr-2">Kembali</a>
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
     </section>
</div>