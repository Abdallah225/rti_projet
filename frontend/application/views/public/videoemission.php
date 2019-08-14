<!--<script src="<?php /*echo js_url('securite.js'); */?>" defer></script>-->
<link rel="stylesheet" href="<?php echo css_url('slider'); ?>">

<style>
    .slider-arrow--big {
        width: 60px;
        /* height: 130px; */
        /*top: calc(50% - 60px);*/
    }


</style>


<script>



    function fcutstring($string,$taille) {

        return  $string.length > $taille ?
            $string.substring(0, $taille - 3) + "..." :
            $string;
    }

    function frefrech($id) {


        var $lg = $('.'+$id);
        var ins;

        function instantiate() {
            if (ins) {
                ins.destroy(true);
            }
            $lg.lightGallery({
                pager: false,
                currentPagerPosition: 'middle'
            });

            // set instance
            ins = $lg.first().data('lightGallery');
        }

        // re instantiate when closed
        $lg.on('onCloseAfter.lg', function(event) {
            instantiate();
        });

        instantiate();
    }


    function fgetLikeThat($thematique,$emission,$iddiv) {

        var url ='';

        if($thematique !=0)
        {
            url = "<?php echo site_url(); ?>/Video/getByThematic/"+$thematique;
        }

        if($emission !=0)
        {
            url = "<?php echo site_url(); ?>/Video/getByEmission/"+$emission;
        }


        var $methods = $('.'+$iddiv);
        $.getJSON(url, function(result){

            $methods.html('');
            $.each(result, function(i, field){
                var uimg ='';
                var uivid ='';
                switch (field.r_type) {
                    case 'youtube':
                        uimg ='https://img.youtube.com/vi/'+field.r_url+'/hqdefault.jpg';
                        uivid ='https://www.youtube.com/embed/'+field.r_url;
                        break;
                    case 'dailymotion':
                        uimg ='https://www.dailymotion.com/thumbnail/video/'+field.r_url;
                        uivid ='//www.dailymotion.com/embed/video/'+field.r_url;
                        break;
                }

                var string = fcutstring(field.r_description,100);

                //var li2 = '<div class="card--content"></div>';


                var li ='<div class="card--content slider__item slider__item--s" data-iframe="true" id="open-website" data-src="'+uivid+'" ><div class="tile__image container"><img class="tile__thumb"\n' +
                    ' alt="'+field.r_description+'"\n' +
                    ' src="'+uimg+'"\n' +
                    ' srcset="'+uimg+'"\n' +
                    '</div><div class="overlay">'+string+'<div class="playbtn">&#9658;</div> </div></div>';



                $methods.append(li);

                /*rafraichir le slide a chaque appel ajax*/

                $methods.lightGallery();
                $methods.data('lightGallery').destroy(false);

                /*rafraichir le slide a chaque appel ajax*/

            });
            $methods.lightGallery();



        });

    }
</script>




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
</style>
<div>
    <a href="javascript:history.back();" role="button" class="go-back"></a>
    <img id="bg" src="<?php echo site_url(); ?>/Miniature/600/1000/<?php echo $data->emission->r_image; ?>.jpeg">
</div>


<div class="">

    <div class="contenu_pp">

        <div class="header-banner-program blue-gradient">
            <div class="header-banner-program__header">
                <!--div class="next-diffusion"><span
                            class="next-diffusion__label"><?php echo $data->emission->r_desc; ?> </span>
                </div-->
                <h4 class="m-l-10 c-white">
                    PROCHAINE DIFFUSION
                </h4>
                <h4 class="m-l-10 c-white">
                    MERCREDI 07/08 à 23h15
                </h4>
                <h4 class="m-l-10 c-white">
                    sur RTI1
                </h4>
                <h1 class="header-banner-program__title m-l-10"><?php echo $data->emission->r_nom; ?></h1></div>
        </div>

        <div class="blue-bg">
        <div class="app app--full-features app--6play app--m6web row">
            <h2 class="tvshow-bloc__title">Dernières vidéos</h2>
            <button
                    class="btn  btn-lg waves-effect slider-arrow slider-arrow--left slider-arrow--big video-left"
                    side="left">
                <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44"
                          transform="translate(120, 0) scale(-1, 1)"></path>
                </svg>
            </button>


            <button
                    class="btn btn-lg waves-effect slider-arrow slider-arrow--right slider-arrow--big video-right"
                    side="right">
                <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="square" stroke="#fff" stroke-width="8" d="M40 16l43 44m0 0l-43 44"></path>
                </svg>
            </button>


            <section class="card--contener cardvideo row" id="video-gallery" style="padding: 10px 50px;">

            </section>

        </div>

        <div class="clearfix">
            &nbsp;
        </div>


        <div class="app app--full-features app--6play app--m6web row">
            <h2 class="tvshow-bloc__title">Vous aimerez aussi ...</h2>
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

            </section>

        </div>

        <div class="clearfix">
            &nbsp;
        </div>

        <div class="clearfix">
            &nbsp;
        </div>
        <div class="clearfix">
            &nbsp;
        </div>


    </div>

</div>
</div>


<script>
    frefrech('cardlikethat');
    frefrech('cardvideo');
    fgetLikeThat(<?php echo $thematic_id; ?>,0,'cardlikethat');
    fgetLikeThat(0,<?php echo $idemission; ?>,'cardvideo');

    /* CLICK SCROLL FUNCTIONS JQUERY */
    $('.video-left').click(function() {
        event.preventDefault();
        $('.cardvideo').animate({
            scrollLeft: "-=775px"
        }, "slow");
    });

    $('.video-right').click(function() {
        event.preventDefault();
        $('.cardvideo').animate({
            scrollLeft: "+=775px"
        }, "slow");
    });
    /* CLICK SCROLL FUNCTIONS JQUERY */



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
