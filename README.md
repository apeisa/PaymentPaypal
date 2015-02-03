# PaymentPaypal
PayPal payment method for ProcessWire

## Example

```PHP

// Load the module and setup payment
$payment = $modules->get("PaymentPaypal");
$payment->setCurrency("EUR");

$customer = new WireData();
$customer->givenName = "Antti";
$customer->familyName = "Peisa";
$customer->streetAddress = "Some street";
$customer->locality = "Some City";
$customer->postalCode = "12345";
$customer->email = "antti.peisa@gmail.com";

$payment->setCustomer($customer);

$product = new WireData();
$product->title = "Cool product";
$product->quantity = 2;
$product->amount = 1000; // Amount in payment modules always in cents
$payment->addProduct($product);


// In this example we are going to do all in same page
$url = $page->httpUrl;
$payment->setProcessUrl($url . "?step=process");
$payment->setFailureUrl($url . "?step=fail");
$payment->setCancelUrl($url . "?step=cancel");

switch ($input->get->step) {
	case 'process':
		if ($payment->processPayment()) {
			echo "Thanks, payment successful!";
		} else {
			echo "Are you kidding me?";
		}
		break;

	case 'fail':
		echo "Something went wrong";
		break;

	case 'cancel':
		echo "I think you cancelled?";
		break;
	
	default:
		echo $payment->embed(); // Here you could look if instance is PaymentEmbed or PaymentRedirect and choose method based on that
		break;
}
```

## License
GPL 2.0
