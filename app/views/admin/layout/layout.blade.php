<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mobile first web app theme | first</title>
    <meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/plugin.css">
    <!--[if lt IE 9]>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/html5.js"></script>
    <script src="/js/ie/excanvas.js"></script>
    <![endif]-->
    {{HTML::script('scripts/jquery-1.11.1.min.js')}}
    {{HTML::script('scripts/for_admin.js')}}
    {{HTML::script('scripts/tinymce/tinymce.min.js')}}
    {{HTML::script('scripts/tinymce/tiny_option.js')}}
</head>
<body>
<!-- header -->
<header id="header" class="navbar">
    <ul class="nav navbar-nav navbar-avatar pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs-only">Mika Sokeil</span>
                <span class="thumb-small avatar inline"><img src="images/avatar.jpg" alt="Mika Sokeil" class="img-circle"></span>
                <b class="caret hidden-xs-only"></b>
            </a>
            <ul class="dropdown-menu pull-right">
                <li><a href="/admin/setting">Settings</a></li>
                {{--<li><a href="#"><span class="badge bg-danger pull-right">3</span>Notifications</a></li>--}}
                <li class="divider"></li>
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
    <a class="navbar-brand" href="/">Site</a>
    <button type="button" class="btn btn-link pull-left nav-toggle visible-xs" data-toggle="class:slide-nav slide-nav-left" data-target="body">
        <i class="fa fa-bars fa-lg text-default"></i>
    </button>
    {{--<ul class="nav navbar-nav hidden-xs">--}}
        {{--<li>--}}
            {{--<div class="m-t m-b-small" id="panel-notifications">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comment-o fa-fw fa-lg text-default"></i><b class="badge badge-notes bg-danger count-n">2</b></a>--}}
                {{--<section class="dropdown-menu m-l-small m-t-mini">--}}
                    {{--<section class="panel panel-large arrow arrow-top">--}}
                        {{--<header class="panel-heading bg-white"><span class="h5"><strong>You have <span class="count-n">2</span> notifications</strong></span></header>--}}
                        {{--<div class="list-group">--}}
                            {{--<a href="#" class="media list-group-item">--}}
                                {{--<span class="pull-left thumb-small"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>--}}
                  {{--<span class="media-body block m-b-none">--}}
                    {{--Moved to Bootstrap 3.0<br>--}}
                    {{--<small class="text-muted">23 June 13</small>--}}
                  {{--</span>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="media list-group-item">--}}
                  {{--<span class="media-body block m-b-none">--}}
                    {{--first v.1 (Bootstrap 2.3 based) released<br>--}}
                    {{--<small class="text-muted">19 June 13</small>--}}
                  {{--</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<footer class="panel-footer text-small">--}}
                            {{--<a href="#" class="pull-right"><i class="fa fa-cog"></i></a>--}}
                            {{--<a href="#">See all the notifications</a>--}}
                        {{--</footer>--}}
                    {{--</section>--}}
                {{--</section>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li><div class="m-t-small"><a class="btn btn-sm btn-info" data-toggle="modal" href="#modal"><i class="fa fa-fw fa-plus"></i> POST</a></div></li>--}}
        {{--<li class="dropdown shift" data-toggle="shift:appendTo" data-target=".nav-primary .nav">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg visible-xs visible-xs-inline"></i>Settings <b class="caret hidden-sm-only"></b></a>--}}
            {{--<ul class="dropdown-menu">--}}
                {{--<li>--}}
                    {{--<a href="#" data-toggle="class:navbar-fixed" data-target='body'>Navbar--}}
                        {{--<span class="text-active">auto</span>--}}
                        {{--<span class="text">fixed</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="hidden-xs">--}}
                    {{--<a href="#" data-toggle="class:nav-vertical" data-target="#nav">Nav--}}
                        {{--<span class="text-active">vertical</span>--}}
                        {{--<span class="text">horizontal</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="divider hidden-xs"></li>--}}
                {{--<li class="dropdown-header">Colors</li>--}}
                {{--<li>--}}
                    {{--<a href="#" data-toggle="class:bg bg-black" data-target='.navbar'>Navbar--}}
                        {{--<span class="text-active">white</span>--}}
                        {{--<span class="text">inverse</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" data-toggle="class:bg-light" data-target='#nav'>Nav--}}
                        {{--<span class="text-active">inverse</span>--}}
                        {{--<span class="text">light</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    {{--</ul>--}}
    {{--<form class="navbar-form pull-left shift" action="" data-toggle="shift:appendTo" data-target=".nav-primary">--}}
        {{--<i class="fa fa-search text-muted"></i>--}}
        {{--<input type="text" class="input-sm form-control" placeholder="Search">--}}
    {{--</form>--}}
</header>
<!-- / header -->
<!-- nav -->
<nav id="nav" class="nav-primary hidden-xs nav-vertical">
    <ul class="nav" data-spy="affix" data-offset-top="50">
        <li class="active"><a href="index.html"><i class="fa fa-dashboard fa-lg"></i><span>Dashboard</span></a></li>
        <li class="dropdown-submenu">
            <a href="#"><i class="fa fa-th fa-lg"></i><span>Menu</span></a>
            <ul class="dropdown-menu">
                <li class="{{ (Request::segment(2) == 'category') ? 'active':'' }}"><a href="/admin/category">Category</a></li>
                {{--<li class="{{ (Request::segment(2) == 'subcategory') ? 'active':'' }}"><a href="/admin/subcategory">Subcategory</a></li>--}}
                <li class="{{ (Request::segment(2) == 'product') ? 'active':'' }}"><a href="/admin/product">Product</a></li>
                <li class="{{ (Request::segment(2) == 'page') ? 'active':'' }}"><a href="/admin/page">Page</a></li>
                {{--<li class="{{ (Request::segment(2) == 'specialOffer') ? 'active':'' }}"><a href="admin/specialOffer">Special offer</a></li>--}}
                {{--<li><a href="components.html"><b class="badge pull-right">18</b>Components</a></li>--}}
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#"><i class="fa fa-list fa-lg"></i><span>Components</span></a>
            <ul class="dropdown-menu">
                <li class="{{ (Request::segment(2) == 'size') ? 'active':'' }}"><a href="/admin/size">Sizes</a></li>
                <li class="{{ (Request::segment(2) == 'slider') ? 'active':'' }}"><a href="/admin/slider">Slider</a></li>
                <li class="{{ (Request::segment(2) == 'group') ? 'active':'' }}"><a href="/admin/group">Group</a></li>
                <li class="{{ (Request::segment(2) == 'social') ? 'active':'' }}"><a href="/admin/social">Social</a></li>
                <li class="{{ (Request::segment(2) == 'setting') ? 'active':'' }}"><a href="/admin/setting">Setting</a></li>
            </ul>
        </li>
        {{--<li><a href="form.html"><i class="fa fa-edit fa-lg"></i><span>Form</span></a></li>--}}
        {{--<li><a href="chart.html"><i class="fa fa-signal fa-lg"></i><span>Chart</span></a></li>--}}
        {{--<li class="dropdown-submenu">--}}
            {{--<a href="#"><i class="fa fa-link fa-lg"></i><span>Others</span></a>--}}
            {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="mail.html">Mail</a></li>--}}
                {{--<li><a href="calendar.html">Fullcalendar</a></li>--}}
                {{--<li><a href="timeline.html">Timeline</a></li>--}}
                {{--<li><a href="profile.html">Profile</a></li>--}}
                {{--<li><a href="gallery.html">Gallery</a></li>--}}
                {{--<li><a href="maps.html">Maps</a></li>--}}
                {{--<li><a href="invoice.html">Invoice</a></li>--}}
                {{--<li><a href="signin.html">Signin page</a></li>--}}
                {{--<li><a href="signup.html">Signup page</a></li>--}}
                {{--<li><a href="404.html">404 page</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>
</nav>
<!-- / nav -->
<section id="content">
    <section class="main padder">
        <div class="row">
            <!------------------- content --------------------------->
            @yield('content')
        </div>
    </section>
</section>
<!-- .modal -->
<div id="modal" class="modal fade">
    <form class="m-b-none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Post your first idea</h4>
                </div>
                <div class="modal-body">
                    <div class="block">
                        <label class="control-label">Title</label>
                        <input type="text" class="form-control" placeholder="Post title">
                    </div>
                    <div class="block">
                        <label class="control-label">Content</label>
                        <textarea class="form-control" placeholder="Content" rows="5"></textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Share with all memebers of first
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-sm btn-primary" data-loading-text="Publishing...">Publish</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </form>
</div>
<!-- / .modal -->
<!-- footer -->
<footer id="footer">
    <div class="text-center padder clearfix">
        <p>
            <small>&copy; first 2013, Mobile first web app framework base on Bootstrap</small><br><br>
            <a href="#" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a>
        </p>
    </div>
</footer>
<a href="#" class="hide slide-nav-block" data-toggle="class:slide-nav slide-nav-left" data-target="body"></a>
<!-- / footer -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.js"></script>
<!-- app -->
<script src="/js/app.js"></script>
<script src="/js/app.plugin.js"></script>
<script src="/js/app.data.js"></script>

<!-- Sparkline Chart -->
<script src="/js/charts/sparkline/jquery.sparkline.min.js"></script>
<!-- Easy Pie Chart -->
<script src="/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
</body>
</html>