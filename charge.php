<?php
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_51Hpq4CIkuecL7QkUnVXbFdWYIskjwYpA8248lJ0sffdPBqslK7uzOScCG6RCXNhW3ZkziF7CJYEx65dVzAO9TZgf001jfrLSwH');

    
    //Sanitize POST array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    //Create Customer
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    //Charge customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Test Product",
        "customer" => $customer->id
    ));

//Redirect to success page 
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);