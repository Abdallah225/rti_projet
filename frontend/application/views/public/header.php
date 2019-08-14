<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php  if(isset($metas)) echo $metas; ?>">
	<meta name="keywords" content="<?php echo $this->config->item('ws_site'); ?>,<?php  if(isset($metas)) echo str_replace(' ',',',$metas); ?>">
	<meta name="author" content="<?php echo $this->config->item('ws_site'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo img_url('icons/apple-icon-57x57.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo img_url('icons/apple-icon-60x60.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo img_url('icons/apple-icon-72x72.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo img_url('icons/apple-icon-76x76.png'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo img_url('icons/apple-icon-114x114.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo img_url('icons/apple-icon-120x120.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo img_url('icons/apple-icon-144x144.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo img_url('icons/apple-icon-152x152.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo img_url('icons/apple-icon-180x180.png'); ?>">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo img_url('icons/android-icon-192x192.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo img_url('icons/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo img_url('icons/favicon-96x96.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo img_url('icons/favicon-16x16.png'); ?>">
	<link rel="manifest" href="<?php echo img_url('icons/manifest.json'); ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo img_url('icons/ms-icon-144x144.png'); ?>">
	<meta name="theme-color" content="#000000">



	<title><?php echo $this->config->item('ws_site'); ?>:::<?php  if(isset($title)) echo $title; ?></title>

	<!-- Vendor CSS -->
	<link href="<?php echo vendor_url('bower_components/fullcalendar/dist/fullcalendar.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/animate.css/animate.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/bootstrap-sweetalert/lib/sweet-alert.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('lightgalerie/css/lightgallery.css'); ?>" rel="stylesheet">

	<link href="<?php echo vendor_url('bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo vendor_url('bower_components/google-material-color/dist/palette.css'); ?>" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->


	<!-- Optional theme -->

	<!-- CSS -->
	<link href="<?php echo css_url('app.min.1'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('app.min.2'); ?>" rel="stylesheet">
    <link href="<?php echo css_url('custom'); ?>" rel="stylesheet">
    <link href="<?php echo css_url('custom2'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('horizontal'); ?>" rel="stylesheet">
	<script src="<?php echo vendor_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<script src="<?php echo vendor_url('lightgalerie/js/lightgallery.js'); ?>"></script>

<style>
	font-family: 'Raleway', sans-serif;
</style>
</head>
<body data-ma-header="Black">
<?php

$menu='';
$ci =&get_instance();
$ci->load->model('Thematique_model');
$retour = $ci->Thematique_model->getBystatus(1);
$menu.='<li data-menu="-1"><a href="'. site_url().'/Chaine">DIRECT <img src="'.img_url('live.png').'" style="border-radius: 5px;"></a></li>';
$menu.='<li data-menu="0"><a href="'.site_url().'">ACCUEIL</a></li>';
for( $i= 0 ; $i <= count($retour)-1 ; $i++ )
{
	//echo '<option ' . ($i == 1 ? 'selected=\'selected\'' : '') . ' value="' . $i . '" >' . $i . '</option>';
	$menu .="<li data-menu=".$retour[$i]->r_i."><a href='".site_url()."/Emission-".$retour[$i]->r_i."'>".$retour[$i]->r_libelle."</a></li>";
}

if($this->session->i !=0)
{
    $menu .=	'<div class="float-left"><a href="'.site_url().'/Users/logout#"><img class="power-button" src="'.img_url('power-button.png').'"></a></div>';
    $menu .=	'<div class="dropdown float-left"><img class="dropbtn" src="'.img_url('user.svg').'"><span class="c-white">'.$this->session->nom_prenom.'</span><div class="dropdown-content">';
    $menu .=	'<a href="#profilemodal" data-toggle="modal">Mon espace</a></div></div>';

}
else
{
    $menu .=	'<li><a href="#modalNarrower" data-content="Connexion" data-toggle="modal" class="btn palette-Pink-700 bg btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-pin-account"></i></a></li>';
}

$menu .= '<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><div id="custom-search-input"><div class="input-group col-md-12"><input type="text" class="form-control input-xs recherche" placeholder="Recherche">';
$menu .='<span class="input-group-btn"><button class="btn btn-info btn-lg" type="button"><i class="glyphicon glyphicon-search"></i>';
$menu .=	' </button></span></div></div></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>';

?>




<nav class="navbar navbar-default transheader m-b-0">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-header">
				<a href="<?php echo site_url(); ?>"><img class="logo" src="<?php echo img_url('logo_rti_media.png'); ?>" style="" alt=""></a>
			</div>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


			<ul class="nav navbar-nav navbar-right" style="margin-top:25px;">
				<?php echo $menu; ?>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<script>

	<?php
	$datamenu='';
	if(!isset($thematic))
		{
			$datamenu =0;
		}
		else
		{
			$datamenu = $thematic;
		}
		?>

	$( '[data-menu="<?php echo $datamenu; ?>"]' ).addClass('activer');


</script>
<section id="main">
	<div class="modal fade" id="modalNarrower" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content login-popup">
                <!--?php if (!isset($secure)) {?-->
                    <button type="button" class="btn btn-link closebtn" data-dismiss="modal" id="dismiss">&times;</button>
                <!--?php } else {?-->
                <!--a href="javascript:history.back()" type="button" class="btn btn-link closebtn">Retour </a-->
                <!--?php } ?#-->
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-7 float-right">
							<div role="tabpanel" class="tab">
								<ul class="tab-nav" role="tablist">
									<li class="active"><a href="#home9" aria-controls="home9" role="tab" data-toggle="tab">Connexion</a></li>
									<li role="presentation"><a href="#profile9" aria-controls="profile9" role="tab" data-toggle="tab">Inscription</a></li>
								</ul>

								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active animated fadeInRight in" id="home9">
										<div class="form-group">
											<div class="fg-line">
												<input type="text" id="login_cnx" class="form-control" placeholder="Adresse électronique">
											</div>
										</div>
										<div class="form-group">
											<div class="fg-line">
												<input type="password" id="password_cnx" class="form-control" placeholder="Mot de passe">
											</div>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">
												<i class="input-helper"></i>
												Se souvenir de moi
											</label>
										</div>
										<button class="btn btn-secure waves-effect btn-login">Connexion</button>
										<a href="#">Mot de passe oublié </a>

										<!--p>
										<div class="input-group">
											<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
											<div class="fg-line">
												<input type="text" class="form-control" placeholder="Addresse électronique">
											</div>
										</--div>
										<button class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-forward"></i> Récuperer mon mot de passe</button>
										</p-->

										<div class="preloader pls-red prelod-login">
											<svg class="pl-circular" viewBox="25 25 50 50">
												<circle class="plc-path" cx="50" cy="50" r="20"></circle>
											</svg>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane animated fadeInRight" id="profile9">
										<div class="form-group">
											<div class="fg-line">
												<input type="text" id="nom_prenom_register" class="form-control" placeholder="Nom & prénoms">
											</div>
										</div>

										<div class="form-group">
											<div class="fg-line">
												<input type="email" id="email_register" class="form-control" placeholder="Adresse électronique">
											</div>
										</div>
										<div class="form-group">
											<div class="fg-line">
												<input type="password" id="mdp_register" class="form-control" placeholder="Mot de passe">
											</div>
										</div>
										<div class="form-group">
											<div class="fg-line">
												<input type="password" id="pwd_rep" class="form-control" placeholder="Confirmer">
											</div>
										</div>
										<button class="btn btn-secure waves-effect btn-register">Inscription</button>
										<div class="preloader pls-red prelod-register">
											<svg class="pl-circular" viewBox="25 25 50 50">
												<circle class="plc-path" cx="50" cy="50" r="20"></circle>
											</svg>
										</div>
									</div>

								</div>
							</div>
						</div>


					</div>

				</div>
				<div class="modal-footer">
                    <span>Accéder via: </span>
                    <a href="#" type="button" ><img src=<?php echo img_url('fb.png'); ?> style="height:50px;width:50px;"> </a>
                    <a href="#" type="button" ><img src=<?php echo img_url('gp.png'); ?> style="height:50px;width:50px;"> </a>
				</div>
			</div>
		</div>
	</div>
