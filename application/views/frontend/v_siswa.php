<main id="main">
     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li></li>
               </ol>
               <h2>OSIS</h2>

          </div>
     </section><!-- End Breadcrumbs -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact blog">
          <div class="container" data-aos="fade-up">

               <div class="section-title">
                    <h2>Anggota OSIS</h2>
               </div>

               <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($siswa as $s) { ?>
                         <div class="col-lg-4 mb-3">
                              <div class="info-box">
                                   <img src="<?= base_url() . 'gambar/osis/' . $s->siswa_photo ?>" width="55%" class="img-fluid mb-3" alt="">
                                   <p><?= $s->jabatan_nama ?></p>
                                   <h3><?= $s->siswa_nama ?></h3>
                                   <p><?= $s->kelas_nama ?></p>
                                   <p><?= $s->jurusan_nama ?></p>
                              </div>
                         </div>
                    <?php } ?>

               </div>
               <?php echo $this->pagination->create_links(); ?>
          </div>
     </section><!-- End Contact Section -->

</main><!-- End #main -->