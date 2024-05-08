<?php

require_once '../LMS-main/classes/Control/FeedbackController.php';
require_once '../LMS-main/classes/Model/Feedback.php';
require_once '../LMS-main/classes/View/Feedback-view.classes.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch values from $_POST array
    $studentID = isset($_POST['StudentID']) ? $_POST['StudentID'] : '';
    $instructorID = isset($_POST['InstructorID']) ? $_POST['InstructorID'] : '';
    $content = isset($_POST['Content']) ? $_POST['Content'] : '';

    // Instantiate FeedbackController
    $feedbackController = new FeedbackController(new FeedbackModel());
    
    // Submit feedback
    $result = $feedbackController->submitFeedback($instructorID,$studentID, $content);
    
    // Instantiate FeedbackView
    $feedbackView = new FeedbackView();

    if ($result) {
        // Display success message
        $feedbackView->displaySubmittedFeedback($instructorID,$studentID, $content);
    } else {
        // Display error message
        echo "Failed to submit feedback.";
    }
} else {
    // If form is not submitted, display feedback form
    $feedbackView = new FeedbackView();
    $feedbackView->displayFeedbackForm();
}

?>
