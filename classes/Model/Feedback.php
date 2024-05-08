<?php

class FeedbackModel extends Db {
    public function submitFeedback($instructorID,$studentID, $content) {
        try {
            $stmt = $this->connect()->prepare('INSERT INTO feedback (InstructorID,StudentID,Content) VALUES (?, ?, ?)');
            $stmt->execute([$instructorID,$studentID, $content]);
            return true;
        } catch (PDOException $e) {
            // Handle errors
            return false;
        }
    }
}
?>
