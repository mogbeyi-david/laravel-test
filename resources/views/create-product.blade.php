<html>
<head></head>
<body>
<form method="post" action="{{ URL::route('create-product') }}">
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
</body>
</html>