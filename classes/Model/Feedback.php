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
    public function getFeedbackForInstructor($instructorID) {
        try {
            $stmt = $this->connect()->prepare('SELECT * FROM feedback WHERE InstructorID = ?');
            $stmt->execute([$instructorID]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors
            return false;
        }
    }
}
?>
