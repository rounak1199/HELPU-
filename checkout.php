<?php 

    include "config.php";
    $EID=$_GET["EID"];
    $empname = "";
    $service =""; 
    $phone = "";
    $rate = "";


    $res=mysqli_query($conn, "select * from emp where EID=$EID");
    while($row=mysqli_fetch_array($res)) {
        $empname = $row["ename"];
        $service = $row["service"];
        $phone = $row["ephone"];
        $rate = $row["rate"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css" >
    <link rel="icon" href="logoSmall.png" type="image/gif" sizes="16x16">
    <title>Cart Checkout</title>
    <style type="text/css">
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}
</style>
</head>
<body>
<div class="card">
    <form action ="" method="POST" enctype="multipart/form-data">
     <button type='submit' name="submit" class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
  </svg></button>
     <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
   <label>Card number:</label>
   <input id="user" type="text" name="cardnumber" class="input cardnumber"  placeholder="1234 5678 9101 1121">
   <label>Name:</label>
   <input class="input name" name="cardholder" placeholder="Card Holder Name">
   <label class="toleft">CVV:</label>
   <input class="input toleft ccv" name="cvv" placeholder="321"> <br><br>
   <label style="color: orange;" id="emptyCard"></label>

</div>


<form action="" method="post" enctype="multipart/form-data">
    <div class="receipt">
      <div class="col"><p>Cost:</p>
      <h2 class="cost"> ₹<?php echo (round($rate*0.18 + $rate)) ?></h2><br>
      <p>Serviceman Name:</p>
      <h2 class="seller"><?php echo $empname ?></h2>
      <h2 class="seller"><?php echo $phone ?></h2>
      </div>
      <div class="col">
        <p>Hired Service</p>
        <h3 class="bought-items"><?php echo $service ?></h3>
        <p class="bought-items price">18% GST amount applied</p><br>
        <br><br>
      </div>
      <p class="comprobe">Please proceed by entering card details.</p>         
    </div>


    <input style="color:#3a7bd5" name='empname' type='text' value="<?php echo $empname ?>">
    <input style="color:#3a7bd5"name='rate' type='number' value="<?php echo round($rate*0.18 + $rate) ?>">
    <input style="color:#3a7bd5"type="text" name="service" value="<?php echo $service ?>" >
    <!-- <input type='submit' name="submit" value='Insert'> -->  
    <div class="form-style-5">
    
        <fieldset>
        <legend><span class="number">1</span> Please Provide your information</legend>
        <input type="text" name="field1" placeholder="Complete Address *">
        <input type="text" name="field1" placeholder="Phone number *">
        <input type="email" name="field2" placeholder="Your Email *">
        
    </form>
    </div>
</body>

<?php 
 
    if(isset($_POST["submit"])) {
        $fullempname = $_POST['empname'];
        $servicePrice = $_POST['rate'];
        $serviceName = $_POST['service'];
        
        
        $date = date('Y-m-d H:i:s');
        mysqli_query($conn, "INSERT INTO `transactions`(`ename`,`service`,`rate`,`date`) VALUES ('$fullempname', '$serviceName', '$servicePrice', '$date')");       
        ?>

        <script type="text/javascript">
            window.location="confirmation.php";
        </script>
        <?php 
        
    }

?>


</html>