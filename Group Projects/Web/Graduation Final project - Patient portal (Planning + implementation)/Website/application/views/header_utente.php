<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Portal do Utente</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo site_url('assets/css/animate.min.css');?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo site_url('assets/css/light-bootstrap-dashboard.css');?>" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo site_url('assets/css/demo.css');?>" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="<?php echo base_url('/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo base_url('images/ico/favicon.ico');?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('images/ico/apple-touch-icon-144-precomposed.png');?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('images/ico/apple-touch-icon-114-precomposed.png');?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('images/ico/apple-touch-icon-72-precomposed.png');?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('images/ico/apple-touch-icon-57-precomposed.png');?>">

    
    
    <!--   Core JS Files   -->
    <script src="<?php echo site_url('assets/js/jquery-1.10.2.js');?>" type="text/javascript"></script>
	<script src="<?php echo site_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo site_url('assets/js/bootstrap-checkbox-radio-switch.js');?>"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo site_url('assets/js/chartist.min.js');?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo site_url('assets/js/bootstrap-notify.js');?>"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo site_url('assets/js/light-bootstrap-dashboard.js');?>"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo site_url('assets/js/demo.js');?>"></script>
        
</head>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url('index.php/Portal_Utente/');?>" class="simple-text">
                    Portal do Utente
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url('index.php/Portal_Utente/');?>">
                        <i class="fa fa-arrow-circle-left"></i>
                        <p>Início</p>
                    </a>
                </li>
                <li data-toggle="collapse" data-target="#divMeusDados">
                    <a href="#">
                        <i class="fa fa-heart"></i>
                        <p>Os meus dados</p>
                    </a>
                        <div id="divMeusDados" class="collapse sidebar-drop">
                                <ul >
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/contactos_emergencia');?>">Contactos emergência</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/autorizacoes');?>">Autorizações</a></li>
                                </ul>
                        </div>
                </li>
                <li data-toggle="collapse" data-target="#divMedicoes">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <p>Medições</p>
                    </a>
                        <div id="divMedicoes" class="collapse sidebar-drop">
                                <ul >
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/peso_altura');?>">Peso/Altura</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/glicemia');?>">Glicémia</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/tensao_arterial');?>">Tensão Arterial</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/colesterol');?>">Colesterol</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/trigliceridos');?>">Triglicéridos</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/saturacao_oxigenio');?>">Saturação Oxigénio</a></li>
                                        <li ><a href="<?php echo base_url('index.php/Portal_Utente/inr');?>">INR</a></li>  
                                </ul>
                        </div>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/Portal_Utente/isencao_taxas");?>">
                        <i class="fa fa-file-text"></i>
                        <p>Taxas Moderadoras</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/Portal_Utente/renovar_medicacao");?>">
                       <i class="fa fa-medkit"></i>
                        <p>Renovar Medicação</p>
                    </a>    
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/Portal_Utente/marcar_consultas');?>">
                        <i class="fa fa-calendar"></i>
                        <p>Consultas médicas</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/Portal_Utente/registos_clinicos');?>">
                        <i class="fa fa-user-md"></i>
                        <p>Registos Clínicos</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                             <a><?php echo $this->Mymodel->get_user_nome_completo(); ?></a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <b class="caret"></b>
                            </a>    
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('index.php/Portal_Utente/editar_perfil');?>">Configurações</a></li>
                                <li><a href="<?php echo base_url('index.php/Autenticacao/logout');?>">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </footer>