 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(''); ?>">
     <div class="sidebar-brand-icon rotate-n-15">
       <i class="fas">
         <img class="img-profile rounded-circle" style="height: 62px;width: 62px;" src="https://www.jagoanserver.com/wp-content/uploads/2018/07/cloud-hosting-bg.png">
       </i>
     </div>
     <div class="sidebar-brand-text mx-3">{judul}<sup></sup></div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
     <a class="nav-link" href="<?php echo site_url('Home'); ?>">
       <i class="fas fa-fw fa-tachometer-alt"></i>
       <span>Dashboard</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->



   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-fw fa-fire"></i>
       <span>Menu Firewall</span>
     </a>
     <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <a class="collapsed-item" href="<?php echo site_url('Firewall'); ?>">
           <i class="fas fa-fw fa-filter"></i>
           Firewall Filtering
         </a>

       </div>
     </div>
   </li>
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-fw fa-server"></i>
       <span>Menu Monitoring</span>
     </a>
     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <a class="collapse-item" href="<?php echo site_url('Monitoring'); ?>">
           <i class="fas fa-fw fa-filter"></i>
           Client Active</a>
         <a class="collapse-item" href="<?php echo site_url('Mikrotik_Dasboard/Monitoring/Hostlog'); ?>">
           <i class="fas fa-fw fa-info"></i>
           Client Log</a>

       </div>
     </div>
   </li>


   <!-- Nav Item - Pages Collapse Menu -->


   <!-- Nav Item - Charts -->


   <!-- Nav Item - Tables -->


   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0 " id="sidebarToggle"></button>
   </div>

 </ul>