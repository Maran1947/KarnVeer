<?php
 include 'db/dbconn.php';
if(isset($_POST['submit'])){
   
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$amount = $_POST['amount'];
	$mode = $_POST['mode'];

	$emailquery = "select * from donatemoney where email = '$email' ";
	$query = mysqli_query($con,$emailquery);
	$emailcount = mysqli_num_rows($query);

	if($emailcount > 0){
		?>
        <script>
				alert("Email already exists.");
                location.replace("index.php");
		</script>
		<?php
	} else {
		$insertquery = "insert into donateMoney(name,email,phone,address,amount,paymentmode)
	                 values ('$name', '$email', '$phone', '$address','$amount', '$mode')";
		$res = mysqli_query($con,$insertquery);
	}

	 if($res){
	 	?>
        <script>
                location.replace("index.php");
		</script>
		<?php
	 }
	}
	 	?>
	