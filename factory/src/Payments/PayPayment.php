<?php

namespace App\Payments;

use App\Contracts\PaymentGateway;

class PayPayment implements PaymentGateway 
{

    public function pay($amount)
    {
        echo "paying with pay" . PHP_EOL;
        sleep(2);
		echo "paying {$amount} using pay successfully" . PHP_EOL;
    }

}