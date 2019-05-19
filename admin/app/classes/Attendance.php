<?php
class Attendance{


    public function appAttendanceOption($post)
    {
        $required=[
            $post['class'],
            $post['attend_date']
        ];
        $class=$post['class'];
        $check_class=$post['class'];
        if(isset($post['group'])){
            $group=$post['group'];
        }
        $attend_date=$post['attend_date'];
        if($post['class']=='Nine' || $post['class']=='Ten'){
            $check_class=$class.'('.$group.')';
            $group=$post['group'];
        }
        if(validation::required($required)){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Field must not be empty.</p>";
            return $message;
        }
        if (($post['class']=='Nine' && empty($post['group'])) || ($post['class']=='Ten' && empty($post['group']))){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Please select group option.</p>";
            return $message;
        }
        //check date here
        $query="SELECT * FROM  students_attendances WHERE attendance_date='$attend_date' AND class='$check_class'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Attendance is already received.</p>";
            return $message;
        }

        if(!empty($group)){
            echo "<script>window.location='receive.php?attend_details=$class\_$attend_date\_$group';</script>";
        }else{
            echo "<script>window.location='receive.php?attend_details=$class\_$attend_date';</script>";

        }

    }


    public function addAttendanceApp($post,$class,$attend_date){

        $attendance="";
        for ($i=1;$i<=200;$i++){
            if(isset($post['roll_'.$i])){
                $attendance .=$post['roll_'.$i].',';
            }
        }
        $attendRoll=rtrim($attendance,',');
        $required=[$attendRoll];
        if(validation::required($required)){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Roll must not be empty.</p>";
            return $message;
        }
        //check date here
        $query="SELECT * FROM  students_attendances WHERE attendance_date='$attend_date' AND class='$class'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            $message="<p class='alert alert-danger' style='font-size: 12px' ><strong>Error!</strong> Attendance is already received.</p>";
            return $message;
        }
        $teacherId=session::get('teacherId');
        if (isset($attendance)){
            $selectQuery="INSERT INTO students_attendances(roll,class,attendance_date,teacher_id)VALUES ('$attendRoll','$class','$attend_date','$teacherId')";
            $addResult=database::connect()->query($selectQuery);
            if ($addResult){
                $message="<p class='alert alert-success' style='font-size: 12px'><strong>Success!</strong> Attendance receive Successful.</p>";
                return $message;
            }
        }
    }


    //select student for manage student
    public function selectStudentForAttendance($class,$group){
        $table=$this->manageTable($class);
        if($table=='class_nine_students' || $table=='class_ten_students'){
            $query="SELECT * FROM  $table WHERE stu_group='$group' ORDER BY roll ASC";
        }else{
            $query="SELECT * FROM  $table  ORDER BY roll ASC";
        }
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    public function manageTable($class)
    {
        if($class=='Six'){
            $table='class_six_students';
            return $table;
        }elseif($class=='Seven'){
            $table='class_seven_students';
            return $table;
        }elseif($class=='Eight'){
            $table='class_eight_students';
            return $table;
        }elseif($class=='Nine'){
            $table='class_nine_students';
            return $table;
        }else{
            $table='class_ten_students';
            return $table;
        }
    }

    public function selectAttendanceByClass($class)
    {
        $query="SELECT * FROM  students_attendances WHERE class='$class' ORDER BY id DESC";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }


    public function selectAttendanceByTeacherId($teacher_id)
    {
        $query="SELECT * FROM  students_attendances WHERE teacher_id='$teacher_id' ORDER BY id DESC LIMIT 10";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }

    public function deleteAttendance($id)
    {
        $query="DELETE FROM students_attendances WHERE id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt){
            $message="<p  style='font-size: 12px' class='alert alert-success'><strong>Success!</strong> Attendance delete Successful.</p>";
            return $message;
        }else{
            return false;
        }
    }

    public function selectSingleAttendance($update_id)
    {
        $query="SELECT * FROM  students_attendances WHERE  id='$update_id'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }


    public function updateAttendance($post,$update_id)
    {
        $attendance="";
        for ($i=1;$i<=200;$i++){

            if(isset($post['roll_'.$i])){
                $attendance .=$post['roll_'.$i].',';
            }
        }
        $attendRoll=rtrim($attendance,',');
        $required=[$attendRoll];
        if(validation::required($required)){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Roll must not be empty.</p>";
            return $message;
        }
        if (isset($attendance)){
            $selectQuery="UPDATE  students_attendances SET roll='$attendRoll' WHERE id='$update_id'";
            $addResult=database::connect()->query($selectQuery);
            if ($addResult){
                $message="<p class='alert alert-success' style='font-size: 12px'><strong>Success!</strong> Your attendance update Successful.</p>";
                return $message;
            }
        }
    }
}
?>