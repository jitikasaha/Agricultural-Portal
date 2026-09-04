<?php
	require_once __DIR__ . '/../../config.php';
	require_once "stripe-php-master/init.php";
	require_once "products.php";

$stripeDetails = array(
		"secretKey" => app_env('STRIPE_SECRET_KEY', ''),
		"publishableKey" => app_env('STRIPE_PUBLISHABLE_KEY', '')
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	if (!empty($stripeDetails['secretKey'])) {
		\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
	}
?>
