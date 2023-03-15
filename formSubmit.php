<?php

    $to = "mariaashwini06@gmail.com";
	if(isset($_POST["contactSubmit"]))
    {		
		$email_from = $_POST['email'];
		$to = "mariaashwini06@gmail.com";
	/*	$name = $_POST['name'];
		$subject = $_POST['subject'];
		$number = $_POST['phone'];
		$cmessage = $_POST['message']; */
		
		$headers = "From: $email_from \r\n";
		$email_subject = "Portfolio Enquiry from client";
		$headers = 'From: '.$email_from . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
		$email_body = file_get_contents("emailContent.html");


		$email_body = str_replace('{fullName}',$_POST["name"],$email_body);
		$email_body = str_replace('{emailId}',$_POST["email"],$email_body);
		$email_body = str_replace('{contactNo}',$_POST["phone"],$email_body);
		$email_body = str_replace('{subject}',$_POST["subject"],$email_body);
		$email_body = str_replace('{message}',$_POST["message"],$email_body);
		
		if(mail($to,$email_subject,$email_body,$headers))
		{		
			echo '<script>
			alert("Thank you for reaching us. We will get back to you shortly");
	        window.location.replace("http://localhost/portfolio/index.html#contact");
			</script>'; 
			
		}
		else
		{	
			echo "Email sending failed";
		}
    }



?>