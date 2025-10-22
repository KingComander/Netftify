<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<style>
    .nav ul li a{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        list-style: none;
        font-weight: 700;
        color: gray;
    }
    .header{
        background-color: #253649;
    }
    .logo{
        color: #0b88f3;
        font-weight: 900;
    }
    .icon{
        color: yellow;
    }
    .nav ul li a:hover{
        color: white;
    }
  
</style>

<header class="header d-flex justify-content-around align-items-center p-3"> 
    <div class="logo"><a href="#" class="text-decoration-none">Netftify</a></div>
    <div class="nav">
        <ul class=" d-flex justify-content-around align-items-center list-unstyled m-0 p-0 gap-4">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Item</a></li>
            <li><a href="collection.php">Collection</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="Upload.php">Upload</a></li>
            <li><a href="#">Dashbord</a></li>
        </ul>
    </div>
    <div>
        <i class="fa-solid fa-sun icon"></i>
        <button class="bg-info text-white border-0 rounded p-1 ">Connect</button>
    </div>
</header>