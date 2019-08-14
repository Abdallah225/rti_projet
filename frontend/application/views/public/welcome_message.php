<!-- REVOLUTION SLIDER STYLES -->
<link rel="stylesheet" href="<?php echo vendor_url('revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css'); ?>">
<link rel="stylesheet" href="<?php echo vendor_url('revolution/css/settings.css'); ?>" >
<link rel="stylesheet" href="<?php echo vendor_url('revolution/css/navigation.css'); ?>" >


<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="concept1">
	<!-- START REVOLUTION SLIDER 5.1.6 fullscreen mode -->
	<div id="rev_slider_4_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.1.6">
		<ul id="sliderOne">


<?php
			header("Access-Control-Allow-Origin: *");

for( $i= 0 ; $i <= count($slidercontent)-1 ; $i++ ) {

?>
	<li data-transition="fade" class="dark" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="1500" data-saveperformance="off">
		<!-- MAIN IMAGE assets/images/sliders/rev/slider2/2/slide-2-bg.jpg-->
		<img src="<?php echo site_url(); ?>/Miniature/600/1000/<?php echo $slidercontent[$i]->r_image; ?>"  alt="<?php echo $slidercontent[$i]->r_titre; ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-kenburns="on" data-duration="15000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 1000" data-bgparallax="10" class="rev-slidebg" data-no-retina>
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		 <h1 class="tp-caption uppercase heavy white tp-resizeme" style="font-size: 25px"
			id="slide-1491-layer-7"
			data-x="['right','right','left','right']" data-hoffset="['0','0','0','0']"
			data-y="['center','center','center','center']" data-voffset="['200','-50','-50','-20']"
			data-lineheight="['75','75','35','25']"
			data-width="none"
			data-height="none"
			data-whitespace="nowrap"
			data-transform_idle="o:1;"
			data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;"
			data-transform_out="opacity:0;s:300;s:300;"
			data-start="1000"
			data-splitin="chars"
			data-splitout="none"
			data-basealign="slide"
			data-responsive_offset="on"
			data-elementdelay="0.03"
			style="z-index: 8; white-space: nowrap; margin-right:30px;"><?php echo $slidercontent[$i]->r_titre; ?>
			</h1><!-- LAYER NR. 1 -->
			<h2 class="tp-caption uppercase heavy white tp-resizeme "
				id="slide-1491-layer-7"
				data-x="['right','right','left','right']" data-hoffset="['0','0','0','0']"
				data-y="['center','center','center','center']" data-voffset="['270','-50','-50','-50']"

				data-lineheight="['75','75','35','25']"
				data-width="none"
				data-height="none"
				data-whitespace="nowrap"
				data-transform_idle="o:1;"
				data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;"
				data-transform_out="opacity:0;s:300;s:300;"
				data-start="1500"
				data-splitin="chars"
				data-splitout="none"
				data-basealign="slide"
				data-responsive_offset="on"
				data-elementdelay="0.03"
				style="z-index: 8; white-space: nowrap; margin-right:30px;"><?php echo $slidercontent[$i]->r_sous_titre; ?>
			</h2>


			<?php if($slidercontent[$i]->r_url !='')

			{
			 ?>
			<!-- LAYER NR. 3 -->
			<a class="tp-caption main-bg rev-btn t-right"
			   id="slide-12-layer-18"
			   data-x="['right','right','right','right']" data-hoffset="['-140','0','0','0']"
			   data-y="['bottom','right','right','bottom']" data-voffset="['70','0','0','0']"
			   data-width="none"
			   data-height="none"
			   data-whitespace="nowrap"
			   data-transform_idle="o:1;"
			   data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;"
			   data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);"
			   data-transform_in="y:[50%];opacity:0;s:1000;e:Power2.easeInOut;"
			   data-transform_out="opacity:0;s:1000;e:Power3.easeIn;s:300;e:Power3.easeIn;"
			   data-start="2500"
			   data-splitin="none"
			   data-splitout="none"
			   data-responsive_offset="on"
			   data-responsive="off"
			   style="z-index: 13; font-size: 20px; line-height: 50px; font-weight: 500;padding:0 30px;border-radius:35px;" href="#">VOIR PLUS
			</a>
			<?php } ?>
		</h3>
	</li>
<?php
}
?>


		</ul>
		<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
	</div>

	<div class="fixed-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Contenu ICI -->
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Load JS plugins -->

<script type="text/javascript" src="<?php echo vendor_url('revolution/js/jquery.themepunch.tools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/jquery.themepunch.revolution.min.js'); ?>"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
    (Load Extensions only on Local File Systems !  +
    The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.migration.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo vendor_url('revolution/js/extensions/revolution.extension.video.min.js'); ?>"></script>
<script defer="defer" type="text/javascript">
	var tpj = jQuery;
	var revapi4;
	tpj(document).ready(function() {
		if (tpj("#rev_slider_4_1").revolution == undefined){
			revslider_showDoubleJqueryError("#rev_slider_4_1");
		} else{
			revapi4 = tpj("#rev_slider_4_1").show().revolution({
				sliderType:"standard",
				jsFileLocation:"assets/revolution/js/",
				sliderLayout:"fullscreen",
				dottedOverlay:"none",
				delay:5000,
				navigation: {
					keyboardNavigation: "on",
					keyboard_direction: "horizontal",
					mouseScrollNavigation: "off",
					onHoverStop: "off",
					touch: {
						touchenabled: "on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					},
					arrows: {
						style: "gyges",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						tmp: '',
						left: {
							h_align: "left",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						},
						right: {
							h_align: "right",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						}
					},
					bullets: {
						enable: false,
						hide_onmobile: false,
						style: "gyges",
						hide_onleave: false,
						direction: "horizontal",
						h_align: "center",
						v_align: "top",
						h_offset: 0,
						v_offset: 20,
						space: 5,
						tmp: ''
					}
				},
				parallax: {
					type:"mouse",
					origo:"slidercenter",
					speed:2000,
					levels:[2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
				},
				responsiveLevels:[1240, 1024, 778, 480],
				gridwidth:[1240, 1024, 778, 480],
				gridheight:[868, 768, 960, 720],
				lazyType:"none",
				shadow:0,
				spinner:"off",
				stopLoop:"on",
				stopAfterLoops:0,
				stopAtSlide:1,
				shuffle:"off",
				autoHeight:"off",
				fullScreenAlignForce:"off",
				fullScreenOffsetContainer: "",
				fullScreenOffset: "",
				disableProgressBar:"on",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					nextSlideOnWindowFocus:"off",
					disableFocusListener:false,
				}
			});



		}
	});	/*ready*/



</script>

