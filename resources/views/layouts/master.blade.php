<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FUUAST</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('../bower_components/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('../bower_components/adminbsb-materialdesign/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('../bower_components/adminbsb-materialdesign/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('../bower_components/adminbsb-materialdesign/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('../bower_components/adminbsb-materialdesign/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>
<style>
    .bg-danger{
        background: #F44336;
    }
    .bg-success{
        background: #4CAF50;
    }
</style>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('layouts.header')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.sidebar-left')
        <!-- Right Sidebar -->
        @include('layouts.sidebar-right')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                @yield('content')
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('../bower_components/adminbsb-materialdesign/js/demo.js')}}"></script>

    <script>
        function readNotifications(){
            $('#_count').text('0');
        }


        function watchForRequests(){
            $.ajax({
               'url':'http://localhost:8080/fuuast/public/watch-for-requests',
               'method':'POST',  
            }).done((data) => {
                $('#_count').text(data.count);
                var list= '';
                if(data.notifications.length > 0){
                    console.log(data.notifications);
                    for(let notification of data.notifications){
                        list +=    `<li>
                                        <a href="http://localhost:8080/fuuast/public/view/student/`+notification.student_id+`" class="waves-effect waves-block">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">`+notification.name+`</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Degree Verification Request</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>`;
                    }
                    console.log(list);
                    $('.notificaion--list').empty();
                    $('.notificaion--list').append(list);
                }
            });
        }
        $(document).ready(function(){
            setInterval(watchForRequests,3000);
        })
    </script>
</body>

</html>