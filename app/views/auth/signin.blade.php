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
  <!--[if lt IE 9]>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/html5.js"></script>
  <![endif]-->
</head>
<body>
  <!-- header -->
  <header id="header" class="navbar bg bg-black">
    <a href="docs.html" class="btn btn-link pull-right m-t-mini"><i class="fa fa-question fa-lg text-default"></i></a>
    <a class="navbar-brand" href="#">first</a>
  </header>
  <!-- / header -->
  <section id="content">
    <div class="main padder">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 m-t-large">
          <section class="panel">
            <header class="panel-heading text-center">
              Sign in
            </header>
              {{ Form::open(array('class' => 'panel-body', 'action' => 'AuthController@login')) }}
              <div class="block">
                <label class="control-label">Email</label>
                  {{ Form::email('email', null, ['placeholder' => 'test@example.com', 'class' => 'form-control', 'id' => 'email']) }}
              </div>
              <div class="block">
                <label class="control-label">Password</label>
                  {{ Form::text('password', null, ['placeholder' => 'Password','class' => 'form-control', 'id' => 'password', 'autocomplete' => 'off']) }}
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Keep me logged in
                </label>
              </div>
              <a href="#" class="pull-right m-t-mini"><small>Forgot password?</small></a>
              <button type="submit" class="btn btn-info">Sign in</button>
              <div class="line line-dashed"></div>
              <a href="#" class="btn btn-facebook btn-block m-b-small"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
              <div class="line line-dashed"></div>
              <p class="text-muted text-center"><small>Do not have an account?</small></p>
              <a href="{{URL::route('registration')}}" class="btn btn-white btn-block">Create an account</a>
              {{ Form::close() }}
          </section>
        </div>
      </div>
    </div>
  </section>
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
  <!-- / footer -->
	<script src="/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/js/bootstrap.js"></script>
  <!-- app -->
  <script src="/js/app.js"></script>
  <script src="/js/app.plugin.js"></script>
  <script src="/js/app.data.js"></script>
</body>
</html>