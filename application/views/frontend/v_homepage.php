<main id="main">

     <!-- ======= Testimonials Section ======= -->
     <section id="testimonials" class="testimonials">
          <div class="container" data-aos="fade-up">
               <div class="section-title">
                    <h2>Selamat Datang</h2>
               </div>
          </div>

          <div class="container-fluid">

               <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-10">
                         <div class="testimonial-item">
                              <h3>Salam Hangat</h3>
                              <h4>Dari kami</h4>
                              <p>
                                   <i></i>
                                   Kami Menyambut baik terbitnya Website OSIS SMKN 4 KUNINGAN yang baru,
                                   dengan harapan dipublikasikannya website ini kami selaku anggota osis berharap : Bisa meningkatan
                                   kualitas terhadap siswa, guru, maupun masyarakat pada umumnya, dan kami berharap dengan adanya website ini
                                   kami bisa membukakan jalan kepada sekolah untuk menyampaikan aspirasi siswanya.
                                   <i></i>
                              </p>
                         </div>
                    </div>
               </div>

          </div>
     </section><!-- End Testimonials Section -->

     <!-- ======= Featured Section ======= -->
     <!-- <section id="featured" class="featured pricing">
          <div class="container">

               <div class="section-title" data-aos="fade-up">
                    <h2>Artikel Terbaru</h2>
               </div>

               <div class="row">
                    <?php foreach ($artikel as $a) { ?>
                         <div class="col-lg-4 mb-3">
                              <div class="icon-box">
                                   <a href="<?= base_url() . 'detail/' . $a->artikel_slug ?>"><img src="<?= base_url() . 'gambar/artikel/' . $a->artikel_sampul ?>" class="mb-3" width="100%"></a>
                                   <h3><a href="<?= base_url() . 'detail/' . $a->artikel_slug ?>"><?= $a->artikel_judul ?></a></h3>
                                   <p><?php echo limit_words($a->artikel_konten, 10) . '...'; ?></p><br>
                                   <p style="font-style:italic;"><?= longdate_indo('Y-m-d', strtotime($a->artikel_tanggal)) ?> . <?php echo $a->pengguna_level == 'admin' ? 'Admin' : 'Penulis' ?></p>
                              </div>
                         </div>
                    <?php } ?>
               </div>

          </div>
     </section>End Featured Section -->


     <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts">
          <div class="container" data-aos="fade-up">

               <div class="row justify-content-center">

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                         <div class="count-box">
                              <i class="icofont-user-alt-3"></i>
                              <span data-toggle="counter-up"><?= $siswa ?></span>
                              <p>Anggota OSIS</p>
                         </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                         <div class="count-box">
                              <i class="icofont-volume-up"></i>
                              <span data-toggle="counter-up"><?= $pengumuman_rows ?></span>
                              <p>Pengumuman</p>
                         </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                         <div class="count-box">
                              <i class="icofont-ui-calendar"></i>
                              <span data-toggle="counter-up"><?= $agenda ?></span>
                              <p>Agenda</p>
                         </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                         <div class="count-box">
                              <i class="icofont-pencil"></i>
                              <span data-toggle="counter-up"><?= $artikel ?></span>
                              <p>Artikel</p>
                         </div>
                    </div>

               </div>

          </div>
     </section><!-- End Counts Section -->

     <!-- ======= Services Section ======= -->
     <section id="services" class="services section-bg">
          <div class="container" data-aos="fade-up">

               <div class="row">
                    <div class="col-md-6" data-aos="fade-up">
                         <div class="section-title">
                              <h2>Pengumuman</h2>
                         </div>
                         <?php foreach ($pengumuman as $p) { ?>
                              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                   <i class="icofont-volume-up"></i>
                                   <h4><a href="<?php echo base_url() ?>pengumuman-kegiatan"><?= $p->pengumuman_judul ?></a></h4>
                                   <p><?= $p->pengumuman_deskripsi ?></p>
                              </div>
                         <?php } ?>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                         <div class="section-title" data-aos="fade-up">
                              <h2>Agenda</h2>
                         </div>
                         <?php foreach ($agenda_detail as $a) { ?>
                              <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
                                   <i class="icofont-ui-calendar"></i>
                                   <h4><a href="<?php echo base_url() ?>agenda-kegiatan"><?= $a->agenda_nama ?></a></h4>
                                   <p><?= $a->agenda_deskripsi ?></p>
                              </div>
                         <?php } ?>
                    </div>
               </div>

          </div>
     </section><!-- End Services Section -->
</main>