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
    header("location: error.html");
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
         $usernameErr = "Description is Required";
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
    $addr1Err = "Description is Required";
    }
    else {
    $addr1 = test_input($_POST["addr1"]);
    }

    if (empty($_POST["addr2"])) {
    $addr2Err = "Description is Required";
    }
    else {
    $addr2 = test_input($_POST["addr2"]);
    }

    if (empty($_POST["city"])) {
    $cityErr = "Description is Required";
    }
    else {
    $city = test_input($_POST["city"]);
    }

    if (empty($_POST["pin"])) {
    $postalpinErr = "Description is Required";
    }
    else {
    $postalpin = test_input($_POST["pin"]);
    }

    if (empty($_POST["country"])) {
    $countryErr = "Description is Required";
    }
    else {
    $country = test_input($_POST["country"]);
    }

    if (empty($_POST["state"])) {
    $stateErr = "Description is Required";
    }
    else {
    $state = test_input($_POST["state"]);
    }
    $r1 = test_input($_POST["rice1"]);

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
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="description" content="Best Kdney and Diabetes Transplant and Dialysis Clinic In Muzaffarpur with best Nephologist inState of Bihar Dr. Dharmendra Prasad.">
  <meta name="keywords" content="Diabetes,Kidney,Chronic,transplantation,Transplant,Dialysis">
  <script src="material.min.js"></script>
  <link rel="stylesheet" href="material.css">
  <link rel="stylesheet" href="w3.css">
  <script langauage = "javascript">
     function showMessage(value) {
        document.getElementById("message").innerHTML = value;
     }
  </script>
</head>
<body>

    <form class="" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
      <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
         <input class = "mdl-textfield__input" type = "text" id = "text4"name="fname" id="text4" value="<?php echo $fname;?>"
         pattern = "-?^[a-zA-Z ]*?" id = "text2">
         <label class = "mdl-textfield__label" for = "text4">Text...</label>
         <span class = "mdl-textfield__error">Name Should only contain letters</span>

      </div><br>
      <span class = "error"><?php echo $fnameErr;?> </span>
  <input type="text" class="mdl-textfield__input" name="lname" value="<?php echo $lname;?>"placeholder="Last Name"><br>
  <span class="error"><?php echo $lnameErr;?> </span>
  <br>
  <input type="text" class="mdl-textfield__input" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>"placeholder="Username"disabled><br>
  <span class="error"><?php echo $usernameErr;?> </span>
  <br>
  <input type="tel"class="mdl-textfield__input" name="phone" value="<?php echo $phone;?>"placeholder="Phone"><br>
  <span class="error"><?php echo $phoneErr;?> </span>
  <br>
  <input type="text" class="mdl-textfield__input" name="addr1" value="<?php echo $addr1;?>"placeholder="Address Line 1"><br>
  <span class="error"><?php echo $addr1Err;?> </span>
  <br>
  <input type="text"class="mdl-textfield__input" name="addr2" value="<?php echo $addr2;?>"placeholder="Address Line 2"><br>
  <span class="error"><?php echo $addr2Err;?> </span>
  <br>
  <input type="text" class="mdl-textfield__input" name="city" value="<?php echo $city;?>"placeholder="City"><br>
  <span class="error"><?php echo $cityErr;?> </span>
  <br>
  <input type="tel" class="mdl-textfield__input" name="pin" value="<?php echo $postalpin;?>"placeholder="PIN Code"><br>
  <span class="error"><?php echo $postalpinErr;?> </span>
  <br>
  <input type="text" class="mdl-textfield__input" name="country" value="<?php echo $country;?>"placeholder="country"><br>
  <span class="error"><?php echo $countryErr;?> </span>
  <br>
  <input type="text" class="mdl-textfield__input" name="state" value="<?php echo $state;?>"placeholder="state"><br>
  <span class="error"><?php echo $stateErr;?> </span>
  <br>
  <input type="date" name="adate" value="<?php echo $adate;?>"> <br>
  <span class="error"><?php echo $adateErr;?> </span>

  <input type="checkbox" name="rice1" value="Plain">I have a bike
  <br>
  <input type="checkbox" name="rice2" value="Basmati">I have a car
    <span class="error"><?php echo $phoneErr;?> </span>
  <br><br>

  <input type="checkbox" name="rice3" value="anmol">I have a bike
  <br>

  <input type="checkbox" name="rice4" value="anmol">I have a bike
  <br>
    <input type="checkbox" name="rice5" value="anmol">I have a bike
  <br>
  <input type="checkbox" name="rice6" value="anmol">I have a bike
<br>
  <input type="checkbox" name="dal1" value="anmol">I have a bike
<br>

    <input type="checkbox" name="dal2" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="dal3" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="dal4" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="dal5" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="veg1" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="veg2" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="veg3" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="veg4" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="nv1" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="nv2" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="nv3" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="nv4" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="nv5" value="anmol">I have a bike
    <br>
    <input type="checkbox" name="addn1" value="anmol">I have a bike
    <br>

    <input type="checkbox" name="addn2" value="anmol">I have a bike
    <br>
    <input type="checkbox" name="addn3" value="anmol">I have a bike
    <br>
    <input type="checkbox" name="addn4" value="anmol">I have a bike
    <br>
  <br>
  <input type="submit" name="submit" onclick="myFunction()" value="Book Appointment">
<br><br>

<?php
date_default_timezone_set("Asia/Kolkata");
echo "Order will be Placed at ".date("h:i:sa")." on ".date("l").",".date("d/m/Y");
?>
</div>
<br><br>

  </body>
</html>
