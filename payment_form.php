<form id = "paypal_checkout" action = "<?= $endpoint ?>cgi-bin/webscr" method = "post">

  <input name = "cmd" value = "_cart" type = "hidden">
  <input name = "upload" value = "1" type = "hidden">
  <input name = "no_note" value = "0" type = "hidden">
  <input name = "bn" value = "PP-BuyNowBF" type = "hidden">
  <input name = "tax" value = "0" type = "hidden">
  <input name = "rm" value = "2" type = "hidden">
  <input name = "charset" value = "utf-8" type = "hidden">

  <input type="hidden" name="first_name" value="<?= $customer->givenName ?>">
  <input type="hidden" name="last_name" value="<?= $customer->familyName ?>">
  <input type="hidden" name="address1" value="<?=  $customer->streetAddress ?>">
  <input type="hidden" name="city" value="<?= $customer->locality ?>">
  <input type="hidden" name="zip" value="<?= $customer->postalCode ?>">
  <input type="hidden" name="email" value="<?= $customer->email ?>">

  <input name = "business" value = "<?= $business ?>" type = "hidden">
  <input name = "handling_cart" value = "0" type = "hidden">
  <input name = "currency_code" value = "<?= $currency ?>" type = "hidden">
  <input name = "lc" value = "<?= $location ?>" type = "hidden">
  <input name = "return" value = "<?= $returnUrl ?>" type = "hidden">
  <input name = "cbt" value = "<?= $returntxt ?>" type = "hidden">
  <input name = "cancel_return" value = "<?= $cancelUrl ?>" type = "hidden">
  <input name = "invoice" value = "<?= $invoice ?>" type = "hidden">
  <input name="landing_page" value="Billing" type="hidden">

  <?php
  $i = 0;
  foreach($products as $p) {
    $i = $i + 1;
    $amount = $p->amount / 100;
    echo '<input name = "item_name_'. $i .'" value = "'. $p->title .'" type = "hidden">';
    echo '<input name = "quantity_'. $i .'" value = "'. $p->quantity .'" type = "hidden">';
    echo '<input name = "amount_'. $i .'" value = "'. $amount .'" type = "hidden">';
    echo '<input name = "shipping_'. $i .'" value = "0" type = "hidden">';
  }
  ?>
  
  <input id="ppcheckoutbtn" value="<?= __("Click here to proceed to Paypal.com") ?>" class="button" type="submit">

</form>
<!--<script>document.forms['paypal_checkout'].submit();</script>-->