<?php

class FeedbackView {
    public function displayFeedbackForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Feedback Form</title>
            <!-- Include CSS file -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../LMS-Main/css/Dashboard.css">
            <link rel="stylesheet" type="text/css" href="css/Feedback.css">
        </head>
        <body>
            <h2>Feedback Form</h2>

            <form action="submit_feedback.php" method="POST">

                <label for="InstructorID">Instructor ID:</label>
                <input type="text" id="InstructorID" name="InstructorID" required><br><br>

                <label for="StudentID">Student ID:</label>
                <input type="text" id="studentID" name="StudentID" required><br><br>

                <label for="Content">Content:</label><br>
                <textarea id="Content" name="Content" rows="4" cols="50" required></textarea><br><br>
                
                <button type="submit">Submit Feedback</button>
            </form>

            <!-- Include footer file -->
            <?php include 'footer.php'; ?>

            <!-- Include JavaScript file -->
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>
        <?php
    }

    public function displaySubmittedFeedback($instructorID, $studentID, $content) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Feedback Submitted</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/Dashboard.css">
            <link rel="stylesheet" type="text/css" href="css/Feedback.css">
        </head>
        <body>
            <h2>Feedback Submitted</h2>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <p>Student ID: <?php echo $studentID; ?></p>
            <p>Instructor ID: <?php echo $instructorID; ?></p>
            <p>Content: <?php echo $content; ?></p>
            
            <!-- Include footer file -->
            <?php include 'footer.php'; ?>

            <!-- Include JavaScript file -->
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>
        <?php
    }
    public function displayFeedbackForInstructor($feedbackData) {
        // Display feedback data in a suitable format for instructors
        if ($feedbackData) {
            foreach ($feedbackData as $feedback) {
                echo "<p>Student ID: {$feedback['StudentID']}</p>";
                echo "<p>Content: {$feedback['Content']}</p>";
                echo "<hr>";
            }
        } else {
            echo "No feedback available for this instructor.";
        }
    }
}
?>
