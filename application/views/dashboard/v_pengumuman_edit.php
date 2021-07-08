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
                              <h4>Edit Pengumuman Sekolah</h4>
                         </div>
                         <div class="card-body">
                              <?php foreach ($pengumuman as $p) { ?>
                                   <form action="<?= base_url('pengumuman/pengumuman_update') ?>" method="POST">
                                        <div class="form-group">
                                             <label for="judul">Judul *</label>
                                             <input type="hidden" name="id" value="<?= $p->pengumuman_id ?>">
                                             <input type="text" class="form-control" id="judul" name="judul" value="<?= $p->pengumuman_judul; ?>" autocomplete="off" autofocus>
                                             <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="deskripsi">Deskripsi *</label>
                                             <textarea name="deskripsi" id="editor" rows="10" class="form-control"><?= $p->pengumuman_deskripsi ?></textarea>
                                             <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="mulai">Mulai</label>
                                             <input type="date" name="mulai" id="mulai" class="form-control" value="<?= $p->tanggal_mulai; ?>">
                                             <?= form_error('mulai', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="selesai">Selesai</label>
                                             <input type="date" name="selesai" id="selesai" class="form-control" value="<?= $p->tanggal_selesai; ?>">
                                             <?= form_error('selesai', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="card-footer text-right">
                                             <a href="<?= base_url() ?>pengumuman" class="btn btn-warning mr-2">Kembali</a>
                                             <button class="btn btn-primary">Submit</button>
                                        </div>
                                   </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
     </section>
</div>