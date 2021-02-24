<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>New Order from {{ $data['client_name'] }}</h3>
    <br>
    Name of item: {{ $data['item_name'] }}
    <br>
    Weight: {{ $data['item_weight'] }}
    <br>
    Mode of transportation: {{ $data['mode_of_transportation'] }}
    <br>
    Customer email: {{ $data['client_email'] }}
    <br>
    Country of origin: {{ $data['country_of_origin'] }}
</body>
</html>
