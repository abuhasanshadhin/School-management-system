<?php
class Book{

    public function create($post){
        $required=[
            $post['class'],
            $post['subject_code'],
            $post['subject_name'],
            $post['theory_marks'],
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $class=$post['class'];
        $subject_code=$post['subject_code'];
        $subject_name=$post['subject_name'];
        $theory_marks=$post['theory_marks'];
        $objective_marks=$post['objective_marks'];
        $practical_marks=$post['practical_marks'];
        if ($class=='Nine' || $class=='Ten'){
            $student_group=$post['group'];
            $required=[
                $post['group']
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
        }else{
            $student_group='';
        }
        //check subject code
        $query="SELECT subject_code FROM books WHERE subject_code='$subject_code' AND class_name='$class' AND class_group='$student_group'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Your subject code is already added.</p>";
            return $message;
        }
        //check subject name
        $query="SELECT subject_name FROM books WHERE subject_name='$subject_name' AND class_name='$class' AND class_group='$student_group'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Your books is already added.</p>";
            return $message;
        }

         $add_query = "INSERT INTO books(class_name,class_group,subject_code,subject_name,theory_marks,objective_marks,practical_marks)
      VALUES('$class','$student_group','$subject_code','$subject_name','$theory_marks','$objective_marks','$practical_marks')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your books add successful.</p>";
            return $message;
        }

    }


    public function select($class,$group)
    {
        if ($class=='Nine' || $class=='Ten'){
            $query="SELECT * FROM books WHERE class_name='$class' AND class_group='$group' ORDER BY id DESC";
        }else{
            $query="SELECT * FROM books WHERE class_name='$class' ORDER BY id DESC";
        }
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    public function selectBooksOption($post)
    {
        $class=$post['class'];

        if($class=='Nine' || $class=='Ten'){
            $group=$post['group'];
            $required=[
                $post['class'],
                $post['group']
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $value=$class.'_'.$group;
        }else{
            $required=[
                $post['class'],
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $value=$class;
        }

        echo "<script> window.location='manage_books.php?value=$value';</script>";


    }


}
?>