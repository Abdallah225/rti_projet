<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 11/11/2018
 * Time: 01:44
 */
require_once(APPPATH . 'third_party\gtag.php'); 

class Miniature extends CI_Controller
{
	public function index($hauteur,$largeur,$imagename)
	{

		$upload_dir ="assets/uploads/img/";

		if(!file_exists($upload_dir.$imagename))
		{
			$imagename=str_replace("jpeg","png",$imagename);
		}



		$base_url = $upload_dir;
		$info = getimagesize($upload_dir.$imagename);
		$quality = 100;
		list($width, $height) = getimagesize($upload_dir.$imagename);
		$newwidth = $largeur;
		$newheight = $hauteur;

		if ($info['mime'] == 'image/jpeg')
		{
			$namepath = substr($imagename, 0, strpos($imagename, '.jpeg')).'_'.$hauteur.'_'.$largeur.'.jpeg';
			$source = imagecreatefromjpeg($upload_dir.$imagename);
		}


		if ($info['mime'] == 'image/gif')
		{
			$namepath = substr($imagename, 0, strpos($imagename, '.gif')).'_'.$hauteur.'_'.$largeur.'.gif';
			$source = imagecreatefromgif($upload_dir.$imagename);
		}

		if ($info['mime'] == 'image/png')
		{
			$namepath = substr($imagename, 0, strpos($imagename, '.png')).'_'.$hauteur.'_'.$largeur.'.png';
			$image = imagecreatefrompng($upload_dir.$imagename);
			$source = imagecreatefrompng($upload_dir.$imagename);
		}

		$destination = 'assets/uploads/miniatures/';
		$destination=$destination.$namepath;

		if(!file_exists($destination))
		{
			$thumb = imagecreatetruecolor($newwidth, $newheight);

			imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


			imagejpeg($thumb, $destination, $quality);
		}

		$this->output->set_content_type(get_mime_by_extension($destination));
		$this->output->set_output(file_get_contents($destination));





		//$response = new BinaryFileResponse($destination);
// you can modify headers here, before returning
		//return $response;

	}
}
