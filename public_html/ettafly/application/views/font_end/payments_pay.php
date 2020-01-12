<?php 
;


$chars = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$ref_id1 = substr(str_shuffle($chars), 0, 9);
$paymentid = "Pay$ref_id1";


$razorpay_key = "rzp_live_3mISrsJswCQDUT";
?>
<style>
    .razorpay-payment-button
    {
      text-align: center;
      font-size: 20px;
    color: white;
    background: #1a8222e8;
    border: 2px solid #0e0e0e;
    width: 150px;
    height: 35px;
    
   
    }
    
    .paybutton{
        position: absolute;
    left: 25%;
    top: 40%;
    transform: translate(-50%, -50%);
        
    }
</style>

<div class="inner-content">
<section class="breadcrumb-bg">
<div class="container">
<ol class="breadcrumb">
	<li>
		<a href="index.php">Home</a>
	</li>
	
	<li class="active">About Us</li>
</ol>
</div>
</section>

  <div class="content-text about">
      <div class="col-md-6 col-md-offset-3 paybutton" id="loginModal">
          <div>
               <div class="col-md-12">
                       <div class="form-group">
                          <label>Name : <?php echo $name; ?></label>
                          
                       </div>
                    </div>
              <div class="col-md-12">
                       <div class="form-group">
                          <label>Email-Id : <?php echo $email; ?></label>
                          
                       </div>
                    </div>
              <div class="col-md-12">
                       <div class="form-group">
                          <label>Mobile No : <?php echo $mobile; ?></label>
                          
                       </div>
                    </div>

              <div class="col-md-12">
                       <div class="form-group">
                          <label>Amount : 2000.00 Rs </label>
                          
                       </div>
                    </div>
              
<!--              <div class="col-md-12">
                       <div class="form-group">
                          <label>Ref_id : <?php echo $paymentid; ?> </label>
                          
                       </div>
                    </div>-->

              <p>Click Here to Complete Your Payment</p>
              <?php if($_GET['msg'] == success) {
//                  
//                 
//                  $update = $con->prepere("UPDATE cetification SET payment_id ='$paymentid' WHERE regester_id = '$ref_id'");
//                  $query = $update->execute();
//                  
//                  if($query){
//                      echo "Hii";
//                  }
//                  
                  ?>
              
              
                <form action="/success?ref_id=<?php echo $ref_id; ?>" method="POST">
                     <!--Note that the amount is in paise = 50 INR--> 
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo $razorpay_key; ?>"
                        data-amount="200000"
                        data-buttontext="Pay now"
                        data-name="Payment"
                        data-description="Certification Registration"
                        data-image="http://excelmedium.com/images/admin/1544709164_logo.png"
                        data-prefill.name="<?php echo $name; ?>"
                        data-prefill.contact="<?php echo $mobile; ?>"
                        data-prefill.email="<?php echo $email; ?>"
                        data-theme.color="#7ae1af"
                    ></script>
                    <input type="text" value="<?php echo $paymentid; ?>" name="id" hidden>
                </form>


                <?php
                }
                ?>
          </div>
          </div>
</div>
</div>
    </div>
 
