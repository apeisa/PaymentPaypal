# PaymentPaypal
PayPal payment method for ProcessWire

## Requirements
Requires PaymentModule -module

## Example

```PHP

// Load the module and setup payment
$payment = $modules->get("PaymentPaypal");
$payment->setCurrency("EUR");
$payment->setId(123456789);

$customer = Array();
$customer['givenName'] = "Antti";
$customer['familyName'] = "Peisa";
$customer['streetAddress'] = "Some Street";
$customer['locality'] = "Some City";
$customer['postalCode'] = "12345";
$customer['email'] = "antti.peisa@gmail.com";
$payment->setCustomerData($customer);

$title = "Cool product";
$quantity = 2;
$amount = 1000; // Amount in payment modules always in cents
$payment->addProduct($title, $amount, $quantity);

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
		echo $payment->render();
		break;
}
```

## License
GPL 2.0
