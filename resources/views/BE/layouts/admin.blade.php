<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard </title>

<link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="/vendors/nprogress/nprogress.css" rel="stylesheet">

<link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<link href="/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

<link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

<link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

<link href="/vendors/starrr/dist/starrr.css" rel="stylesheet">

<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<link href="/css/custom.min.css" rel="stylesheet">
<meta name="robots" content="index, nofollow">
<style>
      .ejoy-sub-active{
        color: #1296ba !important;
      }
      
      .ejoy-sub-hovered{
        color: #1296ba !important;
      }
      .ejoy-sub-clzz{
        cursor: pointer;
        
        lineHeight: 1.2;
          font-size: 28px;
          color: #FFCC00; background: rgba(17, 17, 17, 0.7);
        
      }
      .ejoy-sub-clzz:hover{
        color: #1296ba !important;
      }
      .ej-trans-sub{
        position: absolute;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999999;
        cursor: move;
      }
      .ej-trans-sub > span{
        color: #3CF9ED;
        font-size: 18px;
        text-align: center;
        padding: 0 16px;
        line-height: 1.5;
        background: rgba(32, 26, 25, 0.8);
        // text-shadow: 0px 1px 4px black;
        padding: 0 8px;
        
        lineHeight: 1.2;
        font-size: 16px;
        color: #0CB1C7; background: rgba(67, 65, 65, 0.7);
      
      }
      .ej-main-sub{
        position: absolute;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999999;
        cursor: move;
        padding: 0 8px;
      }
      .ej-main-sub > span{
        color: white;
        font-size: 20px;
        line-height: 1.5;
        text-align: center;
        background: rgba(32, 26, 25, 0.8);
        // text-shadow: 0px 1px 4px black;
        padding: 2px 8px;
        
        lineHeight: 1.2;
          font-size: 28px;
          color: #FFCC00; background: rgba(17, 17, 17, 0.7);
        
      }

      .ej-main-sub .ejoy-sub-clzz{
        background: transparent !important
      }

      .tran-subtitle > span{
        cursor: pointer;
        padding-left: 10px;
        top: 2px;
        position: relative;
      }

      .tran-subtitle > span > span{
        position: absolute;
        top: -170%;
        background: rgba(0,0,0,0.5);
        font-size: 13px;
        line-height: 20px;
        padding: 2px 8px;
        color: white;
        display: none;
        border-radius: 4px;
        white-space: nowrap;
        left: -50%;
        font-weight: normal;
      }

      .view-icon-copy-main-sub:hover > span, .view-icon-edit-sub:hover > span, .view-icon-copy-tran-sub:hover > span {
        display: block;
      }

      .tran-subtitle > span > svg{
        width: 16px;
        height: 16px;
        pointer-events: none;
        display: inline-flex !important;
        vertical-align: baseline !important;
      }
      
      .view-icon-copy-main-sub > svg{
        pointer-events: none;
        color: #FFCC00
      }

      .view-icon-copy-tran-sub{
        padding-left: 0 !important;
        padding-right: 8px !important;
      }
      .view-icon-copy-tran-sub > svg{
        pointer-events: none;
        color: #0CB1C7
      }


      </style>
</head>

    <body class="nav-sm">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        @include('BE.admin.left-menu')
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    @include('BE.admin.top-nav')   
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="/vendors/Flot/jquery.flot.js"></script>
        <script src="/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="/vendors/Flot/jquery.flot.time.js"></script>
        <script src="/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="/vendors/moment/min/moment.min.js"></script>
        <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="/vendors/google-code-prettify/src/prettify.js"></script>
        <script src="/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <script src="/vendors/switchery/dist/switchery.min.js"></script>
        <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
        <script src="/vendors/parsleyjs/dist/parsley.min.js"></script>
        <script src="/vendors/autosize/dist/autosize.min.js"></script>
        <script src="/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <script src="/vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        
        <script  src="/js/custom.min.js" ></script>
    </body>
</html>
