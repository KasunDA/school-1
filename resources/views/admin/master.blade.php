<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name', 'School') }}</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="/assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/assets/images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="/assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="/assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css /assets/styles/app.min.css -->
  <link rel="stylesheet" href="/assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="/assets/styles/font.css" type="text/css" />
  <link rel="stylesheet" href="/assets/bootstrap-rtl/dist/bootstrap-rtl.css" type="text/css" />
  <link rel="stylesheet" href="/assets/styles/app.rtl.css" type="text/css" />
</head>
<body>
<div class="app" id="app">

  <!-- ############ LAYOUT START-->

  <!-- aside -->
  @include('partials.aside')
  <!-- / -->

  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
      <div class="navbar navbar-toggleable-sm flex-row align-items-center">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
          <i class="material-icons">&#xe5d2;</i>
        </a>
        <!-- / -->

        <!-- Page title - Bind to $state's title -->
        <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

        <!-- navbar collapse -->
        <div class="collapse navbar-collapse" id="collapse">
          <!-- link and dropdown -->
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href data-toggle="dropdown">
                <i class="fa fa-fw fa-plus text-muted"></i>
                <span>جدید</span>
              </a>
              <div ui-include="'../views/blocks/dropdown.new.html'"></div>
            </li>
          </ul>

          <div ui-include="'../views/blocks/navbar.form.html'"></div>
          <!-- / -->
        </div>
        <!-- / navbar collapse -->

        <!-- navbar right -->
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item dropdown pos-stc-xs">
            <a class="nav-link mr-2" href data-toggle="dropdown">
              <i class="material-icons">&#xe7f5;</i>
              <span class="label label-sm up warn">3</span>
            </a>
            <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="/assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
            </a>
            <div ui-include="'../views/blocks/dropdown.user.html'"></div>
          </li>
          <li class="nav-item hidden-md-up">
            <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
              <i class="material-icons">&#xe5d4;</i>
            </a>
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; کلیه حقوق برای <strong>ایکلفا</strong> محفوظ است <span class="hidden-xs-down">- توسعه یافته با عشق v0.0.1</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="../">درباره</a>
          <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">دریافت</a>
        </div>
      </div>
    </div>
    <div class="app-body">

      <!-- ############ PAGE START-->
      <div class="p-a white lt box-shadow">
        <div class="row">
          <div class="col-sm-6">
            <h4 class="mb-0 _300">سامانه مجازی مدارس</h4>
            <small class="text-muted">سیستم یکپارچه مدیریت مدارس <strong>ایکلفا</strong> </small>
          </div>
          <div class="col-sm-6">
            <div class="m-y-sm pull-right">
              <span class="m-r-sm">شروع مدیریت:</span>
              <div class="btn-group dropdown">
                <button class="btn white btn-sm ">پروژه ها</button>
                <button class="btn white btn-sm dropdown-toggle" data-toggle="dropdown"></button>
                <div class="dropdown-menu dropdown-menu-scale pull-right">
                  <a class="dropdown-item" href>کاربران</a>
                  <a class="dropdown-item" href>کارها</a>
                  <a class="dropdown-item" href>صندوق پیام</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item">پروفایل</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="padding">
        <router-view></router-view>
      </div>
    </div>
  </div>
  <!-- / -->

  <!-- ############ LAYOUT END-->

</div>
<!-- build:js /scripts/app.html.js -->
<!-- jQuery -->
<script src="/libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="/libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>

<script src="{{ mix("assets/admin/js/app.js") }}"></script>
</body>
</html>