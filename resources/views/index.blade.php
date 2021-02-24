<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>SuperFreighters</title>
</head>
<body>
    <div class="col-md-8 justify-content-center" id="indexBox">
        <form action="{{ route('order') }}", method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5">
                    <input type="text" name="client_name" id="" placeholder="Your name">
                </div>
                <div class="col-md-6 mb-5">
                    <input type="text" name="client_email" placeholder="Your Email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <input type="text" name="client_address" id="" placeholder="Your address">
                </div>
                <div class="col-md-6 mb-5">
                    <select name="mode_of_transport" id="">
                        <option value="Air">Air</option>
                        <option value="Sea">Sea</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <input type="text" name="item_name" id="" placeholder="Item name">
                </div>
                <div class="col-md-6 mb-5">
                    <input type="text" name="item_weight" placeholder="Item Weight">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <select name="country_of_origin" id="">
                        <option value="UK">UK</option>
                        <option value="US">US</option>
                    </select>
                </div>
            </div>
            <p style="text-align: center">
                <button class="btn-dark" type="submit">Submit</button>
            </p>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
