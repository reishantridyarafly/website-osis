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
                              <h4>Manajemen Artikel</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('artikel/artikel_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah artikel</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="1%">#</th>
                                                  <th scope="col">Tanggal</th>
                                                  <th scope="col">Artikel</th>
                                                  <th scope="col">Author</th>
                                                  <th scope="col">Kategori</th>
                                                  <th scope="col">Gambar</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col" width="20%">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $no = 1;
                                             foreach ($artikel as $r) { ?>
                                                  <tr>
                                                       <td><?= $no++ ?></td>
                                                       <td><?= date('d-m-Y H:i', strtotime($r->artikel_tanggal)) ?></td>
                                                       <td>
                                                            <?= $r->artikel_judul ?> <br>
                                                            <small class="text-muted"><?= base_url() . "" . $r->artikel_slug ?></small>
                                                       </td>
                                                       <td><?= $r->pengguna_nama; ?></td>
                                                       <td><?= $r->kategori_nama; ?></td>
                                                       <td>
                                                            <?php if ($r->artikel_sampul != null) { ?>
                                                                 <img src="<?= base_url('gambar/artikel/' . $r->artikel_sampul); ?>" width="120px">
                                                            <?php } ?>
                                                       </td>
                                                       <td class="text-center">
                                                            <?php
                                                            if ($r->artikel_status == "publish") {
                                                                 echo "<span class='badge rounded-pill bg-success text-light'>Publish</span>";
                                                            } else {
                                                                 echo "<span class='badge rounded-pill bg-danger text-light'>Draft</span>";
                                                            }
                                                            ?>
                                                       </td>
                                                       <td style="text-align: center;">
                                                            <a target="_blank" href="<?= base_url() . 'detail/' . $r->artikel_slug; ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                                            <?php
                                                            // cek apakah penggun yang login adalah penulis
                                                            if ($this->session->userdata('level') == 'penulis') {
                                                                 // jika penulis, maka cek apakah penulis artikel ini adalah si pengguna atau bukan
                                                                 if ($this->session->userdata('id') == $r->artikel_author) { ?>
                                                                      <a href="<?= base_url() . 'artikel/artikel_edit/' . $r->artikel_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-alt"></i></a>
                                                                      <a href="<?= base_url() . 'artikel/artikel_hapus/' . $r->artikel_id; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                                 <?php }
                                                            } else {
                                                                 // jika yang login adalah admin
                                                                 ?>
                                                                 <a href="<?= base_url() . 'artikel/artikel_edit/' . $r->artikel_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-alt"></i></a>
                                                                 <a href="<?= base_url() . 'artikel/artikel_hapus/' . $r->artikel_id; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                            <?php } ?>
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