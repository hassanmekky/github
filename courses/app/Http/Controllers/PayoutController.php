<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paypal;
use Redirect;
use Config;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;



class PayoutController extends Controller
{
	// public $apiContext;
 //    public $currency = 'USD';
 //    public $config = [];
 //    public $paymentInfo = [];
 //    public $response = [];

    private $apiContext;

    public function __construct()
    {
        $this->apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));
        
        
        $this->apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }
    public function payout($amount, $paypalEmail)
	{
	    $payouts = new \PayPal\Api\Payout();
	    $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
	    $senderBatchHeader->setSenderBatchId(uniqid())->setEmailSubject("You have a Payout!");
	    $senderItem = new \PayPal\Api\PayoutItem();
	    $senderItem->setRecipientType('Email')->setNote('Thanks for your using El3lom')->setReceiver($paypalEmail)->setSenderItemId('2014031400023'))->setAmount(new \PayPal\Api\Currency('{
	                            "value":"' . floatval($amount) . '",
	                            "currency":"USD"
	                        }'));
	    $request = clone $payouts;
	    $payouts->setSenderBatchHeader($senderBatchHeader)->addItem($senderItem);
	    $output = $payouts->createSynchronous($this->apiContext);
	    return $output;
	}
}
