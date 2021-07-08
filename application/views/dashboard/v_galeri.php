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
                              <h4>Geleri Kegiatan</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('galeri/galeri_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah Foto</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="20%">Gambar</th>
                                                  <th scope="col" width="25%">Judul</th>
                                                  <th scope="col">Tanggal</th>
                                                  <th scope="col">Album</th>
                                                  <th scope="col">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             foreach ($gambar as $g) { ?>
                                                  <tr>
                                                       <td>
                                                            <img src="<?= base_url() . 'gambar/galeri/' . $g->galeri_gambar ?>" width="100%">
                                                       </td>
                                                       <td><?= $g->galeri_judul ?></td>
                                                       <td><?= date('d/M/Y', strtotime($g->galeri_tanggal)) ?></td>
                                                       <td><?= $g->album_nama ?></td>
                                                       <td>
                                                            <a href="<?= base_url('galeri/galeri_edit/' . $g->galeri_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('galeri/galeri_hapus/' . $g->galeri_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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
     </section>
</div>