<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
     <div class="container-fluid">
          <div class="row justify-content-center">
               <div class="col-xl-10 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="<?= base_url() ?>"><img src="<?= base_url() . 'gambar/website/' . $pengaturan->logo ?>" alt=""></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->

                    <nav class="nav-menu d-none d-lg-block">
                         <ul>
                              <li class="<?= $this->uri->segment(1) == ''  || $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>">Home</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'anggota-osis' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>anggota-osis">Anggota</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'blog' || $this->uri->segment(1) == 'kategori-blog' || $this->uri->segment(1) == 'search' || $this->uri->segment(1) == 'detail' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>blog">Blog</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'pengumuman-kegiatan' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>pengumuman-kegiatan">Pengumuman</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'agenda-kegiatan' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>agenda-kegiatan">Agenda</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'galeri-foto' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>galeri-foto">Galeri</a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'tentang' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>tentang">Tentang</a>
                              </li>
                         </ul>
                    </nav><!-- .nav-menu -->
               </div>
          </div>

     </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

     <div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
          <div class="row justify-content-center">
               <div class="col-xl-10">
                    <div class="row">
                         <div class="col-xl-5">
                              <h1><?= $pengaturan->nama ?></h1>
                              <h2>Satukan Tekad, Satukan Tujuan, Wujudkan Kebersamaan</h2>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</section><!-- End Hero -->