<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 28/02/2018
 * Time: 17:37
 */

class Mailling_model extends CI_Model
{

    private $api='https://us12.api.mailchimp.com/3.0';
    private $key = 'YWxleDo2YWVjZmFmMjNiOTAwYjVkNTk0NDFlYjY4ZWY3Y2U5Zi11czEy';
    private $badreturn=-99;
    private $godreturn=200;
    private $apikey ='y6pikYe5lHToLAwq02rIgA';
    private $from_email ;
    private $from_name ;

    public $method='POST';
    public $liste='3c230518db';
    public $email ;
    public $dataPost;
    public $message;
    public $sujet;


public function tester()
{
    return 1;
}


    public function subscribe()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api."/lists/".$this->liste."/members",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->dataPost,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic ".$this->key,
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Request-Token: ".$this->security->get_csrf_hash()
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($err) {
            return $this->badreturn;
        } else {
            return $response;
        }
    }


    public function sendmail($i)
    {

    	$this->from_email=$this->config->item('ws_email_site');
        $this->from_name=$this->config->item('ws_site');


		$to = null;
		$to->email = $this->email;
		$to->type = 'to';
		$message =null;
		$message->html = "<p>".$this->message."</p>";
		$message->text = $this->message;
		$message->subject =$this->sujet;
		$message->from_email = $this->from_email;
		$message->from_name = $this->from_name;
		$message->to = array($to);

		$tosend = null;

		$tosend->key = $this->apikey;
		$tosend->message = $message;

return $tosend;


    }



}
