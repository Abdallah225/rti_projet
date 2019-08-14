<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getDomain()
{
    $host = $_SERVER['HTTP_HOST'];
    preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
    return "{$matches[0]}\n";
}


if ( ! function_exists('site_url'))
{
    function site_url()
    {
        $ci = & get_instance();
        return $ci->config->item('ws_site_url');

    }
}



if ( ! function_exists('site_name'))
{
    function site_name()
    {
        $ci = & get_instance();
        return $ci->config->item('ws_site');

    }
}



if ( ! function_exists('css_url'))
{
    function css_url($nom)
    {
        return site_url().'/assets/css/' . $nom . '.css';
    }
}

if ( ! function_exists('js_url'))
{
    function js_url($nom)
    {
        return site_url().'/assets/js/' . $nom;
    }
}

if ( ! function_exists('img_url'))
{
    function img_url($nom)
    {
        return site_url().'/assets/img/' . $nom;
    }
}

if ( ! function_exists('vendor_url'))
{
    function vendor_url($nom)
    {
        return site_url().'/assets/vendors/' . $nom;
    }
}

if ( ! function_exists('media_url'))
{
    function media_url($nom)
    {
        return site_url().'/assets/media/' . $nom;
    }
}



function encrypt($pure_string) {
    $ci = & get_instance();
    $encryption_key = $ci->config->item('ws_pass');
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

function decrypt($encrypted_string) {
    $ci = & get_instance();
    $encryption_key = $ci->config->item('ws_pass');
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}

if ( ! function_exists('new_log')) {
    function new_log($script = 'error', $message)
    {
        $ci = & get_instance();
       // $ws_trace_error = $ci->config->item('ws_trace_error');
        $filepath = 'application/logs/log-'.date('Ymd').'.rkx';
        $handle=fopen($filepath,"a");
        $message = "[ ".date('d-m-Y')." ".date('H:i:s')." ] ".$script." => ".$message."\n";
        // Ecrivons quelque chose dans notre fichier.
         fwrite($handle, $message);
        fclose($handle);
    }
}

if ( ! function_exists('left_pub'))
{
    function left_pub()
    {
        $ci = & get_instance();
        $ci->load->view('public/pubs/left_pub');
        //return $ci->config->item('ws_site');

    }
}


function rand_string( $length ) {

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	return substr(str_shuffle($chars),0,$length);

}


function json_output($statusHeader,$response)
{

	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $ci =& get_instance();
    $ci->output->set_content_type('application/json');
    $ci->output->set_status_header($statusHeader);
    $ci->output->set_output(json_encode($response));
}
