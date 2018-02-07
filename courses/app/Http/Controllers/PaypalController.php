<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypal;
use Redirect;

use Config;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use ResultPrinter;

class PaypalController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

		
		
		$this->_apiContext->setConfig(array(
			'mode' => 'sandbox',
			'service.EndPoint' => 'https://api.sandbox.paypal.com',
			'http.ConnectionTimeOut' => 60,
			'log.LogEnabled' => true,
			'log.FileName' => storage_path('logs/paypal.log'),
			'log.LogLevel' => 'FINE',
			
		));

		$apiContext = new \PayPal\Rest\ApiContext(
		  new \PayPal\Auth\OAuthTokenCredential(
		    'Afw_hvBKtT0AZN4S8LqKnaAuzoFUO-d_zoWt376cPkgU0RmoUEX-mo4HhBJ3WGZsD3QIkYAxvKqwr9L1',
		    'EDrh9vQLAJpC4c5E7CBrafvkSCSOH50dFgsEGSn0aTFBGjh_0jpcyX8n2aEFoZTDMmUIJwVzw4lTCkjI'
		  )
		);
    }

    public function getCheckout($price,$course_name,$course)
	{
		$payer = PayPal::Payer();
		$payer->setPaymentMethod('paypal');

		$amount = PayPal::Amount();
		$amount->setCurrency('USD');
		$amount->setTotal($price); // This is the simple way,
		// you can alternatively describe everything in the order separately;
		// Reference the PayPal PHP REST SDK for details.

		$transaction = PayPal::Transaction();
		$transaction->setAmount($amount);
		$transaction->setDescription($course_name);

		$redirectUrls = PayPal:: RedirectUrls();
		$redirectUrls->setReturnUrl(url('/getdone/'.$course));
		$redirectUrls->setCancelUrl(url('/getcancel'));

		$payment = PayPal::Payment();
		$payment->setIntent('sale');
		$payment->setPayer($payer);
		$payment->setRedirectUrls($redirectUrls);
		$payment->setTransactions(array($transaction));

		$response = $payment->create($this->_apiContext);
		$redirectUrl = $response->links[1]->href;
		
		return Redirect::to( $redirectUrl );
	}

	public function getCert($price,$cert_name,$course)
	{
		$payer = PayPal::Payer();
		$payer->setPaymentMethod('paypal');

		$amount = PayPal::Amount();
		$amount->setCurrency('USD');
		$amount->setTotal($price); // This is the simple way,
		// you can alternatively describe everything in the order separately;
		// Reference the PayPal PHP REST SDK for details.

		$transaction = PayPal::Transaction();
		$transaction->setAmount($amount);
		$transaction->setDescription($cert_name);

		$redirectUrls = PayPal:: RedirectUrls();
		$redirectUrls->setReturnUrl(url('/certgetdone/'.$course));
		$redirectUrls->setCancelUrl(url('/certgetcancel'));

		$payment = PayPal::Payment();
		$payment->setIntent('sale');
		$payment->setPayer($payer);
		$payment->setRedirectUrls($redirectUrls);
		$payment->setTransactions(array($transaction));

		$response = $payment->create($this->_apiContext);
		$redirectUrl = $response->links[1]->href;
		
		return Redirect::to( $redirectUrl );
	}

	public function payout($amount, $paypalEmail)
	{
	    $payouts = new \PayPal\Api\Payout();
	    $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();

	    $senderBatchHeader->setSenderBatchId(uniqid())
    	->setEmailSubject("You have a Payout!");

	    $senderItem = new \PayPal\Api\PayoutItem();
		$senderItem->setRecipientType('Email')
	    ->setNote('Thanks for your patronage!')
	    ->setReceiver($paypalEmail)
	    ->setSenderItemId("2014031400023")
	    ->setAmount(new \PayPal\Api\Currency('{
                        "value":"' . floatval($amount) . '",
                        "currency":"USD"
                    }'));

		$payouts->setSenderBatchHeader($senderBatchHeader)
    	->addItem($senderItem);

		$request = clone $payouts;

		// try {
		    $output = $payouts->createSynchronous($this->_apiContext);
		// } catch (Exception $ex) {
		//     // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		//  	ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
		//     exit(1);
		// }

		// // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		//  ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);

		return $output;

	}

	public function batch($amount, $paypalEmail)
	{
	    $payouts = new \PayPal\Api\Payout();
	    $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();

		// #### Batch Header Instance
		$senderBatchHeader->setSenderBatchId(uniqid())
		    ->setEmailSubject("You have a payment");


		$senderItem1 = new \PayPal\Api\PayoutItem();
		$senderItem1->setRecipientType('Email')
		    ->setNote('Thanks you.')
		    ->setReceiver($paypalEmail)
		    ->setSenderItemId("item_1" . uniqid())
		    ->setAmount(new \PayPal\Api\Currency('{
		                         "value":"' . floatval($amount) . '",
		                        "currency":"USD"
		                    }'));

		$payouts->setSenderBatchHeader($senderBatchHeader)->addItem($senderItem1);

		$request = clone $payouts;

		try {
		    $output = $payouts->create(null,$this->_apiContext);
		} catch (Exception $ex) {
		    echo $ex->getMessage();
		}

		return $output;

	}
	
}
