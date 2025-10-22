<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #1f3753ff;
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .main {
            margin-top: 5%;
            margin-bottom: 5%;
            gap: 5%;
        }
        .left, .right {
            background-color: #30445aff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 35%;
            height: 70%;
        }
        .right{
            width: 25%;
            height: 70%;
        }
        .left h2, .right h2 {
            color: white;
            margin-bottom: 20px;
        }
        .form-label {
            color: white;
        }
        .form-control {
            background-color: #3b4a5aff;
            border: 1px solid #ccc;
            color: white;
        }
        .form-control::placeholder {
            color: #ccc;
        }
        .btn-primary {
            background-color: #0b88f3;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0a76d1;
        }
        .card {
            background-color: #3b4a5aff;
            color: white;
            border: none;
        }
        .btn-primary {
            background-color: #0b88f3;
            border: none;
            width: 100%;
        }
        .card .btn-primary:hover {
            background-color: #0a76d1;
        }

        .user img {
            width: 50px;
            height: 50px;
        }
        .user span {
            font-size: 14px;
            color: gray;
        }
    </style>
</head>
<body>
<?php include("header.php");?>


    <div class="main d-flex justify-content-center ">
        <div class="left">
            <div class="container mt-5 mb-5 ">   
                <h2>Upload Item</h2>
                <form class="mt-4" action="server.php" method="POST" enctype="multipart/form-data">
                    <div class="user">
                        <img src="https://via.placeholder.com/100"  class="rounded-circle">
                        <span class="ms-2">Max file size is 20mb</span>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="productImage" name="productImage"  accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productname" placeholder="Enter product name">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3" placeholder="Enter product description"></textarea>
                    </div>
                    <div class="mb-3 w-100 d-flex justify-content-between gap-3">
                        <div class=" w-100">
                            <label for="productSize" class="form-label">Size</label>
                            <input type="text" class="form-control" id="productSize" name="productSize" placeholder="Enter size">
                        </div>
                        <div class=" w-100">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter price">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div> 
        
        <div class="right">
            <h2>Preview</h2>
            <div class="container mt-5 mb-5">
                
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/150" class="card-img-top h-100 w-100" alt="Product Image" id="previewImage">
                    <div class="card-body">
                        <h5 class="card-title" id="previewName">Product Name</h5>
                        <p class="card-text" id="previewDescription">Product Description</p>
                        <p class="card-text" id="previewSize">Size: N/A</p>
                        <p class="card-text" id="previewPrice">$0.00</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.php");?>



    <!-- Bootstrap JS (optional, for certain features like dropdowns, tooltips etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    // Preview image
    document.getElementById("productImage").addEventListener("change", function(event) {
        const preview = document.getElementById("previewImage");
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "https://via.placeholder.com/150";
        }
    });

    // Preview text fields
    document.getElementById("productName").addEventListener("input", function() {
        document.getElementById("previewName").textContent = this.value || "Product Name";
    });

    document.getElementById("productDescription").addEventListener("input", function() {
        document.getElementById("previewDescription").textContent = this.value || "Product Description";
    });

    document.getElementById("productSize").addEventListener("input", function() {
        document.getElementById("previewSize").textContent = this.value ? "Size: " + this.value : "Size: N/A";
    });

    document.getElementById("productPrice").addEventListener("input", function() {
        const value = this.value;
        document.getElementById("previewPrice").textContent = value ? "₹" + parseFloat(value).toFixed(2) : "₹0.00";
    });
</script>

</body>
</html>