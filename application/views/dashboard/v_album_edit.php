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
                              <h4>Edit Album</h4>
                         </div>
                         <div class="card-body">
                              <?php foreach ($album as $a) { ?>
                                   <form action="<?= base_url('album/album_update') ?>" method="POST">
                                        <div class="form-group">
                                             <label for="nama">Album nama *</label>
                                             <input type="hidden" name="id" value="<?= $a->album_id ?>">
                                             <input type="text" class="form-control" id="nama" name="nama" value="<?= $a->album_nama; ?>" autocomplete="off" autofocus>
                                             <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="card-footer text-right">
                                             <a href="<?= base_url() ?>album" class="btn btn-warning mr-2">Kembali</a>
                                             <button class="btn btn-primary">Submit</button>
                                        </div>
                                   </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
     </section>
</div>