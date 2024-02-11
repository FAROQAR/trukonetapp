<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrukoNet | Integrated</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" 
    href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/mystyle.css">
    <!-- DataTables -->
    <!-- jsGrid -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jsgrid/jsgrid-theme.min.css">
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php
        //            $baseurl=base_url();
        // if ($preload) {
        //     echo '<div class="preloader flex-column justify-content-center align-items-center">';
        //     echo '<img class="animation__shake" src="' . base_url() . '/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">';
        //     echo '</div>';
        // }
        ?>


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">
                        <?= session()->bma_nama ?>
                    </a>
                    <!--style="color: #0E7BFF"-->
                </li>
                <!--                    <li class="nav-item d-none d-sm-inline-block">
                                            <a href="#" class="nav-link">Contact</a>
                                        </li>-->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#modal-sm" role="button">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">
                        <?= ucwords(session()->nama) ?>
                    </a>
                </li>
                <!--                    <li class="nav-item">
                                            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                                                <i class="fas fa-th-large"></i>
                                            </a>
                                        </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="index3.html" class="brand-link"> -->
            <a href="#" class="brand-link" style="background-color: #35BAF6">
                <!--<img src="<?= base_url(); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
                <img src="<?= base_url(); ?>/assets/img/logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">BillingNet</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url(); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?= session()->username ?></a>
                        </div>
                    </div> -->



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                        <?php
                        $retval = '';
                        foreach ($menu as $value) {


                            if (array_key_exists('children', $value)) {
                                if ($value['active'] === 'active') {
                                    $retval .= '<li class="nav-item menu-open">';
                                    //                                        $retval .= '<a href="#" class="nav-link active">';
                                } else {
                                    $retval .= '<li class="nav-item">';
                                    //                                        $retval .= '<a href="#" class="nav-link ">';
                                }
                                $retval .= '<a href="#" class="nav-link ' . $value['active'] . '">';
                                //                                    $retval .= '<li class="nav-item">';
//                                    $retval .= '<a href="#" class="nav-link">';
                                $retval .= '<i class="nav-icon fas ' . $value['iconCls'] . '"></i>';
                                $retval .= '<p>' . $value['text'] . '<i class="right fas fa-angle-left"></i></p></a>';
                                $retval .= '<ul class="nav nav-treeview">';
                                foreach ($value['children'] as $v) {
                                    $retval .= '<li class="nav-item">';
                                    //$retval .= '<a href="' . $v['viewType'].'/'.$v['text']. '" class="nav-link ' . $v['active'] . '">';
                                    $retval .= '<a href="' . $v['routeId'] . '" class="nav-link ' . $v['active'] . '">';
                                    $retval .= '<i class="far fa-circle nav-icon"></i>';
                                    $retval .= '<p>' . $v['text'] . '</p></a></li>';
                                }
                                $retval .= '</ul></li>';
                            } else {
                                $retval .= '<li class="nav-item">';
                                //$retval .= '<a href="' . $value['viewType'] . '" class="nav-link ' . $value['active'] . '">';
                                $retval .= '<a href="' . $value['routeId'] . '" class="nav-link ' . $value['active'] . '">';

                                $retval .= '<i class="nav-icon fas ' . $value['iconCls'] . '"></i>';
                                $retval .= '<p>
                                            ' . $value['text'] . '                                            
                                        </p> 
                                        </a>
                                        </li>';
                            }
                        }
                        echo $retval;
                        ?>
                        <!--                            <li class="nav-item menu-open">
                                                            <a href="#" class="nav-link active">
                                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                                <p>
                                                                    Dashboard
                                                                    <i class="right fas fa-angle-left"></i>
                                                                </p>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-item">
                                                                    <a href="./index.html" class="nav-link active">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Dashboard v1</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="./index2.html" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Dashboard v2</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="./index3.html" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Dashboard v3</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="/pages/widgets" class="nav-link">
                                                                <i class="nav-icon fas fa-th"></i>
                                                                <p>
                                                                    Widgets
                                                                    <span class="right badge badge-danger">New</span>
                                                                </p>
                                                            </a>
                                                        </li>-->

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <!-- /.modal -->

        <div class="modal fade" id="modal-sm">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Logout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Yakin Akan Logout?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" onclick="logout()">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?= $this->renderSection('content'); ?>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script>
        var base_url = "<?= base_url(); ?>";
    </script>
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- data table -->

    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url(); ?>/dist/js/pages/dashboard.js"></script>
    <script src="<?= base_url(); ?>/plugins/jsgrid/demos/db.js"></script>
    <script src="<?= base_url(); ?>/plugins/jsgrid/jsgrid.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/crypto-js.js"></script>
    <script src="<?= base_url(); ?>/assets/js/util.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bumdesmalist.js"></script>
    <script src="<?= base_url(); ?>/assets/js/paket.js"></script>
    <script src="<?= base_url(); ?>/assets/js/serverlist.js"></script>
    <script src="<?= base_url(); ?>/assets/js/orderlink.js"></script>
    <script src="<?= base_url(); ?>/assets/js/customer.js"></script>
    <script src="<?= base_url(); ?>/assets/js/technician.js"></script>
    <script src="<?= base_url(); ?>/assets/js/ticket.js"></script>
    <script>
        function logout() {
            //                console.log("<?= base_url('/logout'); ?>");
            window.location.href = "<?= base_url('/logout'); ?>";
        }
        ;
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false
                //   ,
                //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
    <?= $this->renderSection("pageScript") ?>
</body>

</html>