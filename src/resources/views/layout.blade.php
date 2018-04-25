<html>
<head>
    <title>Client application</title>
</head>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<ul>
    <li><a href="{{route('products.in-stock')}}">Products in stock</a></li>
    <li><a href="{{route('products.out-of-stock')}}">Products out of stock</a></li>
    <li><a href="{{route('products.amount-over-five')}}">Products with amount over five</a></li>
    <li><a href="{{route('products.create')}}">&plus; Add a new product</a></li>
</ul>
<body>
@yield('main')
</body>
</html>