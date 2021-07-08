<main id="main">

     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li></li>
               </ol>
               <h2>Galeri</h2>

          </div>
     </section><!-- End Breadcrumbs -->

     <!-- ======= Portfolio Section ======= -->
     <section id="portfolio" class="portfolio blog">
          <div class="container" data-aos="fade-up">

               <div class="section-title">
                    <h2>Galeri Foto</h2>
               </div>


               <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                         <ul id="portfolio-flters">
                              <li data-filter="*" class="filter-active">All</li>
                              <?php foreach ($album as $a) { ?>
                                   <li data-filter=".filter-<?= $a->album_slug ?>"><?= $a->album_nama ?></li>
                              <?php } ?>
                         </ul>
                    </div>
               </div>

               <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($galeri as $g) { ?>
                         <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $g->album_slug ?>">
                              <div class="portfolio-wrap">
                                   <img src="<?= base_url() . 'gambar/galeri/' . $g->galeri_gambar ?>" class="img-fluid" alt="">
                                   <div class="portfolio-info">
                                        <h4><?= $g->galeri_judul ?></h4>
                                        <p><?= $g->album_nama ?></p>
                                        <p><?= date('d/M/Y', strtotime($g->galeri_tanggal)) ?></p>
                                        <div class="portfolio-links">
                                             <a href="<?= base_url() . 'gambar/galeri/' . $g->galeri_gambar ?>" data-gall="portfolioGallery" class="venobox" title="<?= $g->galeri_judul ?>"><i class="bx bx-plus"></i></a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    <?php } ?>

               </div>
               <?= $this->pagination->create_links(); ?>
          </div>
     </section><!-- End Portfolio Section -->
</main>