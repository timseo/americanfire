<?php 
// require("PHPMailer/PHPMailerAutoload.php");

// // ADD your Email and Name
// $recipientEmail='your@email';
// $recipientName='your Name';

// //collect the posted variables into local variables before calling $mail = new mailer

// $senderName = $_POST['contact-name'];
// $senderPhone = $_POST['contact-phone'];
// $senderMessage= $_POST['contact-message'];
// $senderSubject = 'New Message From ' . $senderName;

// //Create a new PHPMailer instance
// $mail = new PHPMailer();

// //Set who the message is to be sent from
// $mail->setFrom($recipientEmail, $recipientName);
// //Set an alternative reply-to address
// $mail->addReplyTo($senderEmail,$senderName);
// //Set who the message is to be sent to
// $mail->addAddress($senderEmail, $senderName );
// //Set the subject line
// $mail->Subject = $senderSubject;

// $mail->Body = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

// $mail->MsgHTML($body);
// $mail->AddAddress($recipientEmail, $recipientName);

// //$mail-&gt;AddAttachment("images/phpmailer.gif"); // attachment
// //$mail-&gt;AddAttachment("images/phpmailer_mini.gif"); // attachment

// //now make those variables the body of the emails
// $message = '<html><body>';
// $message .= '<table rules="all" style="border:1px solid #666;width:300px;" cellpadding="10">';
// $message .= ($senderName) ? "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $senderName . "</td></tr>" : '';
// $message .= ($senderEmail) ?"<tr><td><strong>Email:</strong> </td><td>" . $senderEmail . "</td></tr>" : '';
// $message .= ($senderPhone) ?"<tr><td><strong>Phone:</strong> </td><td>" . $senderPhone . "</td></tr>" : '';
// $message .= ($senderMessage) ?"<tr><td><strong>Email:</strong> </td><td>" . $senderMessage . "</td></tr>" : '';

// $message .= "</table>";
// $message .= "</body></html>";

// $mail->Body = $message;

// // $mail->Body="
// // Name:$senderName<br/>
// // Email: $senderEmail<br/>
// // Suburb: $senderSubject<br/>
// // Message: $senderMessage";

// if(!$mail->Send()) {
// 	echo '<div class="alert alert-danger" role="alert">Error: '. $mail->ErrorInfo.'</div>';
// } else {
// 	echo '<div class="alert alert-success" role="alert">Thank you. We will contact you shortly.</div>';
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags($_POST["quote-name"]));
    $email = filter_var($_POST["quote-email"], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags($_POST["quote-phone"]));
    $project_address = htmlspecialchars(strip_tags($_POST["quote-project-address"]));
    $property_type = htmlspecialchars(strip_tags($_POST["quote-property"]));
    $service_needed = htmlspecialchars(strip_tags($_POST["quote-service"]));
    $message = htmlspecialchars(strip_tags($_POST["quote-message"]));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($project_address) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Email recipient
    $to = "danny@americanfireinc.com"; // Replace with your email
    $subject = "New Quote Request from $name";
    
    // Email body
    $email_body = "
        <h2>New Quote Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Project Address:</strong> $project_address</p>
        <p><strong>Type of Property:</strong> $property_type</p>
        <p><strong>Service Needed:</strong> $service_needed</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Your request has been sent successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send your request. Please try again later."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

?>