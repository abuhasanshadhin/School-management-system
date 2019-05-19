<?php
class Routine{

    public function create($post){
        $required=[
            $post['class'],
            $post['day'],
            $post['1st_period'],
            $post['2nd_period'],
            $post['3rd_period'],
            $post['4th_period'],
            $post['5th_period'],
            $post['6th_period'],
            $post['7th_period'],
            $post['8th_period'],
            $post['1st_teacher'],
            $post['2nd_teacher'],
            $post['3rd_teacher'],
            $post['4th_teacher'],
            $post['5th_teacher'],
            $post['6th_teacher'],
            $post['7th_teacher'],
            $post['8th_teacher']
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $class=   $post['class'];
        $day=     $post['day'];
        $first=   $post['1st_period'].','.$post['1st_teacher'];
        $second=   $post['2nd_period'].','.$post['2nd_teacher'];
        $third=   $post['3rd_period'].','.$post['3rd_teacher'];
        $fourth=   $post['4th_period'].','.$post['4th_teacher'];
        $fifth=   $post['5th_period'].','.$post['5th_teacher'];
        $six  =   $post['6th_period'].','.$post['6th_teacher'];
        $seven=   $post['7th_period'].','.$post['7th_teacher'];
        $eight=   $post['8th_period'].','.$post['8th_teacher'];

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
        $query="SELECT day FROM routine WHERE day='$day' AND class_name='$class' AND class_group='$student_group'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This day routine is already added.</p>";
            return $message;
        }

        $add_query = "INSERT INTO routine(class_name,class_group,day,1st_period,2nd_period,3rd_period,4th_period,5th_period,6th_period,7th_period,8th_period)
         VALUES('$class','$student_group','$day','$first','$second','$third','$fourth','$fifth','$six','$seven','$eight')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your routine add successful.</p>";
            return $message;
        }

    }


    public function select($class,$group)
    {
        if ($class=='Nine' || $class=='Ten'){
            $query="SELECT * FROM routine WHERE class_name='$class' AND class_group='$group' ORDER BY id DESC";
        }else{
            $query="SELECT * FROM routine WHERE class_name='$class' ORDER BY id DESC";
        }
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    public function selectRoutineOption($post)
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

        echo "<script> window.location='manage_routine.php?value=$value';</script>";


    }


}
?>