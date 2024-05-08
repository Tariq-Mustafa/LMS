<?php

require_once '../LMS-main/classes/Model/report_model.php';
// Instantiate the model
$model = new ReportModel();

// Fetch report data
$reports = $model->fetchReportData();

// Generate CSV file
$filename = 'report.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $filename);

$output = fopen('php://output', 'w');
fputcsv($output, array('Student Name', 'Course Name'));

foreach ($reports as $report) {
    fputcsv($output, $report);
}

fclose($output);
?>
