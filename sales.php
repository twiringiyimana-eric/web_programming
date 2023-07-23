  

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales</title>
    <style>
        <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 5px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: rgb(128, 131, 132);
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #45a049;
    }
   
  </style>
    </style>
</head>
<body>
<div class="container">
    <h2>Sells Form</h2>
    <form action="purchase.php" method="POST">
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="birthday" name="date" required>
      </div>
      <div class="form-group">
        <label for="username">Product<br>
        <select name="debita" id="" style="width:100%;height:30px;">
    <option value="">Select..</option>
            <?php
            
            $conn=mysqli_connect("localhost","root","");
              mysqli_select_db($conn,"quick");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT product FROM items where items.pid=pid";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result)) {
        $pr=$row['product'];
    ?>
 <option value=<?php echo $pr;?>></option>
    <?php
}


?>          
           
        </select>
            
    </label>
        

             <div class="form-group">
        <label for="username">Quantity</label>
        <input type="text" id="quantity" name="quantity" required>
             </div>
             <div class="form-group">
        <label for="username">Price</label>
        <input type="text" id="quantity" name="price" required>
             </div>
             <div class="form-group">
        <label for="username">Customers</label>
        <select name="" id="" name="supplier"style="width:99%;height:7%;">
      <option value="kamana">kamana</option>
      <option value="karekezi">karekezi</option>
        </select>
             </div>
     
      <div class="form-group">
        <button type="submit" name="submit">Purchase</button>
      </div>
    </form>
  </div>
</body>
</html>
<!-- create account and ledger -->
<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"quick");

if (isset($_POST['submit'])){
$date=$_POST['date'];	
$product=$_POST['product'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$amt=$quantity*$price;						
$a=mysqli_query($conn,"INSERT INTO items VALUES ('','$date','$product','$quantity','$price','$amt')"); 
                
}?>
		


    
