<!DOCTYPE html>
<html lang="pt"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Portal de Saúde</title>


        <!-- css -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/fancybox/jquery.fancybox.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('css/flexslider.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet" />


        <!-- Theme skin -->
        <link href="<?php echo base_url('skins/default.css'); ?>" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/animate.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/prettyPhoto.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/responsive.css'); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src
            ="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="<?php echo base_url('images/ico/favicon.ico'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('images/ico/apple-touch-icon-144-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('images/ico/apple-touch-icon-114-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('images/ico/apple-touch-icon-72-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('images/ico/apple-touch-icon-57-precomposed.png'); ?>">

    </head><!--/head-->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(index_page()); ?>"><img src="<?php echo base_url('images/logo.png'); ?>" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li id="inicio"><a href="<?php echo site_url(index_page()); ?>">Início</a></li>
                    <li id="about1"><a href="<?php echo base_url('index.php/Welcome/about'); ?>">SNS</a></li>
                    <li id="services1">
                        <a href="<?php echo base_url('index.php/Welcome/services'); ?>">Serviços</a>
                       
                    </li>
                    <li id="contact1"><a href="<?php echo site_url('index.php/Welcome/contact') ?>">Contactos</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Entrar <strong class="caret"></strong></a>
                        <div class="dropdown-menu" style="padding: 10px; padding-bottom: 10px;">
                            <form method="post" action="<?php echo site_url('index.php/Autenticacao/login'); ?>" accept-charset="UTF-8">
                                <input  class="tamanho" type="text" placeholder="Nº de Utente" id="username" value="" name="username" required="">
                                <input  class="tamanho" type="password" placeholder="Palavra-passe" id="password" value="" name="password" required="">
                                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                <label class="string optional" for="user_remember_me">Lembrar-me</label>

                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" href="<?php echo site_url('index.php/Autenticacao/login'); ?>" value="Entrar">          
                                <a href="<?php echo site_url('index.php/Autenticacao/registo'); ?>"><input class="btn btn-primary btn-block" type="button" value="Registar" ></a>
                                <a href="recuperar.html" style="font-size:13px;">Esqueceu a palavra-passe?</a>


                            </form>
                        </div>
                    </li>                    
                    <li> 
                    </li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.prettyPhoto.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.isotope.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/main.js'); ?>"></script>
    <script src="<?php echo base_url('js/wow.min.js'); ?>"></script>


    <!-- Google Maps Script -->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
        
        var url = window.location.href;
        
        var divActivo = url.split('/').pop();
        
        if(divActivo == '') {
            $('#inicio').addClass('active');
        } else {
            $('#' + divActivo + '1').addClass('active');
        }
        
   
    </script>
        




