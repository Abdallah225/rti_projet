<script>



	f_showemission(0,0,<?php echo $thematic; ?>);
</script>


<style>


	* {box-sizing: border-box;}

	.wrapper {
		border: 0px solid #f76707;
		border-radius: 3px;


	}

	.wrapper > div {

	}
	.wrapper {
		display: grid;
		grid-template-columns: repeat(6,1fr);
		grid-auto-rows: 110px;
		grid-auto-columns: 90px;
		grid-gap: 5px;
	}

	.wrapper div:nth-child(1) {
		grid-column:1/3;
		grid-row: 1/3;
	}
	.wrapper div:nth-child(2) {
		grid-column: 1/3;
		grid-row: 5/3;
	}
	.wrapper div:nth-child(3) {
		grid-column: 5/3;
		grid-row: 1/3;
	}
	.wrapper div:nth-child(4) {

	}
	.wrapper div:nth-child(5) {

	}
	.wrapper div:nth-child(6) {

	}
</style>




	<div class="wrapper" >


	</div>

<div class="next-btn">

</div>
<div class="prev-btn">

</div>

