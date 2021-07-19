
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
$sql = "SELECT * FROM customer_details ORDER BY account_no ASC ";
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
}
table {
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
		th {
            background-color: #8FBC8F;
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
		.button {
   border: 1px solid black;
  color: black;
  text-align: center;
  display: inline-block;
  font-size: 26px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #cccccc;
 height: 40px; 
width: 200px; 
}
</style>
<div class="topnav" >
 <h1 style="color:white;"> EASY TRANSFER  </h1> 
</div>
 <div class="flex-item">
                       
                    </div>

<div class="card-body">

   <p>&nbsp;</p>
   <table width="807" class="table tabe-hover table-bordered" id="list">
     <thead>
      
	   <tr>
         <th height="34" colspan="4" class="text-center">
	
		  <form action="customer.php" method="post">
                    <div class="flex-item-login">
                        <h2></h2>
                    </div>
                    <div class="flex-item">
                        <input type="integer" name="ano" placeholder="Enter Account Number"  required>
            </div>

                    <div class="flex-item">
                      <button class="button" type="submit">View Details</button>
            </div>
           </form>		  </th>
       </tr>
      
	  
	   <tr>
         <th width="199" height="24" class="text-center">Name</th>
         <th width="208" class="text-center">Email</th>
         <th width="186" class="text-center">Account Number</th>
         <th width="186" class="text-center">Balance</th>
      </tr>
     </thead>
     <tbody>
       <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
               
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['account_no'];?></td>
                <td><?php echo $rows['current_bal'];?></td>
                 
           <?php
                }
             ?>
     </tbody>
   </table>
</div>
