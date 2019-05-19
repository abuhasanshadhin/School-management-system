<?php
/**
 *Admission Class
 **/
class Shifted{

    public function shiftedStatus()
    {
        $query="SELECT * FROM setting";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $result=$result->fetch_assoc();
            return $result['shifted_status'];
        }else{
            return false;
        }
    }

    public function updateStatus($status,$table)
    {
        $query="SELECT * FROM $table";
        $result=database::connect()->query($query);
        if($result->num_rows<1){
            $update="UPDATE setting SET shifted_status='$status'";
            database::connect()->query($update);
        }
    }

    //// update when select group
    public function updateStatusWithGroup($status,$table,$group)
    {
        $query="SELECT * FROM $table WHERE stu_group='$group'";
        $result=database::connect()->query($query);
        if($result->num_rows<1){
            $update="UPDATE setting SET shifted_status='$status'";
            database::connect()->query($update);
        }
    }

    /*

      shifted class nine and Ten student here
     */
    public function selectTotalStudentClassTenScience($class,$group)
    {
        $query="SELECT * FROM  $class WHERE stu_group='$group'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectClassTenStudent($class,$group)
    {
        $query="SELECT * FROM  $class WHERE stu_group='$group' ORDER BY result DESC limit 5";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function insertOldStudent($class,$old_students,$shift_group)
    {
        $selectClassTenStudent=$this->selectClassTenStudent($class,$shift_group);
        if($selectClassTenStudent){
            foreach ($selectClassTenStudent as $value){
                $name=$value['student_name'];
                $father_name=$value['father_name'];
                $mother_name=$value['mother_name'];
                $gender=$value['gender'];
                $unique_name=$value['image'];
                $birth_date=$value['birth_date'];
                $mobile=$value['mobile'];
                $group=$value['stu_group'];
                $exam_result=$value['result'];
                $address=$value['address'];



                $roll_query="SELECT MAX(roll) FROM $old_students WHERE stu_group='$shift_group'";
                $roll_result= database::connect()->query($roll_query);
                if($roll_result->num_rows>0){
                    $roll_result=$roll_result->fetch_assoc();
                    $roll=$roll_result['MAX(roll)']+1;
                }else{
                    $roll=1;
                }
                $query="INSERT INTO $old_students (roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,stu_group,result,address)
                   VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$group','$exam_result','$address')";
                database::connect()->query($query);

                $id=$value['id'];
                $del_query="DELETE FROM $class WHERE id='$id'";
                database::connect()->query($del_query);
                echo "<script>window.location='shifted_student.php';</script>";

            }
        }
    }



  /*

   shifted class Eight student here

  */


    public function selectTotalStudentClassEight()
    {
        $query="SELECT * FROM  class_eight_students";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectClassEightStudent()
    {
        $query="SELECT * FROM  class_eight_students ORDER BY result DESC limit 5";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function insertClassNine()
    {
        $selectClassTenStudent=$this->selectClassEightStudent();
        if($selectClassTenStudent){
            foreach ($selectClassTenStudent as $value){
                $name=$value['student_name'];
                $father_name=$value['father_name'];
                $mother_name=$value['mother_name'];
                $gender=$value['gender'];
                $unique_name=$value['image'];
                $birth_date=$value['birth_date'];
                $mobile=$value['mobile'];
                $group='Pending';
                $exam_result=$value['result'];
                $address=$value['address'];



                $roll_query="SELECT MAX(roll) FROM class_nine_students";
                $roll_result= database::connect()->query($roll_query);
                if($roll_result->num_rows>0){
                    $roll_result=$roll_result->fetch_assoc();
                    $roll=$roll_result['MAX(roll)']+1;
                }else{
                    $roll=1;
                }
                $query="INSERT INTO class_nine_students(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,stu_group,result,address)
                   VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$group','$exam_result','$address')";
                database::connect()->query($query);

                $id=$value['id'];
                $del_query="DELETE FROM class_eight_students WHERE id='$id'";
                database::connect()->query($del_query);
                echo "<script>window.location='shifted_student.php';</script>";

            }
        }
    }





  /*

   shifted class Seven student here

  */


    public function selectTotalStudentClassSeven()
    {
        $query="SELECT * FROM  class_seven_students";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectClassSevenStudent()
    {
        $query="SELECT * FROM  class_seven_students ORDER BY result DESC limit 5";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function insertClassEight()
    {
        $selectClassTenStudent=$this->selectClassSevenStudent();
        if($selectClassTenStudent){
            foreach ($selectClassTenStudent as $value){
                $name=$value['student_name'];
                $father_name=$value['father_name'];
                $mother_name=$value['mother_name'];
                $gender=$value['gender'];
                $unique_name=$value['image'];
                $birth_date=$value['birth_date'];
                $mobile=$value['mobile'];
                $exam_result=$value['result'];
                $address=$value['address'];



                $roll_query="SELECT MAX(roll) FROM class_eight_students";
                $roll_result= database::connect()->query($roll_query);
                if($roll_result->num_rows>0){
                    $roll_result=$roll_result->fetch_assoc();
                    $roll=$roll_result['MAX(roll)']+1;
                }else{
                    $roll=1;
                }
                $query="INSERT INTO class_eight_students(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
                   VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$exam_result','$address')";
                database::connect()->query($query);

                $id=$value['id'];
                $del_query="DELETE FROM class_seven_students WHERE id='$id'";
                database::connect()->query($del_query);
                echo "<script>window.location='shifted_student.php';</script>";

            }
        }
    }





  /*

   shifted class Six student here

  */


    public function selectTotalStudentClassSix()
    {
        $query="SELECT * FROM  class_six_students";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectClassSixStudent()
    {
        $query="SELECT * FROM  class_six_students ORDER BY result DESC limit 5";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function insertClassSeven()
    {
        $selectClassTenStudent=$this->selectClassSixStudent();
        if($selectClassTenStudent){
            foreach ($selectClassTenStudent as $value){
                $name=$value['student_name'];
                $father_name=$value['father_name'];
                $mother_name=$value['mother_name'];
                $gender=$value['gender'];
                $unique_name=$value['image'];
                $birth_date=$value['birth_date'];
                $mobile=$value['mobile'];
                $exam_result=$value['result'];
                $address=$value['address'];



                $roll_query="SELECT MAX(roll) FROM class_seven_students";
                $roll_result= database::connect()->query($roll_query);
                if($roll_result->num_rows>0){
                    $roll_result=$roll_result->fetch_assoc();
                    $roll=$roll_result['MAX(roll)']+1;
                }else{
                    $roll=1;
                }
                $query="INSERT INTO class_seven_students(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
                   VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$exam_result','$address')";
                database::connect()->query($query);

                $id=$value['id'];
                $del_query="DELETE FROM class_six_students WHERE id='$id'";
                database::connect()->query($del_query);
                echo "<script>window.location='shifted_student.php';</script>";

            }
        }
    }





  /*

   shifted admission  student here

  */


    public function selectTotalStudentAdmission()
    {
        $query="SELECT * FROM  admission_students";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectAdmissionStudent()
    {
        $query="SELECT * FROM  admission_students ORDER BY result DESC limit 5";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function insertClassSix()
    {
        $selectClassTenStudent=$this->selectAdmissionStudent();
        if($selectClassTenStudent){
            foreach ($selectClassTenStudent as $value){
                $name=$value['student_name'];
                $father_name=$value['father_name'];
                $mother_name=$value['mother_name'];
                $gender=$value['gender'];
                $unique_name=$value['image'];
                $birth_date=$value['birth_date'];
                $mobile=$value['mobile'];
                $exam_result=$value['result'];
                $address=$value['address'];



                $roll_query="SELECT MAX(roll) FROM class_six_students";
                $roll_result= database::connect()->query($roll_query);
                if($roll_result->num_rows>0){
                    $roll_result=$roll_result->fetch_assoc();
                    $roll=$roll_result['MAX(roll)']+1;
                }else{
                    $roll=1;
                }
                $query="INSERT INTO class_six_students(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
                   VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$exam_result','$address')";
                database::connect()->query($query);

                $id=$value['id'];
                $del_query="DELETE FROM admission_students WHERE id='$id'";
                database::connect()->query($del_query);
                echo "<script>window.location='shifted_student.php';</script>";

            }
        }
    }




}