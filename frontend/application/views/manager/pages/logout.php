<?php
unset($_SESSION['session']);
?>

<script>
	function setCookie(cname, cvalue, exdays)
	{
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	setCookie('data-user','',25);


	window.setTimeout(function(){

		window.location.href = '<?php echo site_url(); ?>/Manager';

	}, 3000);
</script>

<center>Déconnexion...</center>
