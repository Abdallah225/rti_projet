<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Material Admin</title>

	<!-- Vendor CSS -->
	<link href="<?php echo vendor_url('bower_components/animate.css/animate.min.css') ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/google-material-color/dist/palette.css') ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo vendor_url('bower_components/bootstrap-sweetalert/lib/sweet-alert.css'); ?>" rel="stylesheet">
	<!-- CSS -->
	<link href="<?php echo css_url('app.min.1'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('app.min.2'); ?>" rel="stylesheet">
</head>

<body>
<div class="login" data-lbg="teal">
	<!-- Login -->
	<div class="l-block toggled" id="l-login">
		<div class="lb-header palette-Teal bg">
			<i class="zmdi zmdi-account-circle"></i>
			Bienvenue , sur votre interface de gestion
		</div>

		<div class="lb-body">
			<div class="form-group fg-float">
				<div class="fg-line">
					<input type="text" class="input-sm form-control fg-input " id="sai_login">
					<label class="fg-label">Login</label>
				</div>
			</div>

			<div class="form-group fg-float">
				<div class="fg-line">
					<input type="password" class="input-sm form-control fg-input" id="sai_mdp">
					<label class="fg-label">Mot de passe</label>
				</div>
			</div>

			<button class="btn palette-Teal bg" id="btn_cnx">Connexion</button>
			<div class="preloader pl-sm">
				<svg class="pl-circular" viewBox="25 25 50 50">
					<circle class="plc-path" cx="50" cy="50" r="20"></circle>
				</svg>
			</div>

		</div>
	</div>

	<!-- Register -->


	<!-- Forgot Password -->

</div>

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
	<h1 class="c-white">Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="img/browsers/chrome.png" alt="">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="img/browsers/firefox.png" alt="">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="img/browsers/opera.png" alt="">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="img/browsers/safari.png" alt="">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="img/browsers/ie.png" alt="">
					<div>IE (New)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript Libraries -->
<script src="<?php echo vendor_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/Waves/dist/waves.min.js'); ?>"></script>
<script src="<?php echo vendor_url('bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js'); ?>"></script>
<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="<?php echo vendor_url('bower_components/jquery-placeholder/jquery.placeholder.min.js'); ?>"></script>
<![endif]-->

<script src="<?php echo js_url('functions.js'); ?>"></script>

<script>

	$.getJSON('http://ipinfo.io', function(data){
		setCookie('data-ip',JSON.stringify(data),2);
		//console.log(data);
	});




	$('.preloader').hide();
	$("#btn_cnx").click(function(){

		var user = $('#sai_login').val();
		var pwd = $('#sai_mdp').val();
var ipdata = getCookie('data-ip');
		ipdata = JSON.parse(ipdata);
console.log(ipdata);

		if(user ==='' || pwd ==='')
		{

			toast('Veuillez renseigner vos identifiants','warning')
			return 0;
		}


		var login = {
			user:user,
			pass:pwd,
			nav_info:navigator.userAgent,
			ip:ipdata.ip


		};
		$('.preloader').show();
		$.ajax({
			url: '<?php echo site_url(); ?>/Manager/login',
			type: 'post',
			dataType: 'json',
			data: JSON.stringify(login),
			headers: {
				"Auth-Key": 'Weenbuzz@2016+',   //If your header name has spaces or any other char not appropriate
				"Client-Service": 'P001',
				"Accept": "application/json; charset=utf-8",
				"Content-Type": "application/json; charset=utf-8"
				//for object property name, use quoted notation shown in second
			},
			success: function (data) {

				var obj = data;


				if (obj.message.status===200 ) {
					$('.preloader').show();

					$('#sai_mdp').val('');
					$('#sai_mdp').val('');
					setCookie("data-user-secure",JSON.stringify(data.message),1);
					toast('Connexion éffectué avec succès', 'success');
					window.setTimeout(function(){

						window.location.href='<?php echo site_url(); ?>/Manager/dashoard';

					}, 2000);
				}

				else {
					$('.preloader').hide();
					toast(obj.message.message, 'error');
				}


			},
			error: function (xhr, status, error) {
				$("#load").hide();
				toast('Erreur d accèes réseau veuillez rééssayer', 'error');
			}

		});


	});
</script>


</body>
</html>
