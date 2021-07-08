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
                              <h4>Kategori Artikel</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('kategori/kategori_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah kategori</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="1%">#</th>
                                                  <th scope="col">Kategori</th>
                                                  <th scope="col">Slug</th>
                                                  <th scope="col" width="30%">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($kategori as $k) { ?>
                                                  <tr>
                                                       <th scope="row"><?= $no++ ?></th>
                                                       <td><?= $k->kategori_nama ?></td>
                                                       <td><?= $k->kategori_slug ?></td>
                                                       <td>
                                                            <a href="<?= base_url('kategori/kategori_edit/' . $k->kategori_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('kategori/kategori_hapus/' . $k->kategori_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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