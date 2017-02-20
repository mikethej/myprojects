<html>
    
<body>
    <section class="pricing-page">
        <div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary"><p id="titulo_auto">Registo</p></a>
        </div>
    </div>
</div>
            <br>
            <br>
            <br>
<form role="form" action="registo" method="post" accept-charset="utf-8" >
    <div class="row setup-content" id="step-1">
    
        <div class="col-xs-12">
            <div class="col-md-12">
                                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_name">Nome Completo:</label> 
                    <div class="col-md-5">
                        <input  id="box"  id="service_name" name="nome_completo" type="text" value="" placeholder="" class="form-control input-md" required>
                        <?php echo form_error('nome'); ?>
                    </div>
                </div>
                    <br>
                    <br>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_version">Número de Utente:</label>  
                    <div class="col-md-5">
                        <input id="box" id="service_version" name="username" type="number" minlength="9" value="" placeholder="" class="form-control input- md">
                        <?php echo form_error('username'); ?>
                    </div>
                </div>
                    <br>
                    <br>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_architecture">Data de Nascimento:</label>
                    <div class="col-md-5">
                        <input id="box"  id="data" name="data_nascimento" type="date" value="" class="form-control input-md">
                        <?php echo form_error('data_nascimento');?>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="emailType">Email:</label>  
                        <div class="col-md-5">
                            <input id="box" id="emailType" name="email" type="text" value="" placeholder="" class="form-control input-md">
                            <?php echo form_error('email'); ?>
                        </div>
                </div>
                    <br>
                    <br>
                <!-- Text input-->
                <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Palavra-passe:</label>  
                        <div class="col-md-5">
                            <input id="box"  id="password" name="password" type="password" value="" class="form-control input-md">
                            <?php echo form_error('password'); ?>
                        </div>
                </div>
                    <br>
                    <br>
                 <div class="form-group">
                      <label class="col-md-4 control-label" for="password_conf">Confirmar palavra-passe:</label>  
                        <div class="col-md-5">
                            <input  id="box" id="password_conf" name="confirm_password" type="password" value="" class="form-control input-md">
                            <?php echo form_error('confirm_password'); ?>
                        </div>
                </div>

                 <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Registar</button>
</form>
            </div>
            <br>
        </div>
    </div>  
</div>
</div><!--/container-->
        <br>
        <br>
</section><!--/pricing-page-->

    

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>&copy; Portal da Saúde. Direitos Reservados.</p>
                    </div>
                
                </div>
              </div>
    </footer><!--/#footer-->

    <script src="<?php base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php base_url('js/jquery.prettyPhoto.js');?>"></script>
    <script src="<?php base_url('js/jquery.isotope.min.js');?>"></script>
    <script src="<?php base_url('js/main.js');?>"></script>
    <script src="<?php base_url('js/wow.min.js');?>"></script>
    <script src="<?php base_url('js/jquery.js');?>"></script>
    <script src="<?php base_url('js/jquery.easing.1.3.js');?>"></script>
    <script src="<?php base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php base_url('js/jquery.fancybox.pack.js');?>"></script>
    <script src="<?php base_url('js/jquery.fancybox-media.js');?>"></script>
    <script src="<?php base_url('js/google-code-prettify/prettify.js');?>"></script>
    <script src="<?php base_url('js/portfolio/jquery.quicksand.js');?>"></script>
    <script src="<?php base_url('js/portfolio/setting.js');?>"></script>
    <script src="<?php base_url('js/jquery.flexslider.js');?>"></script>
    <script src="<?php base_url('js/animate.js');?>"></script>
    <script src="<?php base_url('js/custom.js');?>"></script>
    <script src="<?php base_url('js/jquery.fancybox.js');?>"></script>
</body>
</html>