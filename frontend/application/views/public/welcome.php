<link href="<?php echo vendor_url('ninjaslider/ninja-slider.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo vendor_url('ninjaslider/ninja-slider.js'); ?>" type="text/javascript"></script>


<!--start-->
<div id="ninja-slider">
	<div class="slider-inner h100">
		<ul class="h100">
			<?php
			header("Access-Control-Allow-Origin: *");

			for( $i= 0 ; $i <= count($slidercontent)-1 ; $i++ ) {

			?>
			<li>
				<a class="ns-img" href="<?php echo site_url(); ?>/Miniature/600/1000/<?php echo $slidercontent[$i]->r_image; ?>"></a>
				<div class="caption" style="top: 30%"><?php echo $slidercontent[$i]->r_titre; ?>
			<p class="soustitre"> <?php echo $slidercontent[$i]->r_sous_titre; ?></p>
                    <button class="voirplus"> VOIR PLUS </button>
				</div>
			</li>
				<?php
			}
			?>

		</ul>
		<div class="navsWrapper">
			<div id="ninja-slider-next"></div>
			<div id="ninja-slider-prev"></div>
		</div>
	</div>
</div>
