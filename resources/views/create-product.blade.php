<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form method="post" onsubmit="addProduct()">
    <h3>Create New Product</h3>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
        <input type="number" name="quantity_in_stock" id="quantity_in_stock" class="form-control" placeholder="Quantity in Stock">
    </div>
    <div>
        <input type="number" name="price_per_item"  id="price_per_item" class="form-control" placeholder="Price Per Item">
    </div>
    <button name="submit" class="btn btn-primary" id="js-create-product">Create Product</button>
</form>

@php $products = \GuzzleHttp\json_decode(Storage::get('products.json')); @endphp

<table class="table" id="js-products-table">
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
            <td> {{ \Carbon\Carbon::parse($product->created_at->date) }}</td>
            <td> {{$product->quantity_in_stock * $product->price_per_item }}</td>
        </tr>
    @endforeach
</table>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script>
  jQuery(document).ready(function(){
    jQuery('#js-create-product').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('#csrf-token').val()
        }
      });
      jQuery.ajax({
        url: "{{ url('/create-product') }}",
        method: 'post',
        data: {
          name: jQuery('#name').val(),
          quantity_in_stock: jQuery('#quantity_in_stock').val(),
          price_per_item: jQuery('#price_per_item').val()
        },
        success: function(result){
          $('#js-products-table').append(`<tr><td>${result.name}</td><td>${result.quantity_in_stock}</td><td>${result.price_per_item}</td><td>${result.created_at.date}</td><td>${result.price_per_item * result.quantity_in_stock}</td></tr>`)
        }});
    });
  });
</script>
</body>
</html>