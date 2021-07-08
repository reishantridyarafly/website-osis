<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="card">
               <div class="card-header">
                    <h4>Edit Foto</h4>
               </div>
               <div class="card-body">
                    <?php foreach ($galeri as $g) { ?>
                         <?= form_open_multipart('galeri/galeri_update') ?>
                         <div class="row justify-content-center">
                              <div class="col-12 col-md-6 col-lg-6">
                                   <div class="form-group">
                                        <label for="judul">Judul *</label>
                                        <input type="hidden" name="id" value="<?= $g->galeri_id ?>">
                                        <input type="text" name="judul" id="judul" class="form-control" value="<?= $g->galeri_judul ?>">
                                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="album">Album *</label>
                                        <select name="album" id="album" class="form-control">
                                             <option value="">-- Pilih album --</option>
                                             <?php foreach ($album as $a) { ?>
                                                  <option value="<?= $a->album_id ?>" <?= $g->galeri_album_id == $a->album_id ? 'selected' : '' ?>><?= $a->album_nama ?></option>
                                             <?php } ?>
                                        </select>
                                        <?= form_error('album', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="foto">Foto * (biarkan kosong jika tidak di isi!)</label> <br>
                                        <img src="<?= base_url() . 'gambar/galeri/' . $g->galeri_gambar ?>" width="100%" class="mb-3">
                                        <input type="file" name="foto" id="foto" class="form-control">
                                        <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <a href="<?= base_url() ?>galeri" class="btn btn-warning mr-2">Kembali</a>
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </div>
                         </div>
                         </form>
                    <?php } ?>
               </div>
          </div>
     </section>
</div>