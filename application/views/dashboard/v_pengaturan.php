<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-10">
                    <?php
                    if (isset($_GET['alert'])) {
                         if ($_GET['alert'] == 'sukses') {
                              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                   Pengaturan berhasil<strong> diupdate!</strong>
                                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                   <span aria-hidden='true'>&times;</span>
                                   </button>
                                   </div>";
                         }
                    }
                    ?>
                    <div class="card">
                         <div class="card-header">
                              <h4>Pengaturan Website</h4>
                         </div>
                         <div class="card-body">
                              <?php
                              foreach ($pengaturan_view as $p) { ?>
                                   <form action="<?= base_url('pengaturan/pengaturan_update') ?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                             <label for="nama">Nama website*</label>
                                             <input type="text" class="form-control" id="nama" name="nama" value="<?= $p->nama ?>" autocomplete="off" autofocus>
                                             <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="deskripsi">Deskripsi *</label>
                                             <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $p->deskripsi ?>" autocomplete="off" autofocus>
                                             <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label for="logo">Logo Website</label>
                                             <small>(Biarkan kosong bila tidak di isi!)</small>
                                             <div class="mb-4 mt-2" style="text-align: center;">
                                                  <?php if ($p->logo != null) { ?>
                                                       <img src="<?= base_url('gambar/website/' . $p->logo); ?>" width="30%">
                                                  <?php } ?>
                                             </div>
                                             <input type="file" name="logo" id="logo"><br>
                                             <?= form_error('logo', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                             <label for="link_facebook">Link Facebook *</label>
                                             <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="<?= $p->link_facebook ?>" autocomplete="off" autofocus>
                                             <?= form_error('link_facebook', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="link_twitter">Link Twitter *</label>
                                             <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="<?= $p->link_twitter ?>" autocomplete="off" autofocus>
                                             <?= form_error('link_twitter', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="link_instagram">Link Instagram *</label>
                                             <input type="text" class="form-control" id="link_instagram" name="link_instagram" value="<?= $p->link_instagram ?>" autocomplete="off" autofocus>
                                             <?= form_error('link_instagram', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="link_whatsapp">Link Whatsapp *</label>
                                             <input type="text" class="form-control" id="link_whatsapp" name="link_whatsapp" value="<?= $p->link_whatsapp ?>" autocomplete="off" autofocus>
                                             <?= form_error('link_whatsapp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-paper-plane"></i> Simpan</button>
                                   </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
     </section>
</div>