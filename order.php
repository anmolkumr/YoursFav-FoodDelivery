
<?php
require_once 'config.php';
$fname = $lname = $username = $phone =  $addr1 = $addr2 = $city = $postalpin = $country =
 $state = $adate = $r1 = $r2 = $r3 = $r4 = $r5 = $r6 = $d1 = $d2 =  $d3 = $d4 = $d5 = $v1 = $v2 = $v3 = $v4 = $n1 = $n2 = $n3 =
  $n4 = $n5 = $ad1 = $ad2 = $ad3 = $ad4 = "";

  $fnameErr = $lnameErr = $usernameErr = $phoneErr =  $addr1Err = $addr2Err = $cityErr = $postalpinErr = $countryErr =
 $stateErr = $adateErr = $r1Err = $r2Err = $r3Err = $r4Err = $r5Err = $r6Err = $d1Err = $d2Err =  $d3Err = $d4Err = $d5Err = $v1Err = $v2Err = $v3Err = $v4Err = $n1Err = $n2Err = $n3Err =
  $n4Err = $n5Err = $ad1Err = $ad2Err = $ad3Err = $ad4Err = "";

  // Initialize the session
  session_start();

  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  }

if($_SERVER["REQUEST_METHOD"] == "POST")
{
   if(empty($_POST["fname"]))
      {
        $fnameErr = "Give First Name";
      }
    else {
      $fname =  test_input($_POST["fname"]);
      if(!preg_match("/^[a-zA-Z ]*$/",$fname))
      {
        $fnameErr = "Only letters and Space is Allowed";
      }
      }
      if(empty($_POST["lname"]))
         {
           $lnameErr = "Give Last Name";
         }
       else {
         $lname =  test_input($_POST["lname"]);
         if(!preg_match("/^[a-zA-Z ]*$/",$lname))
         {
           $lnameErr = "Only letters and Space is Allowed";
         }
         }

         if (empty($_POST["username"])) {
         $usernameErr = "Email is Required";
         }
         else {
         $username = test_input($_POST["username"]);
         }

      if (empty($_POST["phone"])) {
        $phoneErr = "Phone is Required";
      }
      else if(!is_numeric(test_input($_POST["phone"]))) {
      $phoneErr = "Data entered was not numeric";
  } else if(strlen(test_input($_POST["phone"])) != 10) {
      $phoneErr = "The number entered was not 10 digits long";
  }else {
    $phone = test_input($_POST["phone"]);
    }
      if (empty($_POST["adate"])) {
        $adateErr = "Date is Mandatory";
  }

  else {
    $adate = test_input($_POST["adate"]);
  }


    if (empty($_POST["addr1"])) {
    $addr1Err = "Address Line 1 is Required";
    }
    else {
    $addr1 = test_input($_POST["addr1"]);
    }

    if (empty($_POST["addr2"])) {
    $addr2Err = "Address Line 2 is Required";
    }
    else {
    $addr2 = test_input($_POST["addr2"]);
    }

    if (empty($_POST["city"])) {
    $cityErr = "City is Required";
    }
    else {
    $city = test_input($_POST["city"]);
    }

    if (empty($_POST["pin"])) {
    $postalpinErr = "PIN is Required";
    }
    else {
    $postalpin = test_input($_POST["pin"]);
    }

    if (empty($_POST["country"])) {
    $countryErr = "Country is Required";
    }
    else {
    $country = test_input($_POST["country"]);
    }

    if (empty($_POST["state"])) {
    $stateErr = "state is Required";
    }
    else {
    $state = test_input($_POST["state"]);
    }
    $r1 = test_input($_POST["rice1"]);

    $r2 = test_input($_POST["rice2"]);

    $r3 = test_input($_POST["rice3"]);

    $r4 = test_input($_POST["rice4"]);

    $r5 = test_input($_POST["rice5"]);

    $r6 = test_input($_POST["rice6"]);

    $d1 = test_input($_POST["dal1"]);

    $d2 = test_input($_POST["dal2"]);

    $d3 = test_input($_POST["dal3"]);

    $d4 = test_input($_POST["dal4"]);

    $d5 = test_input($_POST["dal5"]);

    $v1 = test_input($_POST["veg1"]);

    $v2 = test_input($_POST["veg2"]);

    $v3 = test_input($_POST["veg3"]);

    $v4 = test_input($_POST["veg4"]);

    $n1 = test_input($_POST["nv1"]);

    $n2 = test_input($_POST["nv2"]);

    $n3 = test_input($_POST["nv3"]);

    $n4 = test_input($_POST["nv4"]);

    $n5 = test_input($_POST["nv5"]);

    $ad1 = test_input($_POST["addn1"]);

    $ad2 = test_input($_POST["addn2"]);

    $ad3 = test_input($_POST["addn3"]);

    $ad4 = test_input($_POST["addn4"]);




  if(empty($fnameErr) && empty($lnameErr) && empty($usernameErr) && empty($phoneErr) && empty($addr1Err) && empty($addr2Err) && empty($cityErr) && empty($postalpinErr) && empty($countryErr) && empty($stateErr))
  {

    $sql = "INSERT INTO new_order_order (fname,lname,username,phone,addr1,addr2,city,postalpin,country,state,date,rice1,rice2,rice3,rice4,rice5,rice6,dal1,dal2,dal3,dal4,dal5,veg1,veg2,veg3,veg4,nv1,nv2,nv3,nv4,nv5,addn1,addn2,addn3,addn4) VALUES ('$fname','$lname','$username','$phone','$addr1','$addr2', '$city','$postalpin','$country','$state','$adate','$r1','$r2','$r3','$r4','$r5','$r6','$d1','$d2','$d3','$d4','$d5','$v1','$v2','$v3','$v4','$n1','$n2','$n3','$n4','$n5','$ad1','$ad2','$ad3','$ad4')";

    if ($conn->query($sql) === TRUE) {
        header("location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

}
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Orders | YOURSfav - Best Online Food Delivery in Patna</title>

    <script src="material.min.js"></script>
    <link rel="stylesheet" href="material.css">
    <script langauage = "javascript">
       function showMessage(value) {
          document.getElementById("message").innerHTML = value;
       }
    </script>
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
    <div class="header-back">


    <div class="head2"><div style="font-size:18px;cursor:pointer;float:left;color:#fff;" onclick="openNav()">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
  </div>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="index.html">Home</a>
  <a href="order.php">Book an Order</a>
  <a href="gallery.html">Gallery</a>
  <a href="about.html">About Us</a>
  <a href="contactus.html">Contact Us</a>

  </div>
  <div class="share-btn">
  <a href="#"><i class="fa fa-facebook"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-phone"></i></a>
  <a href="#"><i class="fa fa-whatsapp"></i></a>

</div>
<div class="yours-name">
  <h1>
    <a href="index.html">&nbsp;YOURSfav<span></span></a>
  </h1>
    <H5 style="color:#cdf1bb;font-family: 'Kanit', sans-serif;text-align:center;">Healthy Food, Happy Life!</H5>

</div>
<br><br>
<div class="logo-img">
  <img src="./images/t1.gif" alt="logo">
</div><br>
<div class="heading">
<h2><i class="fa fa-phone" aria-hidden="true"style="color:#fff;"></i><a href="tel:8969953602"style="text-decoration:none;color:#7af1bb;">+91 8969953602</a></h2
  <br>
<p style="color:#fff;">We are Commited Provide you the Best Quality Foods</p>
<br><br>
<h3><span></span></h3>

</div>
</div>
    <?php

    require_once 'config.php';
    $a = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$a'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $GLOBALS['lname'] = $row['lname'];
                  $GLOBALS['phone'] = $row['phone'];
                echo "<h3 class='mycent'>Welcome ".$GLOBALS['fnamee'] = $row['fname'];echo ", Please Fill up the form for Registration </h3>";
            }
        } else {
            echo "0 results";
        }
    ?>
    <div class="mycent">
    <form class="" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
      <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
         <input class = "mdl-textfield__input" type = "text" name="fname" id="text4" value="<?php echo $fnamee;?>"
         pattern = "-?^[a-zA-Z ]*?">
         <label class = "mdl-textfield__label" for = "text4">First Name</label>
         <span class = "mdl-textfield__error">Name Should only contain letters</span>

      </div><br>
      <span class = "error"><?php echo $fnameErr;?> </span>
      <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input  class = "mdl-textfield__input" type="text" name="lname"
     value="<?php echo $lname;?>"pattern = "-?^[a-zA-Z ]*?">
     <label class = "mdl-textfield__label" for = "text4">Last Name</label>
     <span class = "mdl-textfield__error">Name Should only contain letters</span>
  </div>
  <span class="error"><?php echo $lnameErr;?> </span>
  <br>
  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>"placeholder="Username">
  <label class = "mdl-textfield__label" for = "text4">Username</label>
</div>
  <span class="error"><?php echo $usernameErr;?> </span>
  <br>
  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="phone"
   value="<?php echo $phone;?>"pattern = "-?[0-9]*(\.[0-9]+)?">
   <label class = "mdl-textfield__label" for = "text4">Phone</label>
   <span class = "mdl-textfield__error">Phone Should only contain Digits</span>
</div>
  <span class="error"><?php echo $phoneErr;?> </span>
  <br> <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="addr1"
   value="<?php echo $addr1;?>">
   <label class = "mdl-textfield__label" for = "text4">Address Line 1</label>

</div>
  <span class="error"><?php echo $addr2Err;?> </span>
  <br> <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="addr2"
   value="<?php echo $addr2;?>">
   <label class = "mdl-textfield__label" for = "text4">Address Line 2</label>

</div>
<span class="error"><?php echo $addr2Err;?> </span>
  <br>
  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="city"
   value="<?php echo $city;?>">
   <label class = "mdl-textfield__label" for = "text4">City</label>

</div>
<span class="error"><?php echo $cityErr;?> </span>

  <br><div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="pin"
   value="<?php echo $postalpin;?>"pattern = "-?[0-9]*(\.[0-9]+)?">
   <label class = "mdl-textfield__label" for = "text4">PIN code</label>
   <span class = "mdl-textfield__error">PIN Should only contain Digits</span>
</div>
<span class="error"><?php echo $postalpinErr;?> </span>
  <br>
  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="country"
   value="<?php echo $country;?>">
   <label class = "mdl-textfield__label" for = "text4">Country</label>

</div>
<span class="error"><?php echo $countryErr;?> </span>
  <br>
  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input  class = "mdl-textfield__input" type="text" name="state"
   value="<?php echo $state;?>">
   <label class = "mdl-textfield__label" for = "text4">State</label>

</div>
<span class="error"><?php echo $stateErr;?> </span>
  <br>
  <input type="date" name="adate" value="<?php echo $adate;?>"> <br>
  <span class="error"><?php echo $adateErr;?> </span>


<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r1.jpg" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox1">
         <input type = "checkbox" id = "checkbox1" class = "mdl-checkbox__input"name="rice1" value="prak">
         <span class = "mdl-checkbox__label">Rice1</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r2.jpg" style="width:100%">
  <div class="w3-container">
  <br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox2">
         <input type = "checkbox" id = "checkbox2" class = "mdl-checkbox__input"name="rice2" value="bamati">
         <span class = "mdl-checkbox__label">Rice2</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r3.jpg" style="width:100%">
  <div class="w3-container">
  <br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox3">
         <input type = "checkbox" id = "checkbox3" class = "mdl-checkbox__input"name="rice3" value="lorem">
         <span class = "mdl-checkbox__label">Single</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r4.jpg" style="width:100%">
  <div class="w3-container">
  <br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox4">
         <input type = "checkbox" id = "checkbox4" class = "mdl-checkbox__input"name="rice4" value="prateyeyk">
         <span class = "mdl-checkbox__label">rice4</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r2.jpg" style="width:100%">
  <div class="w3-container">
    <br>
<h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox5">
         <input type = "checkbox" id = "checkbox5" class = "mdl-checkbox__input"name="rice5" value="praerek">
         <span class = "mdl-checkbox__label">rice5</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/r4.jpg" style="width:100%">
  <div class="w3-container">
    <br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox6">
         <input type = "checkbox" id = "checkbox6" class = "mdl-checkbox__input"name="rice6" value="pdedrak">
         <span class = "mdl-checkbox__label">Single</span>
      </label>
    </h5>

  </div>
  </div>
  </div>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/d1.jpg" style="width:100%">
  <div class="w3-container"><br>
<h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox7">
         <input type = "checkbox" id = "checkbox7" class = "mdl-checkbox__input"name="dal1" value="prak">
         <span class = "mdl-checkbox__label">dal1</span>
      </label>
    </h5>
  </div>
  </div>
  </div>


  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/d2.jpg" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox8">
         <input type = "checkbox" id = "checkbox8" class = "mdl-checkbox__input"name="dal2" value="prak">
         <span class = "mdl-checkbox__label">dal2</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox8">
         <input type = "checkbox" id = "checkbox8" class = "mdl-checkbox__input"name="dal3" value="prak">
         <span class = "mdl-checkbox__label">dal3</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
  <br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox9">
         <input type = "checkbox" id = "checkbox9" class = "mdl-checkbox__input"name="dal4" value="prak">
         <span class = "mdl-checkbox__label">dal4</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox10">
         <input type = "checkbox" id = "checkbox10" class = "mdl-checkbox__input"name="dal5" value="prak">
         <span class = "mdl-checkbox__label">dal5</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox11">
           <input type = "checkbox" id = "checkbox11" class = "mdl-checkbox__input"name="veg1" value="prak">
           <span class = "mdl-checkbox__label">vegetable1</span>
        </label>
      </h5>
    </div>
    </div>
    </div>
</div>
<div class="w3-row-padding w3-margin-top">
    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox12">
           <input type = "checkbox" id = "checkbox12" class = "mdl-checkbox__input"name="veg2" value="prak">
           <span class = "mdl-checkbox__label">vegetable2</span>
        </label>
      </h5>
    </div>
    </div>
    </div>


    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox13">
           <input type = "checkbox" id = "checkbox13" class = "mdl-checkbox__input"name="veg3" value="prak">
           <span class = "mdl-checkbox__label">vegetable3</span>
        </label>
      </h5>
    </div>
    </div>
    </div>

    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox14">
           <input type = "checkbox" id = "checkbox14" class = "mdl-checkbox__input"name="veg4" value="prak">
           <span class = "mdl-checkbox__label">vegetable4</span>
        </label>
      </h5>
    </div>
    </div>
    </div>
  </div>
  <div class="w3-row-padding w3-margin-top">
    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox15">
           <input type = "checkbox" id = "checkbox15" class = "mdl-checkbox__input"name="nv1" value="prak">
           <span class = "mdl-checkbox__label">non-vegetable1</span>
        </label>
      </h5>
    </div>
    </div>
    </div>
    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox16">
           <input type = "checkbox" id = "checkbox16" class = "mdl-checkbox__input"name="nv2" value="prak">
           <span class = "mdl-checkbox__label">non-veg2</span>
        </label>
      </h5>
    </div>
    </div>
    </div>

    <div class="w3-third">
    <div class="w3-card-2">
    <img src="./images/gallery/3g.png" style="width:100%">
    <div class="w3-container">
  <br><h5>
        <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
           for = "checkbox17">
           <input type = "checkbox" id = "checkbox17" class = "mdl-checkbox__input"name="nv3" value="prak">
           <span class = "mdl-checkbox__label">non-vegetable3</span>
        </label>
      </h5>
    </div>
    </div>
    </div>
  </div>
  <div class="w3-row-padding w3-margin-top">
  <br>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox18">
         <input type = "checkbox" id = "checkbox18" class = "mdl-checkbox__input"name="nv4" value="prak">
         <span class = "mdl-checkbox__label">non-vegetable4</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox19">
         <input type = "checkbox" id = "checkbox19" class = "mdl-checkbox__input"name="nv5" value="prak">
         <span class = "mdl-checkbox__label">non-vegetable5</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox20">
         <input type = "checkbox" id = "checkbox20" class = "mdl-checkbox__input"name="addn1" value="prak">
         <span class = "mdl-checkbox__label">Additional1</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox21">
         <input type = "checkbox" id = "checkbox21" class = "mdl-checkbox__input"name="addn2" value="prak">
         <span class = "mdl-checkbox__label">Additional2</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox22">
         <input type = "checkbox" id = "checkbox22" class = "mdl-checkbox__input"name="addn3" value="prak">
         <span class = "mdl-checkbox__label">Additional3</span>
      </label>
    </h5>
  </div>
  </div>
  </div>

  <div class="w3-third">
  <div class="w3-card-2">
  <img src="./images/gallery/3g.png" style="width:100%">
  <div class="w3-container">
<br><h5>
      <label class = "mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
         for = "checkbox23">
         <input type = "checkbox" id = "checkbox23" class = "mdl-checkbox__input"name="addn4" value="prak">
         <span class = "mdl-checkbox__label">Additional1</span>
      </label>
    </h5>
  </div>
  </div>
  </div>
</div>
<br>
  <input type="submit" name="submit" onclick="myFunction()" class="w3-btn" value="Place your Order">
<br><br>

<p><a href="logout.php" class="logout"style="padding:10px;background:red;color:#fff;text-decoration:none;">Sign Out of Your Account</a></p>
<br><br><br><br>
</div>

<?php
date_default_timezone_set("Asia/Kolkata");
echo "Order will be Placed at ".date("h:i:sa")." on ".date("l").",".date("d/m/Y");
?>
</div>
<br><br>
<div class="our-history">
  <div class="hist">
    <br>
    <h5>Our History</h5>

    <p>

      <br><br><br><br><br><br><br><br><br>
</p>
  </div>

  <div class="copyrights w3-center">
    &copy;2018&nbsp;YOURSfav | All rights Reserved <br>
    Designed by <a href="#">Anmol Kumar</a>
  </div>

</div>


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "180px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
var i, x, tablinks;
x = document.getElementsByClassName("city");
for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablink");
for (i = 0; i < x.length; i++) {
  tablinks[i].classList.remove("w3-light-grey");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.classList.add("w3-light-grey");
}
</script>

  </body>
</html>
