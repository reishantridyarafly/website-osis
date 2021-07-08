<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>

          <?php foreach ($siswa as $s) : ?>
               <div class="card">
                    <div class="card-body">
                         <div class="row justify-content-center">
                              <div class="col-12 col-md-6 col-lg-4">
                                   <img src="<?= base_url() . 'gambar/osis/' . $s->siswa_photo ?>" width="100%">
                              </div>
                              <div class="col-12 col-md-6 col-lg-8">
                                   <table class="table table-hover table-striped table-lg-responsive">
                                        <tr>
                                             <td>NIS</td>
                                             <td>:</td>
                                             <td><?= $s->siswa_nis; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Nama</td>
                                             <td>:</td>
                                             <td><?= $s->siswa_nama; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Jenis Kelamin</td>
                                             <td>:</td>
                                             <td><?= $s->siswa_jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Jabatan</td>
                                             <td>:</td>
                                             <td><?= $s->jabatan_nama; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Kelas</td>
                                             <td>:</td>
                                             <td><?= $s->kelas_nama; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Jurusan</td>
                                             <td>:</td>
                                             <td><?= $s->jurusan_nama; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Status</td>
                                             <td>:</td>
                                             <td><?= $s->status == '1' ? "<span class='badge rounded-pill bg-success text-light'>Aktif</span>" : "<span class='badge rounded-pill bg-danger text-light'>Keluar</span>"; ?></td>
                                        </tr>
                                   </table>
                                   <div class="ml-4 mb-2" style="text-align: right;">
                                        <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i> Kembali</a>
                                        <a href="<?= base_url('siswa/siswa_edit/' . $s->siswa_id) ?>" class="btn btn-sm btn-warning m-1"><i class="fas fa-edit"></i> Update</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
</div>
<?php endforeach ?>
</section>
</div>
</div>