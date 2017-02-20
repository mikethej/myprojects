<body>
    <section id="contact-page">
        <div class="container">
            <div class="center">
                <br>
                <br>
                <h2>Contacte-nos</h2>
                <p class="lead">Qualquer dúvida que tenha não hesite em contactar-nos.</p>
                <?php echo index_page(); ?>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url('index.php/Welcome/contact_us');?>">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input id="box" type="text" name="name" value="" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input id="box" type="email" name="email" value="" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Contacto Telefónico:</label>
                            <input id="box" type="text" name="telefone" value="" class="form-control">
                        </div>                       
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Assunto:</label>
                            <input id="box" type="text" value="" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Mensagem:</label>
                            <textarea id="box" name="message" value="" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Enviar mensagem</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
     
    <section id="bottom">
            <div class="row">
               <div class="col-md-5 contact-info text-left">
                <div class="title">
                    <h3>Contactos de emergência</h3>
                </div>
                <div class="info-detail">
                    <ul><li><span>Saúde 24:</span> 808 24 24 24 </li></ul>
                    <ul><li><span>Número de emergência nacional:</span> 112 </li></ul>
                    <ul><li><span>Linha de Emergência Intoxicações:</span> 808 250 143</li></ul>
                    <ul><li><span>Cruz Vermelha (Ambulâncias):</span>219 421 111</li></ul>
                    <ul><li><span>Cruz Vermelha (Hospitais):</span> 217 714 700</li></ul>
                    <ul><li><span>Bombeiros (Emergência):</span> 213 422 222</li></ul>
                </div>
                </div>
                        <div id="telefone" class="pull-left">
                            <br>
                            <img class="img-responsive" src="<?php echo base_url('images/services/contatoemerg.png');?>">
                        </div>


            </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; Portal da Saúde. Direitos Reservados.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</body>
</html>