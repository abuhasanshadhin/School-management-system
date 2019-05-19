<?php

class Result{

    //add new result for a single subject

    public function addResult($post){
        $required=[
          $post['exam'],
          $post['roll'],
          $post['class'],
          $post['sub_name'],
          $post['sub_mark']
        ];
        if(validation::required($required)){
            return validation::required($required);
        }

        if (($post['class']=='class_nine_results' && empty($post['stu_group'])) || ($post['class']=='class_ten_results' && empty($post['stu_group']))){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Please select group option.</p>";
            return $message;
        }

        $exam=$post['exam'];
        $student_roll=$post['roll'];
        $student_class=$post['class'];
        $student_group=$post['stu_group'];
        $subject_name=$post['sub_name'];
        $total_marks=$post['sub_mark'];

        $select_sub="SELECT sub_name FROM $student_class WHERE sub_name='$subject_name' AND roll='$student_roll'";
        $result=database::connect()->query($select_sub);
        if($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This subject name is already added.</p>";
            return $message;
        }

        if($total_marks<=100 && $total_marks>=80){
            $point=5.00;
            $grade="A+";
        }elseif ($total_marks<=79 && $total_marks>=70){
            $point=4.00;
            $grade="A";
        }elseif ($total_marks<=69 && $total_marks>=60){
            $point=3.50;
            $grade="A-";
        }elseif ($total_marks<=59 && $total_marks>=50){
            $point=3.00;
            $grade="B";
        }elseif ($total_marks<=49 && $total_marks>=40){
            $point=2.00;
            $grade="C";
        }elseif ($total_marks<=39 && $total_marks>=33){
            $point=1.00;
            $grade="D";
        }else {
            $point = 0.00;
            $grade = "F";
        }


       if($student_class=='class_nine_results' || $student_class=='class_ten_results'){
            $add_query="INSERT INTO $student_class(roll,stu_group,sub_name,sub_mark,point,grade)
                            VALUES('$student_roll','$student_group','$subject_name','$total_marks','$point','$grade')";
       }else{
            $add_query="INSERT INTO $student_class(roll,sub_name,sub_mark,point,grade)
                            VALUES('$student_roll','$subject_name','$total_marks','$point','$grade')";
       }
            $add_result=database::connect()->query($add_query);
       if($add_result){
           //insert result when all subject is receive and exam is final.
           if($exam == "Final") {

               if ($student_class == 'class_nine_results' || $student_class == 'class_ten_results') {
                   $selectQuery = "SELECT * FROM $student_class WHERE  roll='$student_roll' AND stu_group='$student_group'";
               } else {
                   $selectQuery = "SELECT * FROM $student_class WHERE  roll='$student_roll'";
               }

               $selectResult = database::connect()->query($selectQuery);

               while ($selectArray = $selectResult->fetch_assoc()) {
                   if ($selectArray['grade'] == 'F') {
                       $total_point = 'F';
                       break;
                   }else{
                       $total_point='P';
                   }
               }

               if ($total_point == 'F') {
                   $total_point = '0';
               } else {

                   if ($student_class == 'class_nine_results' || $student_class == 'class_ten_results') {
                       $avg = "SELECT avg(point) FROM $student_class WHERE roll='$student_roll' AND stu_group ='$student_group' ";
                   }else{
                       $avg = "SELECT avg(point) FROM $student_class WHERE roll='$student_roll'";
                   }
                   $avg_r = database::connect()->query($avg)->fetch_assoc();
                   $total_point = $avg_r['avg(point)'];
                   $total_point=number_format($total_point,'2');
               }

               $student_table=$this->manageTable($student_class);

               if($student_table=='class_ten_students' || $student_table=='class_nine_students'){
                   $updateResult = "UPDATE $student_table SET result='$total_point' WHERE roll='$student_roll' AND stu_group='$student_group'";
               }else{
                    $updateResult = "UPDATE $student_table SET result='$total_point' WHERE roll='$student_roll'";
               }
               database::connect()->query($updateResult);

           }

           $message="<p class='alert alert-success'><strong>Success!</strong> Result add successfully.</p>";
           return $message;
       }

    }

    public function manageTable($student_class)
    {
        //student table manage here
        if($student_class == 'class_six_results'){
            $student_table='class_six_students';
            return $student_table;

        }elseif($student_class == 'class_seven_results'){
            $student_table='class_seven_students';
            return $student_table;

        }elseif($student_class == 'class_eight_results'){
            $student_table='class_eight_students';
            return $student_table;

        }elseif($student_class == 'class_nine_results'){
            $student_table='class_nine_students';
            return $student_table;
        }else{
            $student_table='class_ten_students';
            return $student_table;
        }
    }
    public function manageResultTable($student_class)
    {
        //student table manage here
        if($student_class == 'Six'){
            $student_table='class_six_results';
            return $student_table;

        }elseif($student_class == 'Seven'){
            $student_table='class_seven_results';
            return $student_table;

        }elseif($student_class == 'Eight'){
            $student_table='class_eight_results';
            return $student_table;

        }elseif($student_class == 'Nine'){
            $student_table='class_nine_results';
            return $student_table;
        }else{
            $student_table='class_ten_results';
            return $student_table;
        }
    }
    public function selectStudent($post)
    {
        $required=[
            $post['roll'],
            $post['class'],
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        if (($post['class']=='Nine' && empty($post['group'])) || ($post['class']=='Ten' && empty($post['group']))){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Please select group option.</p>";
            return $message;
        }
        if($post['class']=='Nine' || $post['class']=='Ten'){
            $print_details=$post['roll'].'_'.$post['class'].'_'.$post['group'];
        }else{
            $print_details=$post['roll'].'_'.$post['class'].'_0';
        }

        echo "<script>window.location='result_list.php?print_details=$print_details';</script>";


    }
    public function selectStudentForTotalResult($post)
        {
            $required=[
                $post['class'],
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            if (($post['class']=='Nine' && empty($post['group'])) || ($post['class']=='Ten' && empty($post['group']))){
                $message="<p class='alert alert-danger'><strong>Error!</strong> Please select group option.</p>";
                return $message;
            }
            if($post['class']=='Nine' || $post['class']=='Ten'){
                $print_details=$post['class'].'_'.$post['group'];
            }else{
                $print_details=$post['class'].'_0';
            }

            echo "<script>window.location='total_result.php?print_details=$print_details';</script>";


        }

    public function SelectTotalResultByStudent($roll,$class,$group)
    {
        $result_table=$this->manageResultTable($class);

        if ($class == 'Nine' || $class == 'Ten') {
            $query = "SELECT * FROM $result_table WHERE roll='$roll' AND stu_group ='$group' ";
        }else{
            $query = "SELECT * FROM $result_table WHERE roll='$roll'";
        }
        $select_result=database::connect()->query($query);
        if ($select_result->num_rows>0){
            return $select_result;
        }else{
            return false;
        }
    }

    public function avgPoint($roll,$class,$group)
    {
        $result_table=$this->manageResultTable($class);

        if($class=='Nine' || $class=='Ten'){
            $query = "SELECT avg(point)  FROM $result_table WHERE roll='$roll' AND stu_group ='$group' ";
        }else{
            $query = "SELECT avg(point) FROM $result_table WHERE roll='$roll' ";
        }
        $total_point=database::connect()->query($query);
        if($total_point->num_rows>0){
            $total_point=$total_point->fetch_assoc();
            return $total_point['avg(point)'];
        }

    }

    public function selectStudentForMarkSheet($roll,$class,$group)
    {
        if($class=='Six'){
            $student_table='class_six_students';
        }elseif($class=='Seven'){
            $student_table='class_seven_students';
        }elseif($class=='Eight'){
            $student_table='class_eight_students';
        }elseif($class=='Nine'){
            $student_table='class_nine_students';
        }else{
            $student_table='class_ten_students';
        }

        if($class=='Nine' || $class=='Ten'){
            $query="SELECT * FROM $student_table WHERE roll='$roll' AND stu_group='$group'";
        }else{
            $query="SELECT * FROM $student_table WHERE roll='$roll'";
        }
        $result=database::connect()->query($query);
        if($result->num_rows>0){
            return $result;
        }else{
            return false;
        }

    }

    //method for show result in class with roll
    public  function showResult($post){

    }
    //delete result for a single subject

    public function deleteResult($post){
        $del_result=$post['del_tbl'];
        $exp=explode('-',$del_result);

        $del_tbl=$exp[0];
        $del_id=$exp[1];

        $del_query="DELETE FROM $del_tbl WHERE result_id='$del_id'";
        $result=database::connect()->query($del_query);
        if($result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Result delete successfully.</p>";
            return $message;
        }
    }
    //update result for a single subject

    public function updateResult($post,$edit_id,$edit_tbl){
        $student_roll=$post['student_roll'];
        $student_class=$edit_tbl;
        $student_group=$post['student_group'];
        $subject_name=$post['subject_name'];
        $total_marks=$post['total_marks'];
        if($total_marks<=100 && $total_marks>=80){
            $point=5.00;
            $grade="A+";
        }elseif ($total_marks<=79 && $total_marks>=70){
            $point=4.00;
            $grade="A";
        }elseif ($total_marks<=69 && $total_marks>=60){
            $point=3.50;
            $grade="A-";
        }elseif ($total_marks<=59 && $total_marks>=50){
            $point=3.00;
            $grade="B";
        }elseif ($total_marks<=49 && $total_marks>=40){
            $point=2.00;
            $grade="C";
        }elseif ($total_marks<=39 && $total_marks>=33){
            $point=1.00;
            $grade="D";
        }else {
            $point=0.00;
            $grade="F";
        }
        if(empty($student_roll) || empty($student_class) || empty($subject_name) || empty($total_marks )){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Field must not be empty.</p>";
            return $message;
        }elseif (($student_class=='tbl_result_class_nine' && empty($student_group)) || ($student_class=='tbl_result_class_ten' && empty($student_group))){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Please select group option.</p>";
            return $message;
        }elseif(($student_class=='tbl_result_class_nine' && !empty($student_group)) || ($student_class=='tbl_result_class_ten' && !empty($student_group))){
            $update_query="UPDATE  $student_class SET 
                  roll='$student_roll',
                  stu_group='$student_group',
                  sub_name='$subject_name',
                  sub_mark='$total_marks',
                  point='$point',
                  grade='$grade'
                  WHERE result_id='$edit_id'";
            $update_result=database::connect()->query($update_query);
            if($update_result){
                $message="<p class='alert alert-success'><strong>Success!</strong> Result update successfully.</p>";
                return $message;
            }
        }
        else{
            $update_query="UPDATE  $student_class SET 
                  roll='$student_roll',
                  sub_name='$subject_name',
                  sub_mark='$total_marks',
                  point='$point',
                  grade='$grade'
                  WHERE result_id='$edit_id'";
            $update_result=database::connect()->query($update_query);
            if($update_result){
                $message="<p class='alert alert-success'><strong>Success!</strong> Result update successfully.</p>";
                return $message;
            }

        }
    }

}
?>