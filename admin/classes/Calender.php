<?php
class Calender{

    public function create($post){
        $required=[
            $post['day'],
            $post['month'],
            $post['holiday_description']
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $day=$post['day'];
        $month=$post['month'];
        $holiday=$post['holiday_description'];

        //check subject name
        $query="SELECT * FROM calendar WHERE day='$day' AND month='$month'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> Your holiday is already added.</p>";
            return $message;
        }

        $add_query = "INSERT INTO calendar(day,month,holiday)
      VALUES('$day','$month','$holiday')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your holiday add successful.</p>";
            return $message;
        }

    }


    public function select()
    {
            $query="SELECT * FROM calendar  ORDER BY id DESC";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }

}
?>