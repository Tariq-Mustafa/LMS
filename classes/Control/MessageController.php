<?php
require_once __DIR__ . '/../../classes/Db.classes.php';
require_once __DIR__ . '/../Model/Messages.php';

class MessageController extends MessageModel {
    private $model;

    public function __construct(MessageModel $model) {
        $this->model = $model;
    }

    public function sendMessage($senderID, $receiverID, $content) {
        return $this->model->sendMessage($senderID, $receiverID, $content);
    }

    public function getMessagesForReceiver($receiverID) {
        return $this->model->getMessagesForReceiver($receiverID);
    }
}
?>
