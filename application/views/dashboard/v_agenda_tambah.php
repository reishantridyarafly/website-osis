<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                         <div class="card-header">
                              <h4>Tambah Agenda Kegiatan</h4>
                         </div>
                         <div class="card-body">
                              <form action="<?= base_url('agenda/agenda_aksi') ?>" method="POST">
                                   <div class="form-group">
                                        <label for="nama_agenda">Agenda *</label>
                                        <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" value="<?= set_value('nama_agenda'); ?>" autocomplete="off" autofocus>
                                        <?= form_error('nama_agenda', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="deskripsi">Deskripsi *</label>
                                        <textarea name="deskripsi" id="editor" class="form-control" style="height: 100px;"><?= set_value('deskripsi') ?></textarea>
                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="agenda_mulai">Mulai *</label>
                                        <input type="date" name="agenda_mulai" id="agenda_mulai" class="form-control" value="<?= set_value('agenda_mulai') ?>">
                                        <?= form_error('agenda_mulai', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="agenda_selesai">Selesai *</label>
                                        <input type="date" name="agenda_selesai" id="agenda_selesai" class="form-control" value="<?= set_value('agenda_selesai') ?>">
                                        <?= form_error('agenda_selesai', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="tempat">Tempat</label>
                                        <input type="text" name="tempat" id="tempat" class="form-control" value="<?= set_value('tempat') ?>">
                                        <?= form_error('tempat', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="waktu">Waktu</label>
                                        <input type="text" name="waktu" id="waktu" class="form-control" value="<?= set_value('waktu') ?>" placeholder="Contoh : 07.00 - 12.00 WIB">
                                        <?= form_error('waktu', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <a href="<?= base_url() ?>agenda" class="btn btn-warning mr-2">Kembali</a>
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
     </section>
</div>