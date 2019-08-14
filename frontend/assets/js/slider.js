var mosaic__bloc ='';


$.getJSON("http://www.rtiplay.ci/Emission/bindex//1/0/0", function(result){

	for (i = 0; i < result.data.length; i++) {
		while (i < 5) {

			mosaic__bloc+='<div class="mosaic__bloc">\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="mosaic__tile mosaic__tile--large"><a\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass="tile tile--16-9 tile--large"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\thref="https://www.6play.fr/en-famille-p_1270">\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__image"><img class="tile__thumb"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  alt="En famille en replay"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  src="https://images.6play.fr/v2/images/873786/raw?width=480&amp;height=270&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=4a87add1d125f20e3a79fe989039e4442401536f"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  srcSet="https://images.6play.fr/v2/images/873786/raw?width=480&amp;height=270&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=4a87add1d125f20e3a79fe989039e4442401536f 480w, https://images.6play.fr/v2/images/873786/raw?width=960&amp;height=540&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=cc65bfef2c36f7c9d150d862e528fb55f7e8f111 960w, https://images.6play.fr/v2/images/873786/raw?width=592&amp;height=333&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=625cf01aba405c0055b0f1ba9e37a7ff37eed480 592w, https://images.6play.fr/v2/images/873786/raw?width=1184&amp;height=666&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=93bf48bce54d12f18e6517fc9519e49499a6ea05 1184w, https://images.6play.fr/v2/images/873786/raw?width=800&amp;height=450&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=83502d16ad6da66225b5378615bd2ba20a2034d7 800w, https://images.6play.fr/v2/images/873786/raw?width=1600&amp;height=900&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=0d075cc8b70fead947e3709c047709fc2fde755f 1600w, https://images.6play.fr/v2/images/873786/raw?width=1120&amp;height=630&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=200f3fbcaf62d6b64d09dfb2e157a8d14fb5fe4e 1120w, https://images.6play.fr/v2/images/873786/raw?width=2240&amp;height=1260&amp;fit=scale_crop&amp;quality=60&amp;format=jpeg&amp;interlace=1&amp;hash=16c351834373763f373bd5b265f65631ddf5fa20 2240w"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  sizes="(min-width: 4096px) 1120px, (min-width: 2048px) 800px, (min-width: 1024px) 592px, 480px"/>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__service"><span\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle="min-height:3px"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass="icon-service icon-service-6terreplay_s tile__service-logo"\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\ttitle="6ter"></span></div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__label">\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__title">'+field.r_nom+'</div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__subtitle">\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>'+field.r_videos+' vidéo(s)</span></div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="tile__polaroid"></div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a></div>\n' +
				'\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>';

		}
	}

});


console.log(mosaic__bloc);
