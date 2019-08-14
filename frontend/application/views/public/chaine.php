<script src="<?php echo js_url('securite.js'); ?>" defer></script>
<div class="">
	<div class="row__inner row lightbox">

		<?php
		header("Access-Control-Allow-Origin: *");
 
		for( $i= 0 ; $i <= count($chaine)-1 ; $i++ ) {


			?>
			<div class="col-sm-2 col-xs-6 tile" data-iframe="true" id="open-website" data-src="<?php echo $chaine[$i]->r_uri; ?>" >

				<div class="lightbox-item tile__media">
					<img class="tile__img" src="<?php echo site_url()."/assets/img/".$chaine[$i]->r_i.".png"; ?>" alt=""  />
				</div>
				<div class="tile__details">
					<div class="tile__title">
						<?php echo $chaine[$i]->r_libelle; ?>
					</div>
				</div>
			</div>
<?php }  ?>

	</div>
</div>


<style>

	.contain {
		width: 100%;
	}
	.row {
		width: 100%;
	}
	.row__inner {
		transition: 450ms -webkit-transform;
		transition: 450ms transform;
		transition: 450ms transform, 450ms -webkit-transform;
		font-size: 0;
		white-space: nowrap;
		margin: 50px;
		padding-bottom: 10px;
		width: 100%;
	}
	.tile {
		position: relative;
		display: inline-block;
		width: 250px;
		top:100px;
		height: 140.625px;
		margin-right: 10px;
		font-size: 20px;
		cursor: pointer;
		transition: 450ms all;
		-webkit-transform-origin: center center;
		transform-origin: center center;
	}
	.tile__img {
		width: 250px;
		height: 140.625px;
		-o-object-fit: cover;
		object-fit: cover;
	}
	.tile__details {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		top: 0;
		font-size: 10px;
		opacity: 0;
		background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
		transition: 450ms opacity;
	}
	.tile__details:after,
	.tile__details:before {
		content: '';
		position: absolute;
		top: 50%;
		left: 50%;
		display: #000;
	}
	.tile__details:after {
		margin-top: -25px;
		margin-left: -25px;
		width: 50px;
		height: 50px;
		border: 3px solid #ecf0f1;
		line-height: 50px;
		text-align: center;
		border-radius: 100%;
		background: rgba(0,0,0,0.5);
		z-index: 1;
	}
	.tile__details:before {
		content: '▶';
		left: 0;
		width: 100%;
		font-size: 30px;
		margin-left: 7px;
		margin-top: -18px;
		text-align: center;
		z-index: 2;
	}
	.tile:hover .tile__details {
		opacity: 1;
	}
	.tile__title {
		position: absolute;
		bottom: 0;
		padding: 10px;
	}
	.row__inner:hover {
		-webkit-transform: translate3d(-62.5px, 0, 0);
		transform: translate3d(-62.5px, 0, 0);
	}
	.row__inner:hover .tile {
		opacity: 0.3;
	}
	.row__inner:hover .tile:hover {
		-webkit-transform: scale(1.5);
		transform: scale(1.5);
		opacity: 1;
	}
	.tile:hover ~ .tile {
		-webkit-transform: translate3d(125px, 0, 0);
		transform: translate3d(125px, 0, 0);
	}



</style>
