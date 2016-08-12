<!DOCTYPE html>
<html lang="en">
  <head>
  	<base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php echo get_header(); ?>
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/bootstrap.css" media="screen" />
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <script language="javascript">
      var loaded = false;
      function SetLoaded() { loaded = true; }
      window.onload = SetLoaded;
    </script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
              <ul class="nav navbar-nav">
                <li class="fa fa-film mright5 logo"></li>
                <li>
                  <h1 class="title nomargin"><?php echo $config->sitename?></h1><span class="description"><?php echo $config->sitedescription?></span>
                </li>
              </ul>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li<?php if (is_popular()) {
    echo ' class="active"';
} ?>>
                <a href="popular">Popular</a>
              </li> 
              <li<?php if (is_ontheair()) {
    echo ' class="active"';
} ?>>
                <a href="on-the-air">On The Air</a>
              </li> 
              <li<?php if (is_airingtoday()) {
    echo ' class="active"';
} ?>>
                <a href="airing-today">Airing Today</a>
              </li> 
              <li><a href="/search/series">Search</a></li>
            </ul>
            <!-- <form class="navbar-form navbar-right" role="search" method="get" action="/">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="q" placeholder="Input keywords ...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                  </span>
                </div>
              </div>
            </form> -->
            <span class="navbar-form navbar-right"><a class="btn btn-warning" href="/register/free">Register Free Account</a></span>
          </div>
        </div>
      </div>
    </nav>