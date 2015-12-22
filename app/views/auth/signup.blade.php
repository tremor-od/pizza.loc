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
              Sign up
            </header>
            {{ Form::open(array('class' => 'panel-body', 'action' => 'AuthController@registration')) }}
              <div class="block">
                <label class="control-label">Display name</label>
                <input type="text" placeholder="eg. Your name or company" class="form-control">
              </div>
              <div class="block">
                <label class="control-label">Your email address</label>
                {{ Form::email('email', null, ['placeholder' => 'test@example.com', 'class' => 'form-control', 'id' => 'email']) }}
              </div>
              <div class="block">
                <label class="control-label">Type a password</label>
                  {{ Form::text('password', null, ['placeholder' => 'Password','class' => 'form-control', 'id' => 'password', 'autocomplete' => 'off']) }}
              </div>
              {{--<div class="checkbox">--}}
                {{--<label>--}}
                  {{--<input type="checkbox"> Agree the <a href="#">terms and policy</a>--}}
                {{--</label>--}}
              {{--</div>--}}
              <button type="submit" class="btn btn-info">Sign up</button>
              <div class="line line-dashed"></div>
              <div class="row">
                <div class="col-sm-6 text-center">
                   <a href="#" class="btn btn-facebook btn-circle btn-sm"><i class="fa fa-facebook"></i>Sign up with Facebook</a>
                </div>
                <div class="col-sm-6 text-center">
                  <a href="#" class="btn btn-twitter btn-circle btn-sm"><i class="fa fa-twitter"></i>Sign up with Twitter</a>
                </div>
              </div>
              <div class="line line-dashed"></div>
              <p class="text-muted text-center"><small>Already have an account?</small></p>
              <a href="{{URL::route('login')}}" class="btn btn-white btn-block">Sign in</a>
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