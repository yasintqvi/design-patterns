<?php

namespace App\Payments;

use App\Contracts\PaymentGateway;

class ZarinpalPayment implements PaymentGateway 
{

    public function pay($amount)
    {
        echo "paying with zarinpal" . PHP_EOL;
        sleep(2);
		echo "paying {$amount} using zarinpal successfully" . PHP_EOL;
    }

}