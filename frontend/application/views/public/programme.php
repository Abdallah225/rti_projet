<link rel="stylesheet" href="<?php echo css_url('slider'); ?>">


<div class="epg-page__title"><h1>Grille des programmes </h1></div>
<div>
	<a href="javascript:history.back();" role="button" class="go-back"></a>
</div>
<div class="app app--full-features app--6play app--m6web row">
<!--	<h2 class="tvshow-bloc__title">Vous aimerez aussi ...</h2>-->
	<button
		class="btn  btn-lg waves-effect slider-arrow slider-arrow--left slider-arrow--big likealso--left"
		side="left">
		<svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
			<path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44"
				  transform="translate(120, 0) scale(-1, 1)"></path>
		</svg>
	</button>


	<button
		class="btn btn-lg waves-effect slider-arrow slider-arrow--right slider-arrow--big likealso--right"
		side="right">
		<svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
			<path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44"></path>
		</svg>
	</button>
	<section class="card--contener cardlikethat row" id="video-gallery" style="padding: 10px 50px;">
		<ul class="clearfix programmes">

		</ul>
	</section>

</div>

<style>

	.slider-arrow {

		margin-top: 25px;
	}
	.go-back {
		position: absolute;
		top: -390px;
		left: 15px;
		height: 29px;
		width: 29px;
		white-space: nowrap;
		cursor: pointer;
		z-index: 10;
		overflow: hidden;
		-webkit-transition: width .1s ease-in-out;
		transition: width .1s ease-in-out;
		background-image: url(<?php echo img_url('return.svg'); ?>);
		background-size: 29px 29px;
		background-repeat: no-repeat;

	}
	.slider-arrow--big {
		width: 60px;
		/* height: 130px; */
		/*top: calc(50% - 60px);*/
	}

</style>

<script>


	var url ='';


	url = '<?php echo site_url(); ?>/Programme/aindex/3';

	var $methods = $('.cardlikethat');
	$.getJSON(url, function(result){

		$methods.html('');
		$.each(result, function(i, field){
			var uimg ='<?php echo img_url('animes1.jpg'); ?>';
			var uivid ='';


			var string =field.r_synopsys;

			//var li2 = '<div class="card--content"></div>';


			var li ='<div class="card--content slider__item slider__item--s" data-iframe="true" id="open-website" data-src="'+uivid+'" ><a class="tile tile--16-9" href="#"><div class="tile__image border"><img class="tile__thumb"\n' +
				' alt="'+field.r_titre+'"\n' +
				' src="'+uimg+'"\n' +
				' srcset="'+uimg+'"\n' +
				'<div class="tile__detail"><h2 class="tile__name m-0 p-5"\n' +
				'title="'+field.r_description+'">'+string+'</div></a></div></div>';
			var lo ='\t<li class="epg-program-tile card--content slider__item slider__item--s"><div class="epg-program-tile__border"></div>\n'+
'<div class="epg-program-tile__header"><div class="epg-program-tile__hour">'+field.r_heure+'</div>\n'+
'<img class="epg-program-tile__cover" alt="Image programme" src="<?php echo img_url('animes1.jpg'); ?>">\n'+
'</div><div class="epg-program-tile__content"><span class="epg-program-tile__name">'+field.r_titre+'</span>\n'+
'<div class="epg-program-tile__info">'+field.r_synopsys+'</div>\n'+
'</li>';

			$methods.append(lo);

			/*rafraichir le slide a chaque appel ajax*/

			$methods.lightGallery();
			$methods.data('lightGallery').destroy(false);

			/*rafraichir le slide a chaque appel ajax*/

		});
		$methods.lightGallery();



	});
	/* CLICK SCROLL FUNCTIONS JQUERY */
	$('.likealso--left').click(function() {
		event.preventDefault();
		$('.cardlikethat').animate({
			scrollLeft: "-=775px"
		}, "slow");
	});

	$('.likealso--right').click(function() {
		event.preventDefault();
		$('.cardlikethat').animate({
			scrollLeft: "+=775px"
		}, "slow");
	});
	/* CLICK SCROLL FUNCTIONS JQUERY */
</script>
