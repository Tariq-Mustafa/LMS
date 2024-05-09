<?php
require_once '../LMS-main/classes/Control/FeedbackController.php';
require_once '../LMS-main/classes/Model/Feedback.php';
require_once '../LMS-main/classes/View/Feedback-view.classes.php';

// Check if the user is logged in as an instructor (You may need to adjust this logic based on your authentication system)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch values from $_POST array
    $instructorID = isset($_POST['InstructorID']) ? $_POST['InstructorID'] : '';
    
    // Instantiate FeedbackModel
    $feedbackModel = new FeedbackModel();

    // Fetch feedback data for the instructor
    $feedbackData = $feedbackModel->getFeedbackForInstructor($instructorID); // Assuming you have a method to fetch feedback for a specific instructor

    // Instantiate FeedbackView
    $feedbackView = new FeedbackView();

    // Display the feedback data
    $feedbackView->displayFeedbackForInstructor($feedbackData);
}
?>
