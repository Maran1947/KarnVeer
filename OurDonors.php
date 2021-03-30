<?php include('./db/dbconn.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Our Donors</title>
	<link rel="stylesheet" href="./requires/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="./requires/css/donors.css">
</head>
<body>

		<div class="container my-3">
			<h1 class="text-center text-uppercase">Our Donors</h1>
			<div class="text-right"><a href="index.php">Back to Home</a></div>
			<div id="table">
				<h2>Items Donors</h2>
				  <table id="myTable" class="table table-striped table-dark mr-4">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Name</th>
					      <th scope="col">ItemName</th>
					      <th scope="col">ItemQuantity</th>
					    </tr>
					  </thead>
                      <?php
                            $selectquery = "select * from donateitem";
                            $query = mysqli_query($con,$selectquery);
                           $nums = mysqli_num_rows($query);
                            $id = 1;
                           while($res = mysqli_fetch_array($query)){
                      ?>
					  <tbody id="tableBody"> 
                            <tr>
                                <td><?php echo $id++; ?></td>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['itemname']; ?></td>
                                <td><?php echo $res['itemquantity']; ?></td>
                            </tr>
                        <?php             
                            }

                        ?>
                      </tbody>
				</table>

                <h2>Money Donors</h2>
				  <table id="myTable" class="table table-striped table-dark mr-4">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Name</th>
					      <th scope="col">Amount</th>
					      <th scope="col">Mode</th>
					    </tr>
					  </thead>
                      <?php
                            $selectquery = "select * from donatemoney";
                            $query = mysqli_query($con,$selectquery);
                           $nums = mysqli_num_rows($query);
                            $id = 1;
                           while($res = mysqli_fetch_array($query)){
                      ?>
					  <tbody id="tableBody"> 
                            <tr>
                                <td><?php echo $id++; ?></td>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['amount']; ?></td>
                                <td><?php echo $res['paymentmode']; ?></td>
                            </tr>
                        <?php             
                            }
                        ?>
                      </tbody>
				</table>
			</div>
		</div>

	<script src="requires/bootstrap/jquery-3.5.1.min.js"></script>
	<script src="requires/bootstrap/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</body>
</html>