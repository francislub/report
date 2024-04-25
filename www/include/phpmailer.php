 <?php 

	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$from = "info@shopzilla.co.ke";
	$to = "erickyalo38@gmail.com";
	
	$mail->isHTML(true);
	$headers = "From:" . $from;
	$subject = "Shopzilla Invoice Confirmation";
	$message = "Thank you for choosing shopzilla as your online shopping partiner, Kindly click this to link to view status of your order<br>
	<a href=\"www.shopzilla.co.ke/client/order_details.php?orderid={$orderid}\" class='button'>View Order Status</a> 
	";
	

	$send = mail($to,$subject,$message, $headers);
	
	if($send){
		echo "
		<script>alert('Failed to send invoice confirmation mail to your E-mail account...!')
		</script>
		<script>window.location = '../pay.php'</script>";
	}
	else{
		echo "
		<script>alert('Invoice confirmation mail has been sent to your E-mail account...!')
		</script>
		<script>window.location = '../pay.php'</script>";  
	}
   
?>