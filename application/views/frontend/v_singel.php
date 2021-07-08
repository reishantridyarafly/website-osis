<main id="main">

     <!-- ======= Breadcrumbs ======= -->
     <section class="breadcrumbs">
          <div class="container">

               <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                    <li></li>
               </ol>

          </div>
     </section><!-- End Breadcrumbs -->

     <!-- ======= Blog Single Section ======= -->
     <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">

               <div class="row">
                    <div class="col-lg-8 entries">

                         <?php if (count($artikel) == 0) { ?>
                              <center>
                                   <h3>Artikel Tidak Ditemukan !</h3>
                              </center>
                         <?php } ?>
                         <?php foreach ($artikel as $a) { ?>
                              <article class="entry entry-single">

                                   <div class="entry-img">
                                        <img src="<?= base_url() . 'gambar/artikel/' . $a->artikel_sampul ?>" width="100%" class="img-fluid">
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
                                        <p><?= $a->artikel_konten ?></p>
                                   </div>

                                   <div class="entry-footer clearfix">
                                        <div class="float-left">
                                             <i class="icofont-folder"></i>
                                             <ul class="cats">
                                                  <li><a href="<?= base_url() . 'kategori-blog/' . $a->kategori_slug ?>"><?= $a->kategori_nama ?></a></li>
                                             </ul>
                                        </div>

                                   </div>

                              </article><!-- End blog entry -->
                         <?php } ?>
                    </div><!-- End blog entries list -->

                    <?php $this->load->view('frontend/v_sidebar') ?>

               </div>
          </div>
     </section>
</main>