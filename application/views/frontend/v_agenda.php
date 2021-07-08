<main id="main">
     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li></li>
               </ol>
               <h2>Agenda</h2>

          </div>
     </section><!-- End Breadcrumbs -->
     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact blog">
          <div class="container" data-aos="fade-up">

               <div class="section-title">
                    <h2>Agenda Kegiatan</h2>
               </div>

               <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <?php if (count($agenda) == 0) { ?>
                         <div class="text-center">
                              <h3>Agenda tidak di temukan !</h3>
                         </div>
                    <?php } ?>

                    <?php foreach ($agenda as $a) { ?>
                         <div class="col-lg-12 mb-4">
                              <div class="info-box">
                                   <i class="bx bx-calendar"></i>
                                   <h3><?= $a->agenda_nama ?></h3>
                                   <p><?= longdate_indo($a->agenda_mulai) ?> s/d <?= longdate_indo($a->agenda_selesai) ?></p>
                                   <p><?= $a->agenda_waktu ?></p>
                                   <p><?= $a->agenda_tempat ?></p>
                                   <hr>
                                   <p><?= $a->agenda_deskripsi ?></p>
                              </div>
                         </div>
                    <?php } ?>
               </div>
               <?= $this->pagination->create_links(); ?>
          </div>
     </section><!-- End Contact Section -->
</main>