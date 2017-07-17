<?php include 'includes/Database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php

  $db = new Database();
  if (isset($_REQUEST["message"])) 
  {
    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $message_body = $_REQUEST["message_body"];


    $sql = "INSERT INTO feedback (firstname,lastname,phone,email,message)VALUES('$firstname','$lastname','$phone','$email','$message_body')";
    $row = mysqli_query($db->link,$sql);
    header("location:contactus.php?sent=Message Sent...");

  }

?>
<?php
    //mailsending code
    $emailid='info@litindia.in';
    //$to="info@ananyaresortspuri.com";
    $to="mbiswajit04@gmail.com";
    $subject="From LIT Mail";
    $msg='<html><body> hi dear how r u ?</body></html>';
    //echo $emailid;
    //echo $msg;
    $headers  =  "From:".$emailid."\r\n".'MIME-Version: 1.0' . "\r\n";
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   
    $result= mail($to, $subject, $msg, $headers);
    if($result)
    {
      header('location:thankyou.php');
    }
?>



    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<style type="text/css">
  .body{
    height: 100%;
    padding-left: 50px;
    background-image: url('images/phone.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
  .content{
    background-color: rgba(0,0,9,0.7);
    color: white;
    margin: 30px;
    border-radius: 10px;
    height: 100%;
    padding: 40px;
    border: 1px solid;
  }
  .message{
    height: 200px;
  }

</style>

<div class="container" style="margin-top: 40px;">
  <div class="row">
    <div class="col-xs-12 body">
      <div class="content">
      
      <center><h2>Let's Get Connected<br></h2></center>
      <center>
      <?php if(isset($_GET["sent"])) : ?>
          
          <center>
          <strong><div class="alert alert-success"><?php  echo htmlentities($_GET["sent"]); ?></div></strong>
          </center>

      <?php endif; ?>
      </center>
      <br>
      <form>
        <div class="col-xs-6">
          <input type="text" name="firstname" class="form-control input" placeholder="Enter First Name*" required="required">
          <br><br>
          <input type="text" name="phone" class="form-control input" placeholder="Enter 10 digit Phone number*" required="required">
        </div>
        <div class="col-xs-6">
          <input type="text" name="lastname" class="form-control input" placeholder="Enter First Name*" required="required">
          <br><br>
          <input type="email" name="email" class="form-control input" placeholder="Enter Email Here*" required="required">
        </div>
        <br><br>
        <div class="col-xs-12">
        <br><br>
          <textarea name="message_body" placeholder="Enter your Message Here" class="message form-control input" rows="7"></textarea><br>
        </div>
        <center><input type="submit" name="message" class="btn btn-primary" value="Send Message"></center>
      </form>
      <br>
        <center>
          <!-- <a href="mailto:bibhuranjan.500@gmail.com" class="btn btn-primary input">Send Message</a><br><br> -->
          <strong>We are also on </strong><br><br>
              <a href="https://www.facebook.com/b.i.b.h.u.98"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://twitter.com/bibhuranjan500"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://github.com/bibhu545"><i class="fa fa-github fa-fw fa-3x"></i></a>
                  
        </center>
      </div>
    </div>
  </div>
</div>

<?php  include 'includes/footer.php'; ?>