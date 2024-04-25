<?php
include "functions.php";

$conn = db_conn();

$orderid = $_GET['orderid'];

$callbackJSONData=file_get_contents('php://input');

$logFile = "stkPush.json";
$log = fopen($logFile, "a");
fwrite($log, $callbackJSONData.$orderid);
fclose($log);
  
$callbackData=json_decode($callbackJSONData);

$resultCode=$callbackData->Body->stkCallback->ResultCode;
$resultDesc=$callbackData->Body->stkCallback->ResultDesc;
$merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
$checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
$pesa=$callbackData->stkCallback->Body->CallbackMetadata->Item[0]->Name;
$amount=$callbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$balance=$callbackData->stkCallback->Body->CallbackMetadata->Item[2]->Value;
$b2CUtilityAccountAvailableFunds=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;

$orderid = strval($orderid);
$amount = strval($amount);

if($resultCode == 0){
//insert to payments table	
$insert = $conn->query("INSERT INTO `payment`(`orderid`, `amount`, `mpesaReceiptNumber`, `transactionDate`, `phoneNumber`)
VALUES ('$orderid', '$amount','$mpesaReceiptNumber','$transactionDate','$phoneNumber')");

//update sales table stage
$sql = $conn->query("UPDATE invoice SET status = 'Paid' WHERE order_number = '$orderid' ");

echo '<script type="text/javascript">
	alert("Your order has been paid");
	</script>';

$conn = null;
}
else{
echo '<script type="text/javascript">
	alert("Your order has not been paid");
	</script>';
}