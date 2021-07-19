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
    $cid = mysqli_real_escape_string($mysqli, $_POST["ano"]);

    $sql =  "SELECT * FROM customer_details WHERE account_no='".$cid."'";
    $result = $mysqli->query($sql);
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
            color: #A7C7E7;
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


<table width="718" class="table tabe-hover table-bordered" id="list">
      <?php  
                while($rows=$result->fetch_assoc())
				
                {
				$ano=$rows['account_no'];
             ?>
         <tr>
         <th width="298" height="24" class="text-center">Name</th>
		 <td width="408"><?php echo $rows['name'];?></td>
          </tr>
		  
		 <tr>
         <th width="298" class="text-center">Email</th>
		 <td><?php echo $rows['email'];?></td>
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
         <th width="298" class="text-center">Address</th>	
         <td><?php echo $rows['address'];?></td>
         </tr>
		
            <?php
                }
             ?>
     
   
</table>


 
                    <div class="flex-item">
                      <h1>  <a class="button1 button"href="transfer.php?ano=<?php echo $ano ?>"> Transfer Money</a> </h1>
                    </div>
          

 