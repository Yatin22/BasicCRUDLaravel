<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add any custom styles here */
        /* For example: 
        body {
            font-family: Arial, sans-serif;
        }
        */
    </style>
</head>

<body>
        
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Add New Product</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Product Listing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>
            {{$message}}
        </strong>
    </div>
@endif
    <!-- Add New Product Form -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="/product/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product-name">Product Name:</label>
                        <input type="text" class="form-control" id="product-name" name="pr_name" 
                        value="{{ old('pr_name') }}"
                        >
                        @if($errors->has('pr_name'))
                        <span style="color:red">{{$errors->first('pr_name')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="product-description">Product Description:</label>
                        <textarea class="form-control" id="product-description" name="pr_desc" rows="4" 
                        
                        >{{old('pr_desc')}}</textarea>
                        @if($errors->has('pr_desc'))
                        <span style="color:red">{{$errors->first('pr_desc')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="product-image">Product Image:</label>
                        <input type="file" name="pr_image" class="form-control" id="product-image" value="{{ old('pr_image') }}"
                        >
                        @if($errors->has('pr_image'))
                        <span style="color:red">{{$errors->first('pr_image')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="product-price">Product Price:</label>
                        <input type="number" name="pr_price" class="form-control" id="product-price" value="{{ old('pr_price') }}"
                        >
                        @if($errors->has('pr_price'))
                        <span style="color:red">{{$errors->first('pr_price')}}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (place at the end of the body for faster loading) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
