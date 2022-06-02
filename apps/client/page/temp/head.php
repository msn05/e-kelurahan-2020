<!doctype html>
   <html lang="en">

   <head>
      <meta charset="utf-8" />
      <title><?=$Aplikasi;?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="<?=uri('');?>/dist/assets/images/favicon.ico">


      <!-- DataTables -->
      <link href="<?=uri('');?>/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

      <!-- <link href="<?=uri('');?>/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->

      <link href="<?=uri('');?>/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

      <!-- Bootstrap Css -->
      <link href="<?=uri('');?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?=uri('');?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="<?=uri('');?>/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      <script src="<?=uri();?>/dist/assets/libs/jquery/jquery.min.js"></script>

      <!-- Required datatable js -->
      <script src="<?=uri();?>/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?=uri();?>/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>    
      <script src="<?=uri();?>/dist/assets/libs/select2/js/select2.min.js"></script>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="../../../js/swall.js"></script>

   </head>

   <body data-layout="detached" data-topbar="colored">

      <div class="container-fluid">
         <!-- Begin page -->
         <div id="layout-wrapper">

            <header id="page-topbar">
               <div class="navbar-header">
                  <div class="container-fluid">
                     <div class="float-right">
                        <?php 
                        $Role = $_SESSION['session_role'];
                        if($Role == 1){?>
                           <div class="tambahData dropdown d-none d-lg-inline-block ml-1">
                             <button type="button" class="btn header-item waves-effect"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class=" mdi mdi-plus-thick  d-none d-xl-inline-block"></i>
                                Tambah Data
                             </button>
                             <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <!-- <a class="dropdown-item" href="?Halaman=role&Aksi=form" ><i class="mdi mdi-access-point font-size-16 align-middle mr-1"></i> Role</a> -->
                                <a class="dropdown-item" href="?Halaman=users&Aksi=form&id=&if=Tambah" ><i class="mdi mdi-account-multiple-check-outline font-size-16 align-middle mr-1"></i> Staf</a>
                                <a class="dropdown-item" href="?Halaman=pelayanan&Aksi=form&&id=&if=add" ><i class=" mdi mdi-view-agenda-outline  font-size-16 align-middle mr-1"></i> Pelayanan</a>
                                <a class="dropdown-item" href="?Halaman=persyaratan&Aksi=form&id=&if=add" ><i class=" mdi mdi-view-agenda-outline  font-size-16 align-middle mr-1"></i> Persyaratan</a>
                                <a class="dropdown-item" href="?Halaman=pembuatan_berkas_pengajuan_keterangan&Aksi=form&Keterangan=&id=&KodePelayanan=&if=Tambah" ><i class=" mdi mdi-file-certificate-outline  font-size-16 align-middle mr-1"></i> Surat Keterangan</a>
                                <a class="dropdown-item" href="?Halaman=pembuatan_berkas_pajak&Keterangan=&id=&KodePelayanan=" ><i class=" mdi mdi-file-certificate-outline  font-size-16 align-middle mr-1"></i> Surat PBB</a>
                                <a class="dropdown-item" href="?Halaman=pembuatan_surat_pengantar_nikah" ><i class=" mdi mdi-file-certificate-outline  font-size-16 align-middle mr-1"></i> Surat Pengantar Nikah</a>

                             </div>

                             <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                              <i class="mdi mdi-fullscreen"></i>
                           </button>

                        </div>
                     <?php }?>

                            <?php if($Role == 3){?>
                     <div class="dropdown d-inline-block">
                      <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="nameuser d-none d-xl-inline-block ml-1"></span>
                         <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                      </button>
                      <div class=" dropdown-menu dropdown-menu-right">
                         <!-- item-->
                         <a class="profile-public dropdown-item" href="?Halaman=profile" id="profile"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                      </div>
                   </div>
                    <?php }?>

                </div>
                <div>
                 <!-- LOGO -->
                 <div class="navbar-brand-box">
                    <a href="index.php" class="logo logo-light">
                       <span class="logo-sm">
                          <img src="<?=uri('');?>/dist/assets/images/Lambang_Kota_Palembang.gif" alt="" height="20">
                       </span>
                       <span class="logo-lg">
                          <img src="<?=uri('');?>/dist/assets/images/e-kelurahan.png" alt="" height="40">
                       </span>
                    </a>
                 </div>

                 <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                  <i class="fa fa-fw fa-bars"></i>
               </button>

            </div>

         </div>
      </div>
   </header> <!-- ========== Left Sidebar Start ========== -->


   <div class="vertical-menu">

      <div class="h-100">

         <div class="user-wid text-center py-4">
            <div class="user-img">
               <img src="<?=uri('');?>/dist/assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

               <span class="nameuser text-dark font-weight-medium font-size-16"></span>
               <p class="posisi text-body mt-1 mb-0 font-size-13">Tidak Diketahui</p>

            </div>
         </div>

