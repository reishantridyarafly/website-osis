<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="row justify-content-center">
               <div class="col-12 col-md-6 col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                         <div class="card-header">
                              <h4>Update Pengguna Profile</h4>
                         </div>
                         <div class="card-body">
                              <?php foreach ($profile as $p) { ?>
                                   <form action="<?= base_url('profile/profile_update') ?>" method="POST">
                                        <div class="form-group">
                                             <label for="nama">Nama *</label>
                                             <input type="text" class="form-control" id="nama" name="nama" value="<?= $p->pengguna_nama ?>" autocomplete="off" autofocus>
                                             <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                             <label for="email">Email *</label>
                                             <input type="email" class="form-control" id="email" name="email" value="<?= $p->pengguna_email ?>" autocomplete="off" autofocus>
                                             <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="card-footer text-right">
                                             <button class="btn btn-primary">Submit</button>
                                        </div>
                                   </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
     </section>
</div>