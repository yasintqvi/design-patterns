<?php

namespace App\Factories;

use App\Contracts\PaymentGateway;
use Exception;

class PaymentGatewayFactory
{
	public static function createPaymentGateway($type): PaymentGateway
	{
		$className = "App\\Payments\\" . ucfirst($type) . "Payment";

		if (class_exists($className)) {
			return new $className();
		}

		throw new Exception("Unsupported payment gateway type.");
	}
}
