
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="Description" content="nxttour.in offers best deals on India tour packages. Best Holiday package and trips provide in lowest price and explore all exciting tourist destinations in India" />
        <meta name="Keywords" content="nxttour,Nxttour,NXTTOUR,Kedarnath,Badrinath,Tungnath,Nainital,Dudhsagar,Auli,india travel, travel in india, tours, travel, packages, holidays, holiday packages in India, tour packages, vacation packages, holidays in India, india tourism, holiday destinations, holiday packages, holiday packages india, india tours, india honeymoon package, honeymoon packages, india tour packages, Indian holidays, cheap holiday packages"/>
        <meta name="format-detection" content="telephone=no" />
        <meta property="og:title" content="India Tour Packages - India Holiday Packages, Travel Guide, Tourism and Vacation Packages at Nxttour.in" /><!--  -->
        <meta property="og:site_name" content="nxttour.in" />
        <meta property="og:description" content="nxttour.in offers best deals on India tour packages. Best Holiday package and trips provide in lowest price and explore all exciting tourist destinations in India" />
    <link rel="shortcut icon" href="https://cdn.razorpay.com/logos/IYTymWACTAKVYi_original.png">
    <title> Make payment Nxttour </title>
</head>
<?php

 $apiKey = "";
    
    $bname = $_POST["bname"];
    $bage = $_POST["bage"];
    $bgender = $_POST["bgender"];
    $baadhar = $_POST["baadhar"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $fulamount = $_POST["fulamount"];
    $ORDER_ID = $_POST["ORDER_ID"];
    $CUST_ID = $_POST["CUST_ID"];
    $tour = $_POST["tour"];
    $stat = $_POST["stat"];
    $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
    $CHANNEL_ID = $_POST["CHANNEL_ID"];
    $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

    include '../Sqliconn.php'; 


    $sql2= "INSERT INTO `booking` (`username`, `ORDER_ID`, `TXNID`, `TXNAMOUNT`, `PAYMENTMODE`, `BANKNAME`, `TXNDATE`, `STATUS`, `place`, `state`, `other`) VALUES ('$CUST_ID','$ORDER_ID','','$TXN_AMOUNT','','Razor pay',CURRENT_TIMESTAMP,'Failed','$tour','$stat','')";
  $result0=mysqli_query($conn,$sql2);
     if($result0==1)
        {   

         $sql0= "INSERT INTO `bperson` (`name`, `age`, `gender`, `phone`, `email`, `address`, `ORDER_ID`, `aadar`, `fulamount`, `STATUS`) VALUES ('$bname', '$bage', '$bgender','$phone', '$email','$address','$ORDER_ID','$baadhar','$fulamount','Failed')";
         $result2=mysqli_query($conn,$sql0);
            if($result2==1){
                echo "sucees";
            }else{
                 echo "paym";
            }    
         }else{
             echo "fail";
         }

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<center><h1>Please do not refresh this page...</h1></center>

<form style="display:none;" action="<?php echo "../bill.php?ORDER_ID=".$ORDER_ID; ?>" method="POST">
    <input type="text" name="tour" value="<?php echo $tour; ?>" readonly>
    <input type="text" name="stat" value="<?php echo $stat; ?>" readonly> 
    <input type="text" name="rayer" value="10" readonly>
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" 
    data-amount="<?php echo $TXN_AMOUNT * 100;?>"
    data-currency="INR"
    data-id="<?php echo $ORDER_ID;?>"
    data-buttontext="Pay with Razorpay"
    data-name="NXTTOUR"
    data-description="Best Tour and holiday packages in cheapest Price!"
    data-image="https://cdn.razorpay.com/logos/IYTymWACTAKVYi_original.png"
    data-prefill.name="<?php echo $bname;?>"
    data-prefill.email="<?php echo $email;?>"
    data-prefill.contact="<?php echo $phone;?>"
    data-theme.color="lightseagreen">
></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function() {
    $(".razorpay-payment-button").click();
}
</script>
