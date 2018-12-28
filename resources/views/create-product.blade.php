<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form method="post" action="{{ URL::route('create-product') }}">
    @csrf
    <h3>Create New Product</h3>
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
        <input type="number" name="quantity_in_stock" class="form-control" placeholder="Quantity in Stock">
    </div>
    <div>
        <input type="number" name="price_per_item" class="form-control" placeholder="Price Per Item">
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
</form>

@php $products = \GuzzleHttp\json_decode(Storage::get('products.json')); @endphp

<table class="table">
    <tr>
        <th>Product Name</th>
        <th>Quantity In Stock</th>
        <th>Price Per Item</th>
        <th>Datetime submitted</th>
        <th>Total Value Number</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity_in_stock }}</td>
            <td> {{$product->price_per_item }}</td>
            <td> {{$product->created_at->date}}</td>
            <td> {{$product->quantity_in_stock * $product->price_per_item }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>