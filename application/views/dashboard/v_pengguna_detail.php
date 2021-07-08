<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>

          <?php foreach ($pengguna as $p) : ?>
               <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-10">
                         <div class="card">
                              <div class="card-body">
                                   <table class="table table-hover table-striped table-lg-responsive">
                                        <tr>
                                             <td>Nama</td>
                                             <td>:</td>
                                             <td><?= $p->pengguna_nama; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Email</td>
                                             <td>:</td>
                                             <td><?= $p->pengguna_email; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Username</td>
                                             <td>:</td>
                                             <td><?= $p->pengguna_username; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Level</td>
                                             <td>:</td>
                                             <td><?= $p->pengguna_level == 'admin' ? 'Admin' : 'Penulis'; ?></td>
                                        </tr>
                                        <tr>
                                             <td>Status</td>
                                             <td>:</td>
                                             <td>
                                                  <?= $p->pengguna_status == 0 ? "<span class='badge badge-danger'>Non Aktif</span>" : "<span class='badge badge-success'>Aktif</span>" ?>
                                             </td>
                                        </tr>
                                   </table>
                                   <div class="ml-4 mb-2" style="text-align: right;">
                                        <a href="<?= base_url('pengguna') ?>" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i> Kembali</a>
                                        <a href="<?= base_url('pengguna/pengguna_edit/' . $p->pengguna_id) ?>" class="btn btn-sm btn-warning m-1"><i class="fas fa-edit"></i> Update</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          <?php endforeach ?>
     </section>
</div>
</div>