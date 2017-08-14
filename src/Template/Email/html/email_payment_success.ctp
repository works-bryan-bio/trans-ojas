
<?php
$seller_body = "Hi,<br><br>";
$seller_body .= "An order has been successfully paid. :<br><br>";
$seller_body .= "<table>";
	$seller_body .= "<tr>";
        $seller_body .= "<td><b>Customer ID:</b></td>";
        $seller_body .= "<td>{$result->customer_id} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Firstname:</b></td>";
        $seller_body .= "<td>{$result->firstname} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Lastname:</b></td>";
        $seller_body .= "<td>{$result->lastname} </td>";
    $seller_body .= "</tr>";    
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Email:</b></td>";
        $seller_body .= "<td>{$result->email_address} </td>";
    $seller_body .= "</tr>";       
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Package:</b></td>";
        $seller_body .= "<td>{$result->package_type} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Subscription:</b></td>";
        $seller_body .= "<td>{$result->subscription_type} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Terms of Payment:</b></td>";
        $seller_body .= "<td>{$result->payment_terms} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Amount:</b></td>";
        $seller_body .= "<td>{$result->total_cost} </td>";
    $seller_body .= "</tr>";
    $seller_body .= "<tr>";
        $seller_body .= "<td><b>Expiration Date:</b></td>";
        $seller_body .= "<td>{$result->date_expiration} </td>";
    $seller_body .= "</tr>";
$seller_body .= "</table><br>";
$seller_body .= "<br><p>Please update the account if necessary. Link: http://intellidentph.com/i_manager/app</p>";
$seller_body .= "<p>Thank you and have a great day!</p>";

echo $seller_body;
?>
