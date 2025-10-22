<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css">

<style>
    body {
        background-color: #1f3753ff;
        color: white;
        font-family: Arial, sans-serif;
    } 
    .card {
        background-color: #30445aff;
        border: none;
        border-radius: 10px;
        color: white;
    }
    
</style>

<?php include("header.php");?>

<?php include("DBcon.php");
$result = $db->query("SELECT * FROM products");


while ($row = $result->fetch_assoc()) {
    $imageData = base64_encode($row['productImage']);
    echo '
    <div class="card" style="width: 18rem; display: inline-block; margin: 10px;">
      <img src="data:image/jpeg;base64,' . $imageData . '" class="card-img-top" alt="' . htmlspecialchars($row['productname']) . '">
      <div class="card-body">
        <h5 class="card-title">' . htmlspecialchars($row['productname']) . '</h5>
        <p class="card-text">' . htmlspecialchars($row['productDescription']) . '</p>
        <p class="card-text">Size: ' . htmlspecialchars($row['productSize']) . '</p> 
        <p class="card-text">Price: ₹' . number_format($row['productPrice'], 2) . '</p>    
      </div>
    </div>
    ';
}
?>

<!-- <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->


<?php include("footer.php");?>