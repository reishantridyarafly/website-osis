<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1>Dashboard</h1>
          </div>
          <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-primary">
                              <i class="fas fa-pencil-alt"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Artikel</h4>
                              </div>
                              <div class="card-body">
                                   <?= $jumlah_artikel; ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-danger">
                              <i class="fas fa-calendar"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Agenda</h4>
                              </div>
                              <div class="card-body">
                                   <?= $jumlah_agenda; ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-warning">
                              <i class="fas fa-volume-up"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Pengumuman</h4>
                              </div>
                              <div class="card-body">
                                   <?= $jumlah_pengumuman; ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-success">
                              <i class="fas fa-users"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Anggota</h4>
                              </div>
                              <div class="card-body">
                                   <?= $jumlah_siswa; ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>