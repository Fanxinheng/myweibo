<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use session;

class CodeController extends Controller
{
    //
    public function send(Request $request)
    {	
    	$phone = $_POST['phone'];
		$code = rand(100000 , 999999);

    	$config = [
    		'accessKeyId'    => 'LTAI4MmyzuunP1Ex',
    		'accessKeySecret' => 'Z0MESO9waTT5399F5tb1fVWywudxSk',
		];

		$client  = new Client($config);
		$sendSms = new SendSms;
		$sendSms->setPhoneNumbers($phone);
		$sendSms->setSignName('阿呆');
		$sendSms->setTemplateCode('SMS_111315012');
		$sendSms->setTemplateParam(['code' => $code]);
		$sendSms->setOutId('demo');

		print_r($client->execute($sendSms));

		session(["code"=>$code]);

    }
}
