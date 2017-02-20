<body>
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" id="frase">Comece já a utilizar os nossos serviços!</h1>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo site_url('index.php/Autenticacao/registo'); ?>">Registe-se aqui</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url('images/slider/bg2.jpg'); ?>">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" id="frase">Comece já a utilizar os nossos serviços!</h1>
                                    <a class="btn-slide animation animated-item-3" href="registar.html">Registe-se aqui</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" id="frase">Comece já a utilizar os nossos serviços!</h1>
                                    <a class="btn-slide animation animated-item-3" href="registar.html">Registe-se aqui</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->




    <section class="about text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail clearfix">
                        <div class="about-img">
                            <img class="img-responsive" src="img/item1.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div id="pentagono" class="pentagon-text">
                                <h1>S</h1>
                            </div>
                            <a target="_blank" href="sns.html"><h3> SNS </h3></a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="img/item2.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div id="pentagono" class="pentagon-text">
                                <h1>U</h1>
                            </div>

                            <a target="" href="#"><h3> Utente </h3></a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="img/item3.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div id="pentagono" class="pentagon-text">
                                <h1>E</h1>
                            </div>
                            <a target="" href="#"><h3> Estabelecimentos </h3></a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </section><!-- end of about section -->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>&copy; Portal da Saúde. Direitos Reservados.</p>
                </div>

            </div>
        </div>
    </footer><!--/#footer-->
</body>
</html>