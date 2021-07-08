<main id="main">

     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li></li>
               </ol>
               <h2>Blog</h2>

          </div>
     </section><!-- End Breadcrumbs -->

     <!-- ======= Blog Section ======= -->
     <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">

               <div class="row">

                    <div class="col-lg-8 entries">
                         <?php foreach ($artikel as $a) { ?>

                              <article class="entry" data-aos="fade-up">

                                   <div class="entry-img">
                                        <img src="<?= base_url() . 'gambar/artikel/' . $a->artikel_sampul ?>" width="100%" alt="" class="img-fluid">
                                   </div>

                                   <h2 class="entry-title">
                                        <a href="<?= base_url() . 'detail/' . $a->artikel_slug ?>"><?= $a->artikel_judul ?></a>
                                   </h2>

                                   <div class="entry-meta">
                                        <ul>
                                             <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><?= date('d M Y', strtotime($a->artikel_tanggal)) ?></li>
                                        </ul>
                                   </div>

                                   <div class="entry-content">
                                        <p>
                                             <?php echo limit_words($a->artikel_konten, 60) . '...'; ?>
                                        </p>
                                        <div class="read-more">
                                             <a href="<?= base_url() . 'detail/' . $a->artikel_slug ?>">Baca selengkapnya</a>
                                        </div>
                                   </div>

                              </article><!-- End blog entry -->
                         <?php } ?>

                         <?php echo $this->pagination->create_links(); ?>

                    </div><!-- End blog entries list -->

                    <?php $this->load->view('frontend/v_sidebar') ?>

               </div>

          </div>
     </section><!-- End Blog Section -->

</main><!-- End #main -->