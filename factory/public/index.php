<?php

use App\Factories\PaymentGatewayFactory;

require_once dirname(__DIR__, 1) . "/vendor/autoload.php";

enum PayTypes: string {
    case PayPal = "paypal";

    case ZarinPal = "zarinpal";

    case Pay = "pay";
}

$paymentGateway = PaymentGatewayFactory::createPaymentGateway("zarinpal");

$paymentGateway->pay(2000);

