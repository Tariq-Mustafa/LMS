<?php

class UserView extends User {
    
    public function fetchStudentCount($AdminID) {
        $rowCount = $this->getStudentsNum($AdminID);

        echo $rowCount;
    }

    public function fetchTeacherCount($AdminID) {
        $rowCount = $this->getTeachersNum($AdminID);

        echo $rowCount;
    }

    public function fetchAllUser($AdminID) {
        $studentCount = $this->getStudentInfo($AdminID);
        $teacherCount = $this->getTeacherInfo($AdminID);
        
        foreach ($studentCount as $row) {
            echo "
                    <tr>
                        <td>".$row['UserID']."</td>
                        <td>".$row['StudentID']."</td>
                        <td>".$row['UserName']."</td>
                        <td>
                            <form method='post'>
                                <input type='hidden' value='".$row['UserID']."' name='id'>
                                <button type='submit' name='deleteS' class='btn btn-primary'>delete</button>
                            </form>
                        </td>
                    </tr>";
        }

        foreach ($teacherCount as $row) {
            echo "
                    <tr>
                        <td>".$row['UserID']."</td>
                        <td>".$row['Department']."</td>
                        <td>".$row['UserName']."</td>                        
                        <td>
                            <form method='post'>
                                <input type='hidden' value='".$row['UserID']."' name='id'>
                                <button type='submit' name='deleteT' class='btn btn-primary'>delete</button>
                            </form>
                        </td>
                    </tr>";
        }

        if(isset($_POST["deleteS"])) 
        {
            $id = $_POST["id"];
            $this->deleteStudent($id);
        }
        if(isset($_POST["deleteT"])) 
        {
            $id = $_POST["id"];
            $this->deleteTeacher($id);
        }
    }
}
