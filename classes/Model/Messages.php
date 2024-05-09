<?php

class MessageModel extends Db {
    public function sendMessage($senderID, $receiverID, $content) {
        try {
            $stmt = $this->connect()->prepare('INSERT INTO message (SenderID, ReceiverID, Content) VALUES (?, ?, ?)');
            $stmt->execute([$senderID, $receiverID, $content]);
            return true;
        } catch (PDOException $e) {
            // Handle errors
            return false;
        }
    }

    public function getMessagesForReceiver($receiverID) {
        try {
            $stmt = $this->connect()->prepare('SELECT * FROM message WHERE ReceiverID = ? ORDER BY Timestamp DESC');
            $stmt->execute([$receiverID]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors
            return false;
        }
    }
}
?>
