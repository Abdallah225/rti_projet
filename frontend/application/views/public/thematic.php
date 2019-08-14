<link rel="stylesheet" href="<?php echo css_url('slider'); ?>">
<style>
	.slider-arrow--big {
		/* width: 60px; */
		/* height: 130px; */
		top: calc(50% - 60px);
	}
</style>



<div class="app app--full-features app--6play app--m6web">
	<div class="app__content">
		<div>
			<div>
				<div>
					<div class="app__wrapper folder">
						<div>
							<div class="app-content app-content--6play">
								<div class="service">
									<div class="folderpage folderpage--humour">
										<div>
											<div class="slider"  style='background-image: url(<?php echo img_url('c-3.jpg'); ?>); height: 100%; background-position: center;background-repeat: no-repeat;background-size: cover;'>

												<button
													class="btn  btn-lg waves-effect slider-arrow slider-arrow--left slider-arrow--big"
													side="left">
													<svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44" transform="translate(120, 0) scale(-1, 1)"></path></svg>
												</button>


												<button
													class="btn btn-lg waves-effect slider-arrow slider-arrow--right slider-arrow--big"
													side="right">
													<svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44"></path></svg>
												</button>

												<div id="grid-scroll" class="mosaic-programs scrollable-content mosaic-bloc-padding" style=" background: rgba(0, 0, 0, 0.7);">
													<div class="mosaic__spit">
														<!--Block Mosaic -->
													</div>


												</div>

												<div class="fin-slide">

												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function slugify(string) {
		var a = 'àáäâãåèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;'
		var b = 'aaaaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------'
		var p = new RegExp(a.split('').join('|'), 'g')
		return string.toString().toLowerCase()
			.replace(/\s+/g, '-') // Replace spaces with
			.replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
	.replace(/&/g, '-and-') // Replace & with ‘and’
			.replace(/[^\w\-]+/g, '') // Remove all non-word characters
			.replace(/\-\-+/g, '-') // Replace multiple — with single -
			.replace(/^-+/, '') // Trim — from start of text .replace(/-+$/, '') // Trim — from end of text
	}

	$.getJSON("<?php echo site_url(); ?>/Emission/bindex/<?php echo $thematic; ?>/0/0", function (data) {


		var ch = "";
		var k = 0;
		var t = 0;
		var chcas1 = '';
		var tautrecas = '';
		var mosaic__tile = '';
		var toutcas = '';
		var z = 0;

		for (i = 0; i < data.data.length; i++) {
			z++;

			ch += '<div class="mosaic__bloc"><div class="mosaic__tile mosaic__tile--large"><a class="tile tile--16-9 tile--large" href="<?php echo site_url(); ?>/Emission/' + slugify(data.data[i].r_nom) + '/<?php if (isset($thematic)) echo $thematic; ?>-' + slugify(data.data[i].r_i) + '">' +
				'<div class="tile__image"><img class="tile__thumb" alt="' + data.data[i].r_nom + '" src="<?php echo site_url(); ?>/Miniature/300/500/' + data.data[i].r_image + '.jpeg" ' +
				'sizes="(min-width: 4096px) 1120px, (min-width: 2048px) 800px, (min-width: 1024px) 592px, 480px">' +
				'<div class="tile__service"><span style="min-height:3px" class="icon-service icon-service-m6replay_s tile__service-logo"' +
				' title="M6"></span></div></div><div class="tile__label"><div class="tile__title">' + data.data[i].r_nom + '</div>' +
				'<div class="tile__subtitle"><span>' + data.data[i].r_videos + ' vidéos | </span></div></div><div class="tile__polaroid"></div></a></div></div>';

			if (z === 4) {
				chcas1 = ch;
				$('.mosaic__spit').append(chcas1);
			}
			if (z > 4) {

				mosaic__tile += '<div class="mosaic__tile" id="'+z+'"><a class="tile tile--16-9" href="<?php echo site_url(); ?>/Emission/' + slugify(data.data[i].r_nom) + '/<?php if (isset($thematic)) echo $thematic; ?>-' + slugify(data.data[i].r_i) + '"><div class="tile__image">' +
					'<img class="tile__thumb" alt="' + data.data[i].r_nom + '" src="<?php echo site_url(); ?>/Miniature/300/500/' + data.data[i].r_image + '.jpeg" srcset="<?php echo site_url(); ?>/Miniature/300/500/' + data.data[i].r_image + '.jpeg"' +
					' sizes="(min-width: 4096px) 592px, (min-width: 2048px) 400px, (min-width: 1024px) 320px, 272px">' +
					'<div class="tile__service"><span style="min-height:3px" class="icon-service icon-service-w9replay_s tile__service-logo"' +
					' title="W9"></span></div></div><div class="tile__label"><div class="tile__title">' + data.data[i].r_nom + '</div>' +
					'<div class="tile__subtitle"><span>' + data.data[i].r_videos + ' vidéos</span></div></div><div class="tile__polaroid"></div></a></div>';


				if ((z % 4) === 0) {
					k++;
					tautrecas += '<div class="mosaic__page">\n' +
						'\t<div class="mosaic__bloc">\n' +
						mosaic__tile
						+ '\t</div>\n' +
						'</div>';
					toutcas += tautrecas;
					////////console.log(tautrecas);
					//$('.petit_block').append(tautrecas);
					//$(".mosaic__spit").insertAfter(tautrecas);
					tautrecas = '';
					mosaic__tile = '';
					//alert(k);
				}
			}


		}
		//console.log(toutcas);
		$('.mosaic__spit').after(toutcas);


	});

	/* CLICK SCROLL FUNCTIONS JQUERY */
	$('.slider-arrow--left').click(function() {
		event.preventDefault();
		$('#grid-scroll').animate({
			scrollLeft: "-=775px"
		}, "slow");
	});

	$('.slider-arrow--right').click(function() {
		event.preventDefault();
		$('#grid-scroll').animate({
			scrollLeft: "+=775px"
		}, "slow");
	});
	/* CLICK SCROLL FUNCTIONS JQUERY */


</script>


