<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                         <div class="card-header">
                              <h4>Pengguna</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('pengguna/pengguna_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah Pengguna</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="1%">#</th>
                                                  <th scope="col">Nama</th>
                                                  <th scope="col">Username</th>
                                                  <th scope="col">Level</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($pengguna as $p) { ?>
                                                  <tr>
                                                       <th scope="row"><?= $no++ ?></th>
                                                       <td><?= $p->pengguna_nama ?></td>
                                                       <td><?= $p->pengguna_username ?></td>
                                                       <td><?= $p->pengguna_level ?></td>
                                                       <td style="text-align: center;">
                                                            <?php
                                                            if ($p->pengguna_status == "1") {
                                                                 echo "<span class='badge rounded-pill bg-success text-light'>Aktif</span>";
                                                            } else {
                                                                 echo "<span class='badge rounded-pill bg-danger text-light'>Non Aktif</span>";
                                                            }
                                                            ?>
                                                       </td>
                                                       <td>
                                                            <a href="<?= base_url('pengguna/pengguna_detail/' . $p->pengguna_id) ?>" class="btn btn-info btn-sm mr-1">
                                                                 <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?= base_url('pengguna/pengguna_edit/' . $p->pengguna_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('pengguna/pengguna_hapus/' . $p->pengguna_id) ?>" class="btn btn-danger btn-sm">
                                                                 <i class="fas fa-trash"></i>
                                                            </a>
                                                       </td>
                                                  </tr>
                                             <?php } ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>