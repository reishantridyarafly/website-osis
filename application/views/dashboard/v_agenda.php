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
                              <h4>Agenda Kegiatan Sekolah</h4>
                         </div>
                         <div class="card-body">
                              <a href="<?= base_url('agenda/agenda_tambah') ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="fas fa-plus"></i> Tambah Agenda</a>
                              <div class="table-responsive-lg">
                                   <table class="table table-striped" id="dataTable">
                                        <thead>
                                             <tr>
                                                  <th scope="col" width="15%">Agenda</th>
                                                  <th scope="col">Tanggal</th>
                                                  <th scope="col">Tempat</th>
                                                  <th scope="col">Waktu</th>
                                                  <th scope="col">Author</th>
                                                  <th scope="col" width="10%">Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             foreach ($agenda as $a) { ?>
                                                  <tr>
                                                       <td><?= $a->agenda_nama ?></td>
                                                       <td><?= mediumdate_indo($a->agenda_mulai) ?> s/d <?= mediumdate_indo($a->agenda_selesai) ?></td>
                                                       <td><?= $a->agenda_tempat ?></td>
                                                       <td><?= $a->agenda_waktu ?></td>
                                                       <td><?= $a->agenda_author ?></td>
                                                       <td>
                                                            <a href="<?= base_url('agenda/agenda_edit/' . $a->agenda_id) ?>" class="btn btn-warning btn-sm mr-1">
                                                                 <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('agenda/agenda_hapus/' . $a->agenda_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">
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