<footer class="main-footer">
     <div class="footer-left">
          Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> By <a href="https://rpl.smkn4kng.sch.id/" target="_blank"><strong>RPL SMKN 4 KUNINGAN</strong></a> All Rights Reserved.
     </div>
</footer>
</div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                    </button>
               </div>
               <div class="modal-body">Pilih <strong>"keluar"</strong> di bawah ini jika anda siap keluar.</div>
               <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('dashboard/keluar'); ?>">Keluar</a>
               </div>
          </div>
     </div>
</div>

<!-- General JS Scripts -->
<script src=" https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>assets_backend/js/stisla.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>assets_backend/js/scripts.js"></script>
<script src="<?= base_url() ?>assets_backend/js/custom.js"></script>
<script src="<?= base_url() ?>assets_backend/js/ckeditor/ckeditor.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>assets_backend/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets_backend/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>assets_backend/js/page/modules-datatables.js"></script>

<script>
     $(document).ready(function() {
          $('#dataTable').DataTable();
     })
</script>

<script>
     $(function() {
          CKEDITOR.replace('editor')
     });
</script>

</body>

</html>