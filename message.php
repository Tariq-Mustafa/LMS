<?php

require_once '../LMS-main/classes/Control/MessageController.php';
require_once '../LMS-main/classes/Model/Messages.php';
require_once '../LMS-main/classes/View/Message-view.classes.php';

// Initialize MessageController
$messageController = new MessageController(new MessageModel());
$messageView = new MessageView();

// Check if form is submitted to send a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_message'])) {
    $senderID = $_POST['senderID'];
    $receiverID = $_POST['receiverID'];
    $content = $_POST['content'];

    // Send the message
    $result = $messageController->sendMessage($senderID, $receiverID, $content);

    if ($result) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Failed to send message.</p>";
    }
}

// Display form to send a message
$messageView->displaySendMessageForm();

// Display received messages
$receiverID = 1; // Assuming receiver ID is 1 for demo purposes
$messages = $messageController->getMessagesForReceiver($receiverID);
$messageView->displayReceivedMessages($messages);

?>
