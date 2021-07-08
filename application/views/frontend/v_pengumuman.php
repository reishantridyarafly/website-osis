<main id="main">

     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li></li>
               </ol>
               <h2>Pengumuman</h2>

          </div>
     </section><!-- End Breadcrumbs -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact blog">
          <div class="container" data-aos="fade-up">

               <div class="section-title">
                    <h2>Pengumuman Kegiatan</h2>
               </div>

               <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <?php if (count($pengumuman) == 0) { ?>
                         <div class="text-center">
                              <h3>Pengumuman tidak di temukan !</h3>
                         </div>
                    <?php } ?>

                    <?php foreach ($pengumuman as $p) { ?>
                         <div class="col-lg-12 mb-4">
                              <div class="info-box">
                                   <i class="bx bx-volume-full"></i>
                                   <h3><?= $p->pengumuman_judul ?></h3>
                                   <p><?= longdate_indo($p->tanggal_mulai) ?> s/d <?= longdate_indo($p->tanggal_selesai) ?></p>
                                   <hr>
                                   <p><?= $p->pengumuman_deskripsi ?></p>
                              </div>
                         </div>
                    <?php } ?>
               </div>
               <?= $this->pagination->create_links(); ?>
          </div>
     </section><!-- End Contact Section -->

</main><!-- End #main -->