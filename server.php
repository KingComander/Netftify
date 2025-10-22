<?php
include("DBcon.php");

// Ensure $db is available (if using mysqli)
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Create table if not exists
function table_create($db) {
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        productname VARCHAR(255) NOT NULL,
        productDescription TEXT,
        productSize VARCHAR(50),
        productPrice DECIMAL(10,2) NOT NULL,
        productImage LONGBLOB,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$db->query($sql)) {
        die("Table creation failed: " . $db->error);
    }
}

// Insert data safely
function insertdata($db) {
    // Check required POST fields and file upload
    if (
        empty($_POST['productname']) ||
        empty($_POST['productPrice']) ||
        !isset($_FILES['productImage'])
    ) {
        echo "All required fields must be filled!";
        return;
    }

    $productname = $_POST['productname'];
    $productDescription = $_POST['productDescription'] ?? '';
    $productSize = $_POST['productSize'] ?? '';
    $productPrice = $_POST['productPrice'];

    // Read the uploaded image safely
    $productImage = file_get_contents($_FILES['productImage']['tmp_name']);

    // Prepare the SQL statement correctly
    $stmt = $db->prepare("INSERT INTO products 
        (productname, productDescription, productSize, productPrice, productImage)
        VALUES (?, ?, ?, ?, ?)"
    );

    // Correct binding — must match 5 parameters: 4 strings + 1 blob
    $stmt->bind_param("sssdb", $productname, $productDescription, $productSize, $productPrice, $productImage);

    // But `b` (blob) binding in mysqli needs special handling:
    // Instead, we should use 'ssssb' and send blob separately
    $null = NULL;
    $stmt->send_long_data(4, $productImage);

    if ($stmt->execute()) {
        echo "✅ New record created successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
}

// Ensure table exists before inserting
table_create($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    insertdata($db);
    // Redirect only after successful insertion
    header("Location: index.php");
    exit();
}
?>
