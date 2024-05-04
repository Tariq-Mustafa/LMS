<?php

class UserView extends User {
    
    public function fetchStudentCount($AdminID) {
        $row_count = $this->getStudentsNum($AdminID);

        echo $row_count;
    }

    public function fetchTeacherCount($AdminID) {
        $row_count = $this->getTeachersNum($AdminID);

        echo $row_count;
    }
}