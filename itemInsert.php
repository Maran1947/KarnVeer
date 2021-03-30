<?php
 $err="";
 include 'db/dbconn.php';
if(isset($_POST['submit'])){
   
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$itemName = $_POST['itemName'];
	$itemDescription = $_POST['itemDescription'];
	$itemQuantity = $_POST['itemQuantity'];

	$emailquery = "select * from donateitem where email = '$email' ";
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
		$insertquery = "insert into donateitem(name,email,phone,address,itemname,itemdescription,itemquantity)
	                 values ('$name', '$email','$phone','$address', '$itemName', '$itemDescription', '$itemQuantity')";
		$res = mysqli_query($con,$insertquery);
	}
	 if($res){
	 	?>
        <script>
                // location.replace("index.php");
		</script>
		<?php
	 } 
	}
	?>