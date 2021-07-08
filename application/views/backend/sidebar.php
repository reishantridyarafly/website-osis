<body class="<?= $this->uri->segment(1) == 'artikel' || $this->uri->segment(1) == 'agenda' || $this->uri->segment(1) == 'pengumuman'  ? 'sidebar-mini' : '' ?>">
     <div id="app">
          <div class="main-wrapper">
               <div class="navbar-bg"></div>
               <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                         <ul class="navbar-nav navbar-left">
                              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                         </ul>
                         <div class="d-sm-none d-lg-inline-block text-light"><?= longdate_indo('Y-m-d') ?></div>
                    </form>
                    <ul class="navbar-nav navbar-right">
                         <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                   <!-- <img alt="image" src="<?= base_url() ?>assets_backend/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                                   <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama'); ?></div>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                   <a href="<?= base_url('pengguna/pengguna_detail/' . $this->session->userdata('id')) ?>" class="dropdown-item has-icon">
                                        <i class="fas fa-user"></i> Profile
                                   </a>
                                   <div class="dropdown-divider"></div>
                                   <a href="" data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                   </a>
                              </div>
                         </li>
                         <li><a href="<?= base_url() ?>" target="_blank" class="nav-link nav-link-lg mr-2"><i class="fas fa-globe"></i></a></li>
                    </ul>
               </nav>
               <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                         <div class="sidebar-brand">
                              <a href="<?= base_url() ?>dashboard">OSIS SMKN 4 Kuningan</a>
                         </div>
                         <div class="sidebar-brand sidebar-brand-sm">
                              <a href="<?= base_url() ?>dashboard">OSK</a>
                         </div>
                         <ul class="sidebar-menu">
                              <li class="menu-header">Dashboard</li>
                              <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                                   <a class="nav-link" href="<?= base_url() ?>dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
                              </li>
                              <li class="menu-header">Navigation</li>
                              <!-- cek jika yang login adalah admin  -->

                              <li class="nav-item dropdown <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                                   <a href="<?= base_url() ?>artikel" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pencil-alt"></i> <span>Berita</span></a>
                                   <ul class="dropdown-menu">
                                        <?php
                                        if ($this->session->userdata('level') == 'admin') {
                                        ?>
                                             <li><a class="nav-link" href="<?= base_url() ?>kategori">Kategori</a></li>
                                        <?php } ?>
                                        <li><a class="nav-link" href="<?= base_url() ?>artikel">Artikel</a></li>
                                   </ul>
                              </li>

                              <li class="<?= $this->uri->segment(1) == 'agenda' ? 'active' : '' ?>">
                                   <a class="nav-link" href="<?= base_url('agenda') ?>"><i class="fas fa-calendar"></i> <span>Agenda</span></a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'pengumuman' ? 'active' : '' ?>">
                                   <a class="nav-link" href="<?= base_url('pengumuman') ?>"><i class="fas fa-volume-up"></i> <span>Pengumuman</span></a>
                              </li>
                              <li class="nav-item dropdown <?= $this->uri->segment(1) == 'jabatan' || $this->uri->segment(1) == 'siswa' ? 'active' : '' ?>">
                                   <a href="<?= base_url('siswa') ?>" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Anggota</span></a>
                                   <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="<?= base_url() ?>jabatan">Jabatan</a></li>
                                        <li><a class="nav-link" href="<?= base_url() ?>siswa">Osis</a></li>
                                   </ul>
                              </li>
                              <li class="nav-item dropdown <?= $this->uri->segment(1) == 'galeri' || $this->uri->segment(1) == 'album' ? 'active' : '' ?>">
                                   <a href="<?= base_url('siswa') ?>" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-camera"></i> <span>Galeri</span></a>
                                   <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="<?= base_url() ?>album">Album</a></li>
                                        <li><a class="nav-link" href="<?= base_url() ?>galeri">Galeri</a></li>
                                   </ul>
                              </li>
                              <li class="menu-header">Settings</li>
                              <?php
                              if ($this->session->userdata('level') == 'admin') {
                              ?>
                                   <li class="<?= $this->uri->segment(1) == 'pengguna' ? 'active' : '' ?>">
                                        <a class="nav-link" href="<?= base_url('pengguna') ?>"><i class="fas fa-wrench"></i> <span>Pengguna</span></a>
                                   </li>
                                   <li class="<?= $this->uri->segment(1) == 'pengaturan' ? 'active' : '' ?>">
                                        <a class="nav-link" href="<?= base_url('pengaturan') ?>"><i class="fas fa-edit"></i> <span>Pengaturan Website</span></a>
                                   </li>
                              <?php } ?>
                              <li class="<?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                                   <a class="nav-link" href="<?= base_url('profile') ?>"><i class="fas fa-user"></i> <span>Update Profile</span></a>
                              </li>
                              <li class="<?= $this->uri->segment(1) == 'ganti_password' ? 'active' : '' ?>">
                                   <a class="nav-link" href="<?= base_url('ganti_password') ?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a>
                              </li>
                              <li class="menu-header">Logout</li>
                              <li>
                                   <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
                                   </a>
                              </li>
                         </ul>
                    </aside>
               </div>