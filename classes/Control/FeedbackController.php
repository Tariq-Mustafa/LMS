<?php
require_once __DIR__ . '/../../classes/Db.classes.php';
require_once __DIR__ . '/../Model/Feedback.php';

class FeedbackController extends FeedbackModel {
    private $model;

    public function __construct(FeedbackModel $model) {
        $this->model = $model;
    }

    public function submitFeedback($instructorID,$studentID, $content) {
        return $this->model->submitFeedback($instructorID,$studentID, $content);
    }
    public function getFeedbackForInstructor($instructorID){
        return $this->model->getFeedbackForInstructor($instructorID);
    }
}
?>
