<?php

class FeedbackView {
    public function displayFeedbackForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Dashboard.css">
            <title>Feedback Form</title>
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
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>
        <?php
    }

    public function displaySubmittedFeedback($instructorID,$studentID, $content) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Dashboard.css">
            <title>Feedback Submitted</title>
        </head>
        <body>
            <h2>Feedback Submitted</h2>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
	        <link rel="stylesheet" type="text/css" href="css/Dashboard.css">
            <p>Student ID: <?php echo $studentID; ?></p>
            <p>Instructor ID: <?php echo $instructorID; ?></p>
            <p>Content: <?php echo $content; ?></p>
            <script src="./js/Dashboard.js"></script>
            <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>
        <?php
    }
}
?>
