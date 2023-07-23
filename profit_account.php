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
    <title>A/C</title>
    <style>
        h1{text-align:center;}
    </style>
</head>

<body>
    <?php
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"quick");
   $expenses="select sum(balance) as total from ledger,accounts WHERE ledger.aid=accounts.aid and type='Expenses';
                   ";
                   $result = $conn->query($expenses);
                   while($rowd = mysqli_fetch_array($result)) {
                   $dr=$rowd['total'];
                    
               
     
                   }
                   $income="select sum(balance) as total from ledger,accounts WHERE ledger.aid=accounts.aid and type='Income';
                   ";
                   $result = $conn->query($income);
                   while($row = mysqli_fetch_array($result)) {
                   $d=$row['total'];
   
                
                   }

                 $invent="select sum(balance) as total from ledger,accounts WHERE ledger.aid =accounts.aid and type='Inventory'";
                  $result=$conn->query($invent);
                  while($row=mysqli_fetch_array($result)){
                    $in=$row['total'];
                  }
                  $gross=$d-$in;
                   $net=$gross-$dr;
                   
                   ?>
    
    <h1>Profit & Loss A/c</h1>
    
    <table width="80%" border="1" align="center" background="gray">
    <td  colspan="2">Income
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
if($type=='Income')
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

            </td>
         <td><b>Gross profit</b></td><td><b><?php echo $gross ;?></b></td>
         <tr>
         <td width="50%" colspan="2">Expanses</td>
           
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
if($type=='Expenses')
{
    


?>
                <td width="30%"><?php echo $name; ?></td>
                <td><?php echo $balance; ?></td>
                

                <?php

}

?>
<?php
            }
?>
<?php
 $conn=mysqli_connect("localhost","root","");
 mysqli_select_db($conn,"quick");
$expenses="select sum(balance) as total from ledger,accounts WHERE ledger.aid=accounts.aid and type='Expenses';
                ";
                $result = $conn->query($expenses);
                while($rowd = mysqli_fetch_array($result)) {
                $dr=$rowd['total'];
                 
            
  
                }
                $income="select sum(balance) as total from ledger,accounts WHERE ledger.aid=accounts.aid and type='Income';
                ";
                $result = $conn->query($income);
                while($row = mysqli_fetch_array($result)) {
                $d=$row['total'];

             
                }
                $invent="select sum(balance) as total from ledger,accounts WHERE ledger.aid =accounts.aid and type='Inventory'";
                  $result=$conn->query($invent);
                  while($row=mysqli_fetch_array($result)){
                    $in=$row['total'];
                  }
                  $gross=$d-$in;
                   $net=$gross-$dr;
                   
              
                
                ?>
                <td><b>Net profit/Net loss</b></td><td><b><?php echo $net;?></b></td>
        </tr>

     </tr>
    
    </table>
    
</body>
</html>