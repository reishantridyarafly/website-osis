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
                              <h4>Tambah Jabatan Osis</h4>
                         </div>
                         <div class="card-body">
                              <form action="<?= base_url('jabatan/jabatan_aksi') ?>" method="POST">
                                   <div class="form-group">
                                        <label for="jabatan">Jabatan *</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>" autocomplete="off" autofocus>
                                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <a href="<?= base_url() ?>jabatan" class="btn btn-warning mr-2">Kembali</a>
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>