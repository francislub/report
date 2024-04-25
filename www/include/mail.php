 <?php 
include "functions.php";
$conn = db_conn();

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$orderid = $_GET['ordernum'];
$cmail = $_GET['cmail'];
$to = "erickyalo38@gmail.com, $cmail";
$subject = "SHOPZILLA ELECTRONICS";

$action = isset($_GET["action"])? $_GET["action"] : '';
$pd = isset($_GET["npd"])? $_GET["npd"] : '';
$npd = 'Your new password is : '.$pd;

$message = '<html><body>';
$message .= '<h3>Shopzilla Invoice Confirmation</h3>';
$message .= '<p>Thank you for choosing shopzilla as your online shopping partiner, Kindly click the link below to check the track your order:</p>';
$message .= '<a href="https://shopzilla.co.ke/client/order_details.php?orderid=$orderid" class="button">View Order</a>';
$message .= "<h4><i>Thank you shopping with us.</i></h4>";
$message .= '</body></html>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@shopzilla.co.ke>' . "\r\n";
$headers .= 'Cc: info@shopzilla.co.ke' . "\r\n";

$send = mail($to,$subject,$message,$headers);

$sql = $conn->query("INSERT INTO mails (email_address, subject, message)
				VALUES ('$cmail', '$subject', '$message')");

if($send){
	echo "
	<script>alert('Invoice confirmation mail has been sent to your E-mail account...!')
	</script>
	<script>window.location = '../pay.php?orderid=$orderid'</script>";
}
else{
	echo "
	<script>alert('Failed to send invoice confirmation mail to your E-mail account...!')
	</script>
	<script>window.location = '../pay.php?orderid=$orderid'</script>";  
}
   
?>