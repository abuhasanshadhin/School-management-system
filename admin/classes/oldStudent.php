<?php
/**
 *Admission Class
 **/
class oldStudent{

    //select total  student By id with group
    public function selectOldStudents(){

        $query="SELECT * FROM  old_students ORDER BY id DESC ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    //select single  student By id with group
    public function selectSingleStudents($id){

        $query="SELECT * FROM  old_students WHERE id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }
}