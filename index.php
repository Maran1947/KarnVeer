<?php
    include 'db/dbconn.php';

	$selectquery = "select * from donateitem";
	$query = mysqli_query($con,$selectquery);
	$nums = mysqli_num_rows($query);

    $totalItem = 0;
	while($res = mysqli_fetch_array($query)){
        $totalItem += $res['itemquantity'];
    }

    $selectMoneyQuery = "select * from donateMoney";
    $query = mysqli_query($con, $selectMoneyQuery);
    $nums = mysqli_num_rows($query);

    $totalAmount = 0;
    while($res = mysqli_fetch_array($query)) {
        $totalAmount += $res['amount'];
    }
    $s = "";
    if($totalAmount>=1000 && $totalAmount <= 100000) {
        $totalAmount /= 1000;
        $s = "K+";
    } else if($totalAmount >= 1000000 && $totalAmount <= 1000000000) {
        $totalAmount /= 1000000;
        $s = "M+";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karnveer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="requires/css/styles.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel = "stylesheet" href="requires/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="hero-bg" id="hero">
        <header>
            <ul id="navList">
                <!-- <li><a data-toggle="modal" id="LoginButton" data-target="#loginModal">Login</a></li> -->
                <li><a href="#aboutUs">About us</a></li>
                <li><a href="./OurDonors.php">Our Donors</a></li>
                <li><a href="#donate">Donate</a></li>
                <li><a href="#hero">Home</a></li>
            </ul>
        </header>

        <div class="hero-text">
            <h1>Economic growth must be inclusive to provide sustainable jobs and promote equality...</h1>
        </div>
    </div>

    <div id="itemModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="content">
            <!--Donate Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Donate Item</h4>
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    <form action="./itemInsert.php" method="POST">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone no." required>
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                        </div>
                        <div class="form-group">
                            <label for="">Item Name:</label>
                            <input type="text" name="itemName" class="form-control" placeholder="Enter item name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Item description:</label>
                            <input type="text" name="itemDescription" class="form-control" placeholder="Give a short decription about item" required>
                        </div>
                        <div class="form-group">
                            <label for="">Item Quantity:</label>
                            <input type="number" name="itemQuantity" class="form-control" placeholder="Enter item quantity" required>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-success btn-secondary btn-sm ml-auto" name="submit">Submit</button>                                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="moneyModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="content">
            <!--Donate Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Donate Money</h4>
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    <form action="./moneyInsert.php" method="POST">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                        </div>
                        <div class="form-group">
                            <label for="">Amount:</label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter amount" required>
                        </div>
                        <div class="form-group">
                            <label for="">Payment Mode:</label>
                            <input type="text" name="mode" class="form-control" placeholder="Online/Offline" required>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="submit" class="btn btn-success btn-secondary btn-sm ml-auto">Submit</button>                                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="donateModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="content">
            <!--Donate Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Donate</h4>
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-4 text-center">
                                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#moneyModal" class="btn btn-sm ml-auto text-white bg-dark">Money</button>
                            </div>
                            <div class="form-group col-sm-4 text-center">
                                <h5>What you want to donate.</h5>
                            </div>
                            <div class="form-group col-sm-4 text-center">
                                <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#itemModal" class="btn btn-sm ml-auto text-white bg-dark">Items</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>                                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="grey" id="donate">
        <div class="donate-row">
            <div class="badge-left text-center">
                <h4 class="mt-5"><?php echo round($totalAmount); echo $s;?></h4>
                <div class="badge-rect mt-4 text-center"> 
                    <h3>Money</h3>
                </div>
            </div>
            <div class="">
                <div class="big-btn">
                    <button data-toggle="modal" id="button1" data-target="#donateModal">
                        <span>
                            <p>Donate</p>
                        </span>
                    </button>
                </div>
            </div>
            <div class="badge-right text-center">
                <h4 class="mt-5"><?php echo $totalItem; ?></h4>
                <div class="badge-rect mt-4 text-center">
                    <div class="text-center">
                        <h4>Items</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="karn" id="aboutUs">
            <h1>KARN connects the donors directly to the people who needed or were a victim of a tragedy. We use
                business strategies to secure their today
                and tomorrow.</h1>
        </div>
        <div class="sm-btn">
            <a href="#" id="button2">
                <span>
                    <p>Learn More</p>
                </span>
            </a>
        </div>
        <div class="black">
            <div class="how">
                <h1>How It Works</h1>
            </div>
            <div class="p1">
                <p>People can donate any amount of money or any item anonymously.</p>
            </div>
            <div class="p2">
                <p>The total collected money will be split into two parts where 86% will be donated and remaining 14%
                    will
                    be invested.</p>
            </div>
            <div class="p1">
                <p>The collected items will be sold to poor peoples
                    at a reasonable price in consideration of the item.</p>
            </div>
            <div class="p2">
                <p>The money we get from selling the items will
                    be donated for the education of the poor
                    childrens.</p>
            </div>
            <div class="p1">
                <p>The 14% money is invested to make their
                    future economically secure.</p>
            </div>
        </div>
    </div>

    <!-- <footer id="footer">

    </footer> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> -->

    <script src="requires/bootstrap/jquery-3.5.1.min.js"></script>
    <script src="requires/bootstrap/bootstrap.min.js"></script>
    <script src="requires/script/script.js"></script>
</body>
</html>