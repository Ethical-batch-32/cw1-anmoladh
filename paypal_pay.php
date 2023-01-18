<?php
  require_once "controluserdata.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="paypal" style="padding:20px; border-radius:5px;box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);">
    <?php
        include "db.php";
          $psql = "SELECT `total` FROM `bookings` WHERE `cid`=2";
          $presult = mysqli_query($con,$psql);
          $pdata = mysqli_fetch_array($presult)?>
          <h5 style="text-align:center; color:#30637c;">USD</h5>   
            <input type="text" name="" id="pay" style="text-align:center; color:#30637c;padding:10px;outline:none;border:none;" value="<?php echo $pdata['total'];?>">  
        <div id="paypal-button-container"></div>
    </div>
<script src="https://www.paypal.com/sdk/js?client-id=AWfe-PPSC8CtTPfWFhs1oANgDSZdLUClKvTMB9yS8r7g8iLH4KBzVhm_WZRr1SNo33jKn4MYwLW5Pnky&disable-funding=credit,card&currency=USD"></script>
<script>
paypal.Buttons({
    style:{
        color:'blue',
        shape:'pill'
    },
  // Sets up the transaction when a payment button is clicked
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: document.getElementById('pay').value // Can reference variables or functions. Example: `value: document.getElementById('...').value`
        }
      }]
    });
  },
  // Finalize the transaction after payer approval
  onApprove: function (data, actions) {
	return actions.order.capture().then(function (details) {
		console.log(details)
		window.location.replace("http://localhost/tms/success.php")
	})
},
onCancel: function (data) {
	window.location.replace("http://localhost/tms/oncancel.php")
}
}).render('#paypal-button-container');
</script>
</body>
</html>