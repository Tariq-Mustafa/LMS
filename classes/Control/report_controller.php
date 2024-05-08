<?php

require_once '../Model/report_model.php';

class ReportController {
    private $model;

    public function __construct(ReportModel $model) {
        $this->model = $model;
    }

    public function displayReport() {
        // Fetch report data from the model
        $reports = $this->model->fetchReportData();

        // Load the view with the report data
        require_once '../View/report_view.php';
    }
}

?>
