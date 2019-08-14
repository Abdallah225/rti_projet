<link rel="stylesheet" href="<?php echo css_url('slider'); ?>">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133843834-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133843834-1');
</script>

<style type="text/css">
	#main {
		min-height: calc(100vh - 1px);
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
											<div class="slider">


												<div id="grid-scroll" class="mosaic-programs scrollable-content">
													<div class="mosaic__spit">
															<!--Block Mosaic -->
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
</div>

<script>


	$.getJSON("http://www.rtiplay.ci/Emission/bindex/1/0/0", function(data){


var ch="";
var k=0;
var t=0;
var chcas1='';
var tautrecas = '';
var mosaic__tile='';
var toutcas='';
var z = 0;

		for (i = 0; i < data.data.length; i++) {
			z++;

			ch +='<div class="mosaic__bloc"><div class="mosaic__tile mosaic__tile--large"><a class="tile tile--16-9 tile--large" href="#">' +
				'<div class="tile__image"><img class="tile__thumb" alt="'+data.data[i].r_nom+'" src="<?php echo site_url(); ?>/Miniature/300/500/'+data.data[i].r_image+'.jpeg" ' +
				'sizes="(min-width: 4096px) 1120px, (min-width: 2048px) 800px, (min-width: 1024px) 592px, 480px">' +
				'<div class="tile__service"><span style="min-height:3px" class="icon-service icon-service-m6replay_s tile__service-logo"' +
				' title="M6"></span></div></div><div class="tile__label"><div class="tile__title">'+data.data[i].r_nom+'</div>' +
				'<div class="tile__subtitle"><span>'+data.data[i].r_videos+' vidéos</span></div></div><div class="tile__polaroid"></div></a></div></div>';

			if(z===3)
			{
				chcas1 = ch;
				$('.mosaic__spit').append(chcas1);
			}
			if(z>3)
			{

		mosaic__tile+='<div class="mosaic__tile"><a class="tile tile--16-9" href="#"><div class="tile__image">' +
	'<img class="tile__thumb" alt="'+data.data[i].r_nom+'" src="<?php echo site_url(); ?>/Miniature/300/500/'+data.data[i].r_image+'.jpeg" srcset="<?php echo site_url(); ?>/Miniature/300/500/'+data.data[i].r_image+'.jpeg"' +
	' sizes="(min-width: 4096px) 592px, (min-width: 2048px) 400px, (min-width: 1024px) 320px, 272px">' +
	'<div class="tile__service"><span style="min-height:3px" class="icon-service icon-service-w9replay_s tile__service-logo"' +
	' title="W9"></span></div></div><div class="tile__label"><div class="tile__title">'+data.data[i].r_nom+'</div>' +
	'<div class="tile__subtitle"><span>'+data.data[i].r_videos+' vidéos</span></div></div><div class="tile__polaroid"></div></a></div>';





				if((z % 3)===0)
				{
					k++;
				tautrecas+='<div class="mosaic__page">\n' +
					'\t<div class="mosaic__bloc">\n' +
					mosaic__tile
					+'\t</div>\n' +
					'</div>';
					toutcas+=tautrecas;
				////////console.log(tautrecas);
					//$('.petit_block').append(tautrecas);
					//$(".mosaic__spit").insertAfter(tautrecas);
					tautrecas ='';
					mosaic__tile='';
					//alert(k);
				}
			}






		}
		//console.log(toutcas);
		$('.mosaic__spit').after(toutcas);


	});




</script>
