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
                              <h4>Konfirmasi Hapus</h4>
                         </div>
                         <div class="card-body">
                              <p class="text-primary"><b><?= $pengguna_hapus->pengguna_nama ?></b> akan di hapus dan semua artikel yang di tulis oleh <b>
                                        <?= $pengguna_hapus->pengguna_nama ?></b> akan di pindahkan ke ?</p>
                              <form action="<?= base_url('pengguna/pengguna_hapus_aksi') ?>" method="post">
                                   <div class="form-group">
                                        <label for="pengguna_tujuan">Nama Pengguna</label>
                                        <input type="hidden" name="pengguna_hapus" value="<?= $pengguna_hapus->pengguna_id ?>">
                                        <select name="pengguna_tujuan" id="pengguna_tujuan" class="form-control">
                                             <option value="">-- Pilih Pengguna --</option>
                                             <?php
                                             foreach ($pengguna_lain as $pl) { ?>
                                                  <option value="<?= $pl->pengguna_id ?>"><?= $pl->pengguna_nama ?></option>
                                             <?php } ?>
                                        </select>
                                        <?= form_error('pengguna_tujuan', '<small class="text-danger">', '</small>'); ?>
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