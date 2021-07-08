<!-- ======= Footer ======= -->
<footer id="footer">

     <div class="footer-top">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 footer-links">
                         <h4>Menu Utama</h4>
                         <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>">Home</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>blog">Blog</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>galeri-foto">Galeri</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>tentang">Tentang</a></li>
                         </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                         <h4>Akademik</h4>
                         <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>anggota-osis">Anggota</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>pengumuman-kegiatan">Pengumuman</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>agenda-kegiatan">Agenda</a></li>
                         </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                         <h3>Hubungi Kami<span>.</span></h3>
                         <p>
                              Jl. Cikeusik No.73<br>
                              Cikeusik, Cidahu<br>
                              Kabupaten Kuningan<br>
                              Jawa Barat<br><br>
                              <strong>Phone:</strong> +1 5589 55488 55<br>
                              <strong>Email:</strong> info@example.com<br>
                         </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                         <h4>Sosial Media</h4>
                         <div class="social-links">
                              <a href="<?= $pengaturan->link_twitter ?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                              <a href="<?= $pengaturan->link_facebook ?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                              <a href="<?= $pengaturan->link_instagram ?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                              <a href="<?= $pengaturan->link_whatsapp ?>" target="_blank" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                         </div>
                    </div>
                    <div class="copyright mt-4">
                         &copy; Copyright <?= date('Y') ?> <a href="https://rpl.smkn4kng.sch.id/" target="_blank"><strong><span>RPL SMKN 4 KUNINGAN</span></strong></a>
                    </div>
               </div>
          </div>
     </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets_frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>assets_frontend/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets_frontend/js/main.js"></script>

</body>

</html>