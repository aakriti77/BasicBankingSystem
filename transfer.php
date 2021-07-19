<?php

$user = 'root';
$password = ''; 
$database = 'bank'; 
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}

if(!isset($_SESSION)) {
        session_start();
    }
	
	$msg="";
	if(isset($_POST['submit']))
	{
		$sqli="INSERT into transfer_details (transfered_from,transfered_to,amount) values(".$_POST['cust_acc_no'].",".$_POST['transfer_to'].",".$_POST['amount'].")";
		if($mysqli->query($sqli))
		{	
             $msg="transfered successfully";
		}
		else
		{
			$msg="Transfer failed";
		}
		
		$sqli="UPDATE customer_details SET current_bal=current_bal-".$_POST['amount']." WHERE account_no=".$_POST['cust_acc_no'];
		$mysqli->query($sqli);
		
		$sqli="UPDATE customer_details SET current_bal=current_bal+".$_POST['amount']." WHERE account_no=".$_POST['transfer_to'];
		$mysqli->query($sqli);
		
		
	} 
    $cid = mysqli_real_escape_string($mysqli, $_GET["ano"]);

    $sql =  "SELECT * FROM customer_details WHERE account_no='".$cid."'";
    $result = $mysqli->query($sql);
	
	$cust_sql = "SELECT * FROM customer_details ORDER BY account_no ASC ";
$cust_result = $mysqli->query($cust_sql);
	//print_r($cust_result); die;
//$sql= "SELECT * FROM customer_details WHERE account_no='2'";
//$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<style>
body  {
  background-image: url("computer_money_transfer.jpg");
  background-color: #cccccc;
  background-size: 1400px 700px;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}table {
			 background-color: #8FBC8F;
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
        th, td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  		td {
            font-weight: lighter;
        }
		.button1 {
		background-color:#8FBC8F;
 		color: black;
 		padding: 15px 32px;
 		text-align: center;
 		font-size: 26px;
		 } 
}
</style>

				
<div class="topnav" >
 <h1 style="color:white;"> EASY TRANSFER  </h1> 
</div>
<p>&nbsp;</p>
<p></p>
<p>&nbsp;</p>
<?php  echo $msg; ?>
 <form action="transfer.php?ano=<?php  echo $_GET['ano']; ?> " method="post">
<table width="718" class="table tabe-hover table-bordered" id="list">
      <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
         <tr>
         <th width="298" height="24" class="text-center">Name</th>
		 <td width="408"><?php echo $rows['name'];?></td>
          </tr>
		  
		 <tr>
         <th width="298" class="text-center">Account Number</th>
		 <td><?php echo $rows['account_no'];?></td>
		 </tr>
		 
		 <tr>
         <th width="298" class="text-center">Current Balance</th>
		 <td><?php echo $rows['current_bal'];?></td>
		 </tr>
		 
         <tr>     
         <th width="298" class="text-center">Transfer To</th>	
         <td>
	
		<select name="transfer_to" width="298px">
		<?php  
                while($cust_rows=$cust_result->fetch_assoc())
                {
				if($rows['account_no']!= $cust_rows['account_no'])
				{
				
				
             ?>
    <option value="<?php echo $cust_rows['account_no']?>"><?php echo $cust_rows['name']?> </option>
  <?php } }?>
		</select>
		 </td>
         </tr>
		 
		 <tr>     
         <th width="298" class="text-center">Amount</th>	
         <td> <input type="number" name="amount" /> </td>
         </tr>
		 <input type="hidden" name="cust_acc_no" value="<?php echo $rows['account_no'] ?>" />
            <?php
                }
             ?>
     
   
</table>

<h1> <button type="submit" class="button button1" name="submit">Transfer </button> 
	<a class="button1 button"href="view_customers.php"> Main Menu </a>
	</h1>
 </form>