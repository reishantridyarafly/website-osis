<div id="app">
     <section class="section">
          <div class="container mt-5">
               <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                         <div class="login-brand">
                              <img src="<?= base_url() . 'gambar/website/' . $pengaturan->logo ?>" alt="logo" width="30%">
                         </div>

                         <?php
                         if (isset($_GET['alert'])) {
                              if ($_GET['alert'] == 'gagal') {
                                   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Maaf! <strong>username</strong> atau <strong>password</strong> anda salah
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>';
                              } else if ($_GET['alert'] == 'belum_login') {
                                   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Anda harus <strong>login</strong> terlebih dahulu
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>';
                              } else if ($_GET['alert'] == 'logout') {
                                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  Anda <strong>berhasil</strong> keluar!
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>';
                              }
                         }
                         ?>

                         <div class="card card-primary">
                              <div class="card-header">
                                   <h4>Login</h4>
                              </div>
                              <div class="card-body">
                                   <form method="POST" action="<?= base_url('login/aksi') ?>" class="needs-validation" novalidate="">
                                        <div class="form-group">
                                             <label for="username">Username</label>
                                             <input id="username" type="username" class="form-control" name="username" required autofocus>
                                             <div class="invalid-feedback">
                                                  Silakan isi username anda
                                             </div>
                                        </div>

                                        <div class="form-group">
                                             <label for="password" class="control-label">Password</label>
                                             <input id="password" type="password" class="form-control" name="password" required>
                                             <div class="invalid-feedback">
                                                  Silakan isi password anda
                                             </div>
                                        </div>

                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                  Login
                                             </button>
                                        </div>
                                   </form>
                              </div>
                         </div>