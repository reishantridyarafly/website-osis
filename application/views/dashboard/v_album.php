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
                              <h4>Album Foto</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('album/album_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah Album</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="1%">#</th>
                                                  <th scope="col">Nama</th>
                                                  <th scope="col">Slug</th>
                                                  <th scope="col">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($album as $a) { ?>
                                                  <tr>
                                                       <th scope="row"><?= $no++ ?></th>
                                                       <td><?= $a->album_nama ?></td>
                                                       <td><?= $a->album_slug ?></td>
                                                       <td>
                                                            <a href="<?= base_url('album/album_edit/' . $a->album_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('album/album_hapus/' . $a->album_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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