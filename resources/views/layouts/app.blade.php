<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?a=2') }}" rel="stylesheet">

    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.min.css?a=2') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>

    @isset($MyNavBar)
        <link href="{{ asset('css/jMenu.jquery.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jMenu.jquery.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>


    @endisset

    <title>{{ config('app.name', 'Laravel') }}</title>



    <style>
        #ui-datepicker-div {display: none;}

        .hasDatepicker{
            width: 80px !important;
        }
    </style>




</head>
<body  >
<div id="page-top">

    <?php  if(isset($mainTime) && !empty($mainTime)):  ?>
    <div class="" style=' text-align: center; padding: 10px;     font-size: 20px;'>
        This site will be down for maintenance on <span style="color: #FF0000;font-weight: bold;text-decoration: underline;"><?php echo formatDate($mainTime[0]); ?></span>
        at <?php echo $mainTime[1]; ?>
        for approximately <?php echo $mainTime[2]; ?>
    </div>
    <?php endif; ?>



    <span id="heading-title">{{ config('app.name', 'Laravel') }}</span>

    <span id="heading-logo"><img src="{{ asset('images/AA_Logo_SupportPlans.jpg') }}" alt="Assessments Australia" width="94" height="94"></span>

</div>
<div class="horizontal-block"></div>

@isset($MyNavBar)

<div id="header-container">

    <div id="main-menu">

        {!! $MyNavBar->asUl(array('id' => 'jMenu'))!!}

    </div>
    <div id="login-status">
        <span class="login-status-logo"><img src="{{ asset('images/users.png') }}" width="32" height="32"></span>
        <span class="login-status-text">{{ Auth::user()->name }} </span>
        <a title="Logout" href="{{ route('logout') }}"><span class="login-status-logo"><img src="{{ asset('images/logout.png') }}" width="32" height="32"></span><span class="login-status-text">Logout</span></a>
    </div>
</div>
@endisset
<div id="main-container" class="container-fluid">
    <style>
        .dataTables_length{
            padding: 10px;
        }
        .dataTables_filter
        {
            padding: 10px;
        }
    </style>
    <style type="text/css">::selection{background-color:#E13300;color:white;}::-moz-selection{background-color:#E13300;color:white;}#container{border:1px solid #D0D0D0;box-shadow:0 0 8px #D0D0D0;}</style>
    <div id="container" class="thin-border" >

    @yield('content')
     <?php   //var_dump(phpinfo()); ?>
    </div>
</div>
<div id="footer">
    Powered by SupporTrak Copyright &copy; <?php echo date("Y"); ?><br />SupporTrak Pty Ltd&nbsp;&nbsp;|&nbsp;&nbsp;Supporting Individual Planning<br />
    Tel: +61 3 9654 0204&nbsp;&nbsp;|&nbsp;&nbsp;<a href="mailto:{{ env('APP_EMAIL', '') }}">{{ env('APP_EMAIL', '') }}</a>
</div>
</body>
</html>