<?php

class MessageView {
    public function displaySendMessageForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Send Message</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../LMS-Main/css/Dashboard.css">
            <link rel="stylesheet" type="text/css" href="css/Feedback.css">
        </head>
        <body>
            <h2>Send Message</h2>
            <form method="POST" action="">
                <label for="senderID">Sender ID:</label>
                <input type="text" id="senderID" name="senderID" required><br><br>

                <label for="receiverID">Receiver ID:</label>
                <input type="text" id="receiverID" name="receiverID" required><br><br>

                <label for="content">Message:</label><br>
                <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>
                
                <button type="submit" name="send_message">Send Message</button>
            </form>
            <?php include 'footer.php'; ?>

            <!-- Include JavaScript file -->
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>
        <?php
    }

    public function displayReceivedMessages($messages) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Received Messages</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../LMS-Main/css/Dashboard.css">
            <link rel="stylesheet" type="text/css" href="css/Feedback.css">
        </head>
        <body>
            <h2>Received Messages</h2>
            <?php
            if ($messages) {
                foreach ($messages as $message) {
                    echo "<p>Sender ID: {$message['SenderID']}</p>";
                    echo "<p>Content: {$message['Content']}</p>";
                    echo "<p>Timestamp: {$message['Timestamp']}</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>No messages available.</p>";
            }
            ?>
        </body>
        </html>
        <?php include 'footer.php'; ?>

            <!-- Include JavaScript file -->
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <?php
    }
}
?>
