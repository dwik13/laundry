 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
         <div class="sidebar-brand-icon">
             <i class="fas fa-dumpster"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Sistem Laundry</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                                echo "active";
                            } ?>">
         <a class="nav-link" href="<?= base_url('dashboard'); ?>">
             <i class="fas fa-fw fa-solid fa-home"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Heading -->
     <div class="sidebar-heading">
         Manajemen Data
     </div>

     <!-- Nav Item - Charts -->
     <li class="nav-item <?php if ($this->uri->segment(1) == "konsumen") {
                                echo "active";
                            } ?>">
         <a class="nav-link" href="<?= base_url('konsumen'); ?>">
             <i class="fas fa-fw fa-address-book"></i>
             <span>Data Konsumen</span></a>
     </li>

     <li class="nav-item <?php if ($this->uri->segment(1) == "paket") {
                                echo "active";
                            } ?>">
         <a class="nav-link" href="<?= base_url('paket'); ?>">
             <i class="fas fa-fw fa-box"></i>
             <span>Data Paket</span></a>
     </li>

     <li class="nav-item <?php if ($this->uri->segment(1) == "transaksi") {
                                echo "active";
                            } ?>">
         <a class="nav-link" href="<?= base_url('transaksi') ?>">
             <i class="fas fa-fw fa-cash-register"></i>
             <span>Data Transaksi</span></a>
     </li>

     <li class="nav-item <?php if ($this->uri->segment(1) == "laporan") {
                                echo "active";
                            } ?>">
         <a class="nav-link" href="<?= base_url('laporan') ?>">
             <i class="fas fa-fw fa-book-open"></i>
             <span>Laporan</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('panel/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Log out</span></a>
     </li>

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('panel/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>