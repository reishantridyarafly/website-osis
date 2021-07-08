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
                              <h4>Pengumuman Sekolah</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('pengumuman/pengumuman_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah pengumuman</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable" style="font-size: 12px;">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="20%">Judul</th>
                                                  <th scope="col" width="25%">Deskripsi</th>
                                                  <th scope="col">Tanggal</th>
                                                  <th scope="col">Author</th>
                                                  <th scope="col" width="10%">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($pengumuman as $p) { ?>
                                                  <tr>
                                                       <td><?= $p->pengumuman_judul ?></td>
                                                       <td><?= $p->pengumuman_deskripsi ?></td>
                                                       <td><?= mediumdate_indo($p->tanggal_mulai) ?> s/d <?= mediumdate_indo($p->tanggal_selesai) ?></td>
                                                       <td><?= $p->pengumuman_author ?></td>
                                                       <td>
                                                            <a href="<?= base_url('pengumuman/pengumuman_edit/' .  $p->pengumuman_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('pengumuman/pengumuman_hapus/' . $p->pengumuman_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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