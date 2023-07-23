<?php
			
			session_start();
			
			if (!isset($_SESSION['username'])){
			header('location:index.php');
			}
			//
			?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>balance</title>
    <style>

        table{

        }
    </style>
</head>
<body>
    <h1 align="center">Balance sheet</h1>
    <table width="80%" align="center" border="1">
<tr>

<td>Assets</td>
<td align="center">Liability</td>
</tr>
<tr>

<td>
    <table width="100%">


  
<?php
                $conn=mysqli_connect("localhost","root","");
                mysqli_select_db($conn,"quick");

             
            
            
            $query = "SELECT name,balance,type FROM `accounts`,ledger WHERE accounts.aid=ledger.aid";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            while ($row = mysqli_fetch_array($result)) {
                @$name=$row['name'];
                @$balance=$row['balance'];
                @$type=$row['type'];
                if($balance==0){
                    $balance='';
                    $name='';
                }
             
                ?>
            <tr>
<?php  
if($type=='Assets')
{
    


?>
                <td><?php echo $name; ?></td>
                <td><?php echo $balance; ?></td>
                

                <?php

}

?>

            </tr>
                <?php
            }
            
            
            ?>

<!-- <td colspan="2">Total</td> -->
    </table>

</td>
<td align="center">
<table width="100%">

<tr>

<?php
                $conn=mysqli_connect("localhost","root","");
                mysqli_select_db($conn,"quick");

             
            
            
            $query = "SELECT name,balance,type FROM `accounts`,ledger WHERE accounts.aid=ledger.aid";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            while ($row = mysqli_fetch_array($result)) {
                @$name=$row['name'];
                @$balance=$row['balance'];
                @$type=$row['type'];
             
                ?>
            <tr>
<?php  
if($type=='Liability'||$type=='Equity')
{
    


?>
                <td><?php echo $name; ?></td>
                <td><?php echo $balance; ?></td>
                

                <?php

}

?>

            </tr>
                <?php
            }
            
            
            ?>
</tr>


</table>

</td>
</tr>
<tr>
<td align="center">
  <table width="100%">
<tr>
<td><b>Total</b></td>
<td><b>
<?php
    $deb = "SELECT sum(balance) as tatal  FROM `ledger`,`accounts` where accounts.aid=ledger.aid and accounts.type='Assets' ";
    $resultd = mysqli_query($conn, $deb);
    while ($row = mysqli_fetch_array($resultd)) {
        echo $td=$row['tatal'];
    }

?>
</b>
</td>

</tr>
  </table>

</td>
<td align="center">
  <table width="100%">
<tr>
<td><b>Total</b></td>
<td>
    <b>
<?php
    $deb = "SELECT sum(balance) as tatal  FROM `ledger`,`accounts` where accounts.aid=ledger.aid and accounts.type='Liability' ";
    $resultd = mysqli_query($conn, $deb);
    while ($row = mysqli_fetch_array($resultd)) {
        echo $td=$row['tatal'];
    }

?></b>
</td>

</tr>
  </table>

</td>
</tr>


    </table>
</body>
</html>