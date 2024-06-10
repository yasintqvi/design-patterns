<?php

namespace App\Payments;

use App\Contracts\PaymentGateway;

class PaypalPayment implements PaymentGateway
{
	public function pay($amount) 
	{
		echo "paying with paypal" . PHP_EOL;
        sleep(2);
		echo "paying {$amount} using paypal successfully" . PHP_EOL;
	}
}
