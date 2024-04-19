
<?php  
 $success='';
 $failed='';
 $flag=0; 
if(isset($_POST['submit'])) {
 $mailto = "pavithragannina1@gmail.com";  //My email address
 //getting customer data
 $name = $_POST['name']; //getting customer name
 $fromEmail = $_POST['email']; //getting customer email
 $phone = $_POST['tel']; //getting customer Phome number
 $subject = $_POST['subject']; //getting subject line from client
 $subject2 = "Confirmation: Message was submitted successfully | Hyderabad Greenz"; // For customer confirmation
 
 //Email body I will receive
 $message = "Client Name: " . $name . "\n"
 . "Phone Number: " . $phone . "\n\n"
 . "Client Message: " . "\n" . $_POST['message']. "\n\n"
 . "Regards," . "\n" . $name;
 
 //Message for client confirmation
 $message2 = "Dear " . $name . "\n"
 . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
 . "You submitted the following request: " . "\n" . $_POST['message'] . "\n\n"
 . "Regards," . "\n" . "Hyderabad Greenz";
 
 //Email headers
 $headers = "From: " . $fromEmail; // Client email, I will receive
 $headers2 = "From: " . $mailto; // This will receive client
 
 //PHP mailer function
 
  $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
  $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
 
  //Checking if Mails sent successfully

  if ($result1 && $result2) {
    echo "<script> alert ('Your Message was sent Successfully!');</script>";
            echo '<script> document.location="Get-in-Touch.php";    </script>';
    
  } else {
      echo "<script> alert ('Sorry! Message was not sent, Try again Later.');</script>";
            echo '<script> document.location="Get-in-Touch.php";    </script>';
    
  }
 
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

        <!--header end--><body>
 
<!--contact-form-section-->
<section class="ttm-row contact-form-section clearfix">
    <div class="container">
        <div class="row">
         
            <div class="col-md-4">
                <div class="row  spacing-12 box-shadow1 ttm-bgcolor-white mb-25">
                    <div class="col-md-12">
                        <h4>Send Your Message</h4>
                        <p>Send a message us, we will get connected</p>
                        <form id="ttm-contactform" class="ttm-contactform wrap-form clearfix" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>
                                        <span class="text-input"><input name="name" type="text" value="" placeholder="Name" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-lg-12">
                                    <label>
                                        <span class="text-input"><input name="tel" type="text" value="" placeholder="Phone" required="required"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>
                                        <span class="text-input"><input name="email" type="email" value="" placeholder="Email" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-lg-12">
                                    <label>
                                        <span class="text-input"><input name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                    </label>
                                </div>
                            </div>
                            <label>
                                <span class="text-input"><textarea name="message" rows="5" cols="40" placeholder="Tell us about your business" required="required"></textarea></span>
                            </label>
                            <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round  ttm-btn-style-fill ttm-btn-bgcolor-skincolor mb-5" value="Submit">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--contact-form-section end-->

