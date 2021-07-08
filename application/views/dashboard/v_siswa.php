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
                              <h4>Daftar Anggota OSIS</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('siswa/siswa_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah Anggota</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="1%">#</th>
                                                  <th scope="col" width="1%">Foto</th>
                                                  <th scope="col">NIS</th>
                                                  <th scope="col" width="20%">Nama</th>
                                                  <th scope="col" width="15%">Jabatan</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col" width="20%">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($siswa as $s) { ?>
                                                  <tr>
                                                       <th scope="row"><?= $no++ ?></th>
                                                       <td>
                                                            <?php if ($s->siswa_photo != null) { ?>
                                                                 <img src="<?= base_url() . 'gambar/osis/' . $s->siswa_photo ?>" width="100px">
                                                            <?php } ?>
                                                       </td>
                                                       <td><?= $s->siswa_nis ?></td>
                                                       <td><?= $s->siswa_nama ?></td>
                                                       <td><?= $s->jabatan_nama ?></td>
                                                       <td style="text-align: center;">
                                                            <?php
                                                            if ($s->status == 1) {
                                                                 echo "<span class='badge rounded-pill bg-success text-light'>Aktif</span>";
                                                            } else {
                                                                 echo "<span class='badge rounded-pill bg-danger text-light'>Keluar</span>";
                                                            }
                                                            ?>
                                                       </td>
                                                       <td>
                                                            <a href="<?= base_url('siswa/siswa_detail/' . $s->siswa_id) ?>" class="btn btn-info btn-sm mr-1">
                                                                 <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?= base_url('siswa/siswa_edit/' . $s->siswa_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('siswa/siswa_hapus/' . $s->siswa_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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