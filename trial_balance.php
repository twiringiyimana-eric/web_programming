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
    <title>Journals_entry</title>
    <style>
        h2{text-align:center;}
        input[type=number]{
        width: 10%;
                padding: 8px;
                border: 1px solid #ccc;
      border-radius: 4px;
        }
        form{
        margin-left: 18%;
        }
        button{margin-left:20%;
         width:30%;height:30px;
        background:skyblue;
    border-radius:5rem 0rem;}
    </style>
</head>
<body>
<h2>Trial balance</h2>
<table width="70%" border="1" align="center">
<tr>
<td><b>Account</b></td>
<td><b>Debit</b></td>
<td><b>Credit</b></td>
</tr>


<?php
                $conn=mysqli_connect("localhost","root","");
                mysqli_select_db($conn,"quick");

             
            
            
            $query = "SELECT name,balance,type FROM `accounts`,ledger WHERE accounts.aid=ledger.aid";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
                @$name=$row['name'];
                @$balance=$row['balance'];
                @$type=$row['type'];
             
                ?>
            <tr>
<?php  
if($type=='Assets'|| $type=='Expenses' )
{
    


?>
                <td><?php echo $name; ?></td>
                <td><?php echo $balance; ?></td>
                <td></td>

                <?php

}else{
    ?>
    <td><?php echo $name; ?></td>
   
    <td></td>
 <td><?php echo $balance; ?></td>
    <?php 
}


?>

            </tr>
                <?php
            }
            
            
            ?>

        <tr>
            
        <?php
    $deb = "SELECT sum(debit) as tatal  FROM `jurnal`,`accounts` where accounts.aid=jurnal.aid ";
    $resultd = mysqli_query($conn, $deb);
    while ($row = mysqli_fetch_array($resultd)) {
              $td=$row['tatal'];
    }
    $cr= "select sum(credit) as credits from jurnal,accounts where accounts.aid=jurnal.aid";
    $resultc=mysqli_query($conn,$cr);
    while($row=mysqli_fetch_array($resultc)){
       $tc=$row['credits'];
    }
?>
        <td>Total</td>
        <td><?php echo $td;?></td>
        <td><?php echo $tc;?></td>
        </tr>
</table>



        </body>
        
        </html>
