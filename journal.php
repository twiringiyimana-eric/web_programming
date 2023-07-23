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
<h2>Journals_entry</h2>

<form action="journal.php" method='post'>
    Date<input type="Date" name="date" placeholder="Select Date">
    Debit A/c
    <select name="debita" id="" name="date" style="width:10%;height:30px;">
    <option value="">Select..</option>
            <?php
            
            $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"quick");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT  * FROM accounts";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    ?>
 <option value=<?php echo $row['aid'] ?>><?php echo $row['name'] ?></option>
    <?php
}


?>

           
           
        </select>
        <!-- amount <input type='number' name='da'/> -->



        Credit A/c
    <select name="credita" id="" style="width:10%;height:30px;">
    
       <option value="">Select..</option>
            <?php
            
            $conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"quick");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT  * FROM accounts";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result)) {
    ?>
 <option value=<?php echo $row['aid'] ?>><?php echo $row['name'] ?></option>
    <?php
}


?>

           
           
        </select>
        amount <input type='number' name='ca' required/>
        <br>
        <a href=""><button type="submit" name="submit">Record</button></a>
</form>

<table class="" width="70%" height="auto" border="1" align="center" >
<tr>
    <td>Date</td>
    <td>account</td>
    <td>Debit</td>
    <td>Credit</td>
</tr>

<?php
                $conn=mysqli_connect("localhost","root","");
                mysqli_select_db($conn,"quick");

                $deb = "SELECT sum(debit) as tatal  FROM `jurnal`";
                $resultd = mysqli_query($conn, $deb);
                while ($row = mysqli_fetch_assoc($resultd)) {
                    $td=$row['tatal'];
                }
                // ---------------------------------

                $cq = "SELECT sum(credit) as tatal  FROM `jurnal`";
                $resultc = mysqli_query($conn, $cq);
                while ($row = mysqli_fetch_assoc($resultc)) {
                    $tc=$row['tatal'];
                }
            
            
            $query = "SELECT date,name,debit,credit FROM `jurnal`,accounts WHERE accounts.aid=jurnal.aid";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
                $date=$row['date'];
                $d=$row['debit'];
                $c=$row['credit'];
                if($d==0)
                {
                    $d='';
                }
                if($c==0)
                {
                    $c='';
                }
                ?>
            <tr>
                <td><?php echo $date;?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $d; ?></td>
                <td><?php echo $c; ?></td>
            </tr>
                <?php
            }
            
            
            ?>
            <tr>
    <td colspan='2'><b>Total</b></td>
    
    <td><b><?php echo $td; ?></b></td>
    <td><b><?php echo $tc; ?></b></td>
</tr>
</table>


<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"quick");
$date=Date("m/d/y");
if (isset($_POST['submit'])){
$debita=$_POST['debita'];	
// $da=$_POST['da'];
$dat=$_POST['date'];
$credita=$_POST['credita'];
$ca=$_POST['ca'];
								
$a=mysqli_query($conn,"INSERT INTO `jurnal` (`id`, `date`, `aid`, `debit`, `credit`) 
VALUES (NULL,'$dat','$debita', '$ca', '');");
echo"<script>location.href='journal.php'</script>";

  $c = "SELECT sum(credit) as credits FROM `jurnal` WHERE  jurnal.aid=$debita";
          $resultc = $conn->query($c);
          while($rowc = mysqli_fetch_array($resultc)) {
            $cr=$rowc['credits'];

          }

          $d = "SELECT sum(debit) as debits FROM `jurnal` WHERE  jurnal.aid=$debita";
          $resultd = $conn->query($d);
          while($rowd = mysqli_fetch_array($resultd)) {
            $dr=$rowd['debits'];

          }
          $balance=$dr-$cr;
          if($balance<0)
          {
            $balance=$balance*-1;
          }

          $dx = "UPDATE `ledger` SET `balance` = '$balance' WHERE `ledger`.`aid` =$debita";
         $conn->query($dx); 
 
		 if($a){
            mysqli_query($conn,"INSERT INTO `jurnal` (`id`, `date`, `aid`, `debit`, `credit`) 
                VALUES (NULL,'$dat','$credita', '', '$ca');");

                    $c = "SELECT sum(credit) as credits FROM `jurnal` WHERE  jurnal.aid=$credita";
                    $resultc = $conn->query($c);
                    while($rowc = mysqli_fetch_array($resultc)) {
                    $cr=$rowc['credits'];

                    }

                    $d = "SELECT sum(debit) as debits FROM `jurnal` WHERE  jurnal.aid=$credita";
                    $resultd = $conn->query($d);
                    while($rowd = mysqli_fetch_array($resultd)) {
                    $dr=$rowd['debits'];

                    }
                    $balance=$dr-$cr;
                    if($balance<0)
                    {
                    $balance=$balance*-1;
                    }

                    $dx = "UPDATE `ledger` SET `balance` = '$balance' WHERE `ledger`.`aid` =$credita";
                    $conn->query($dx);


                
                

		 		 	
		   	echo"<script>alert('user successfully inserted')</script>";		
	
		}
		
		else{
					
		   	echo"<script>alert('Try again')</script>";		
	        								
	        }
			
			}
?>

