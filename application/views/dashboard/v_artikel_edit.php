<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          
          <?php foreach ($artikel as $r) { ?>
               <?= form_open_multipart('artikel/artikel_update'); ?>
               <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                         <div class="card">
                              <div class="card-header">
                                   <h4>Update Artikel</h4>
                              </div>
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="judul">Judul *</label>
                                        <input type="hidden" name="id" value="<?= $r->artikel_id ?>">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $r->artikel_judul ?>" autocomplete="off" autofocus>
                                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="konten">Konten *</label>
                                        <textarea name="konten" id="editor" class="form-control" rows=" 10"><?= $r->artikel_konten ?></textarea>
                                        <?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <a href="<?= base_url() ?>artikel" class="btn btn-warning float-right">Kembali</a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                         <div class="card">
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                             <option value="">--Pilih Kategori--</option>
                                             <?php foreach ($kategori as $k) { ?>
                                                  <option <?php
                                                            if ($r->artikel_kategori == $k->kategori_id) {
                                                                 echo "selected='selected'";
                                                            }
                                                            ?> value="<?= $k->kategori_id ?>"><?= $k->kategori_nama ?>
                                                  </option>
                                             <?php } ?>
                                        </select>
                                   </div>
                                   <div class="form-group">
                                        <label for="sampul">Gambar sampul</label>
                                        <input type="file" name="sampul" id="sampul" class="form-control"><br>
                                        <img src="<?= base_url() . 'gambar/artikel/' . $r->artikel_sampul ?>" width="100%">
                                        <?php
                                        if (isset($gambar_error)) {
                                             echo $gambar_error;
                                        }
                                        ?>
                                        <?= form_error('sampul', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <input type="submit" name="status" value="Draft" class="btn btn-danger btn-block">
                                        <input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               </form>
          <?php } ?>
     </section>
</div>