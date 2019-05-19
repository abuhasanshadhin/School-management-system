<?php
/**
 *Admission Class
 **/
class Staff{
// method for validation
    public function validation($post,$file)
    {
        $required= [
            $post['staff_name'],
            $post['father_name'],
            $post['mother_name'],
            $file['image']['name'],
            $post['birth_date'],
            $post['mobile'],
            $post['gender'],
            $post['village'],
            $post['union'],
            $post['sub_district'],
            $post['district'],
            $post['national_id'],
            $post['education'],
            $post['designation'],
        ];
        $data=[
            $post['staff_name'].'_name'=>'6',
            $post['father_name'].'_father name'=>'6',
            $post['mother_name'].'_Mother name'=>'6',
        ];
        $string=[
            $post['staff_name'].'_Name',
            $post['father_name'].'_Father name',
            $post['mother_name'].'_Mother name',
            $post['village'].'_Village',
            $post['union'].'_Union',
            $post['sub_district'].'_Sub district',
            $post['district'].'_District',
            $post['education'].'_Education',
            $post['designation'].'_Designation'
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        if(validation::string($string)){
            return validation::string($string);
        }
        if(Validation::length($data)){
            return validation::length($data);
        }
    }

    // method for crate admission
    public function create($post,$file)
    {
        $validation=$this->validation($post,$file);
        if($validation == true){
            return $validation;
        }
        //check mobile valid
        $mobile=$post['mobile'];
        $select_mobile="SELECT mobile FROM total_staff WHERE mobile='$mobile'";
        $result=database::connect()->query($select_mobile);
        if($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This mobile number is already added.</p>";
            return $message;
        }
        if(helper::imageUpload($file)==true){
            $exp=explode('.',Helper::imageUpload($file));
            $permission=array("jpg","jpeg","png","zip","rar");
            if(in_array($exp[1],$permission)==true){
                $unique_name='upload/'.helper::imageUpload($file);
            }else{
                return helper::imageUpload($file);
            }
        }

        $name=$post['staff_name'];
        $father_name=$post['father_name'];
        $mother_name=$post['mother_name'];
        $birth_date=$post['birth_date'];
        $mobile=  $post['mobile'];
        $gender=  $post['gender'];
        $email=  $post['email'];
        $address=  $post['village'].', '. $post['union'].', '.$post['sub_district'].', '. $post['district'];
        $national_id=  $post['national_id'];
        $education=  $post['education'];
        $designation=  $post['designation'];

        //manage id
        $roll_query="SELECT * FROM total_staff";
        $roll_result= database::connect()->query($roll_query);
        if($roll_result->num_rows<=0){
            $id=203001;
            $query="INSERT INTO total_staff(id,staff_name,father_name,mother_name,gender,image,birth_date,mobile,email,address,national_id,education,designation)
                VALUES('$id','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$email','$address','$national_id','$education','$designation')";
        }else {
            $query="INSERT INTO total_staff(staff_name,father_name,mother_name,gender,image,birth_date,mobile,email,address,national_id,education,designation)
                VALUES('$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$email','$address','$national_id','$education','$designation')";

        }

        $result=database::connect()->query($query);
        if($result){
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your staff add successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your staff add failed.</p>";
            return $msg;
        }
    }


    public function update($post,$file,$staff_id)
    {
        $required= [
            $post['staff_name'],
            $post['father_name'],
            $post['mother_name'],
            $post['birth_date'],
            $post['mobile'],
            $post['gender'],
            $post['village'],
            $post['union'],
            $post['sub_district'],
            $post['district'],
            $post['national_id'],
            $post['education'],
            $post['designation'],
        ];
        $data=[
            $post['staff_name'].'_name'=>'6',
            $post['father_name'].'_father name'=>'6',
        ];
        $string=[
            $post['staff_name'].'_Name',
            $post['father_name'].'_Father name',
            $post['mother_name'].'_Mother name',
            $post['village'].'_Village',
            $post['union'].'_Union',
            $post['sub_district'].'_Sub district',
            $post['district'].'_District'
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        if(validation::string($string)){
            return validation::string($string);
        }
        if(Validation::length($data)){
            return validation::length($data);
        }

        if($file['image']['name'] !=''){
            if(helper::imageUpload($file)==true){
                $exp=explode('.',Helper::imageUpload($file));
                $permission=array("jpg","jpeg","png","zip","rar");

                if(in_array($exp[1],$permission)==true){

                    //delete image when update data
                    $img_query="SELECT image FROM total_staff WHERE id='$staff_id'";
                    $img_result=database::connect()->query($img_query);
                    if($img_result->num_rows>0){
                        $img_result=$img_result->fetch_assoc();
                        unlink($img_result['image']);
                    }

                    $unique_name='upload/'.helper::imageUpload($file);

                    $query="UPDATE  total_staff SET image='$unique_name' WHERE id='$staff_id'";
                    database::connect()->query($query);
                }else{
                    return helper::imageUpload($file);
                }
            }
        }


        $name=$post['staff_name'];
        $father_name=    $post['father_name'];
        $mother_name=    $post['mother_name'];
        $birth_date=  $post['birth_date'];
        $mobile=  $post['mobile'];
        $gender=  $post['gender'];
        $email=  $post['email'];
        $address=  $post['village'].', '. $post['union'].', '.$post['sub_district'].', '. $post['district'];
        $national_id=  $post['national_id'];
        $education=  $post['education'];
        $designation=  $post['designation'];

        $query="UPDATE  total_staff SET
             staff_name='$name',
             father_name='$father_name',
             mother_name='$mother_name',
             gender='$gender',
             birth_date='$birth_date',
             mobile='$mobile',
             email='$email',
             address='$address',
             national_id='$national_id',
             education='$education',
             designation='$designation'
             WHERE id='$staff_id'";

        $result=database::connect()->query($query);
        if($result){
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your Staff update successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your Staff update failed.</p>";
            return $msg;
        }

    }
    //select student for manage student
    public function selectTotalStaff(){

        $query="SELECT * FROM  total_staff ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    //select single  student By id with group
    public function singleStaff($id){

        $query="SELECT * FROM  total_staff WHERE id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    public function addAttendance($post){
        $attend_date=$_POST['attendance_date'];
        $attendance="";
        for ($i=203000;$i<=1203099;$i++){
            if(isset($post['id_'.$i])){
                $attendance .=$post['id_'.$i].',';
            }
        }
        $total_id=rtrim($attendance,',');
        $required=[$total_id];
        if (empty($attend_date)){
            $message="<p class='alert alert-danger' style=''><strong>Error!</strong> Attendance date must not be empty.</p>";
            return $message;
        }
        if(validation::required($required)){
            $message="<p class='alert alert-danger' style=''><strong>Error!</strong> Staff id must not be empty.</p>";
            return $message;
        }
        //check date here
        $query="SELECT * FROM  staff_attendance WHERE attendance_date='$attend_date'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            $message="<p class='alert alert-danger' style='' ><strong>Error!</strong> Attendance is already received.</p>";
            return $message;
        }

        if (isset($attendance)){
            $selectQuery="INSERT INTO staff_attendance (staff_id,attendance_date)VALUES ('$total_id','$attend_date')";

            $addResult=database::connect()->query($selectQuery);
            if ($addResult){
                $message="<p class='alert alert-success' style=''><strong>Success!</strong> Attendance receive Successful.</p>";
                return $message;
            }
        }
    }
    public function selectAttendance()
    {
        $query="SELECT * FROM  staff_attendance ORDER BY id DESC";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){
            return $restlt;
        }else{
            return false;
        }
    }
    public function selectAttendanceById($update_id)
    {
        $query="SELECT * FROM  staff_attendance WHERE id='$update_id'";
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
        for ($i=203000;$i<=203099;$i++){

            if(isset($post['id_'.$i])){
                $attendance .=$post['id_'.$i].',';
            }
        }
        $attendId=rtrim($attendance,',');
        if (isset($attendance)){
            $selectQuery="UPDATE  staff_attendance SET staff_id='$attendId' WHERE id='$update_id'";
            $addResult=database::connect()->query($selectQuery);
            if ($addResult){
                $message="<p class='alert alert-success'><strong>Success!</strong> Your attendance update Successful.</p>";
                return $message;
            }
        }
    }
}