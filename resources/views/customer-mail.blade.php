<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SuperFreighters</title>
</head>
<body>
    <h4>Dear, {{ $details['client_name'] }}, </h4>
    <h5>Your order with the id {{ $details['order_id'] }} has been confirmed and will be shipped soon.</h5>
    <br>
    <p>Please take note that trasnport of items by air take 2 days after shipment, and transport by sea can take up to 10 times longer than ny air.</p>
    <br>
    <p>The total amount paid is {{ $details['total'] }}</p>
    <br>
    <br>
    <br>
    <p>Thank you for your patronage.</p>
</body>
</html>
