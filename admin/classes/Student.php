<?php
/**
 *Admission Class
 **/
class Student{
    public function sendSms($mobile,$text)
    {
        // Register your ip first. To do that, contact bpl personnel
        $url = 'http://users.sendsmsbd.com/smsapi';

        $fields = array(
            'api_key' => urlencode('C20025155bdc51935f1fa6.57313350'),
            'type' => urlencode('text'),
            'contacts' => urlencode($mobile),
            'senderid' => '8804445629106',
            'msg' => $text
        );
        $fields_string='';
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.$value.'&';
        }

        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);

        // If you have proxy
        // $proxy = '<proxy-ip>:<proxy-port>';
        // curl_setopt($ch, CURLOPT_PROXY, $proxy);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        if($result === false)
        {
            echo sprintf('<span>%s</span>CURL error:', curl_error($ch));
            return;
        }
        curl_close($ch);
    }
    // method for validation
    public function validation($post,$file,$student_table)
    {
        $required= [
            $post['name'],
            $post['father_name'],
            $post['mother_name'],
            $file['image']['name'],
            $post['birth_date'],
            $post['mobile'],
            $post['gender'],
            $post['result'],
            $post['village'],
            $post['union'],
            $post['sub_district'],
            $post['district'],
        ];
        $data=[
            $post['name'].'_name'=>'6',
            $post['father_name'].'_father name'=>'6',
        ];
        $string=[
            $post['name'].'_Name',
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
        //check mobile valid
        $mobile=$post['mobile'];
        $select_mobile="SELECT mobile FROM $student_table WHERE mobile='$mobile'";
        $result=database::connect()->query($select_mobile);
        if($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This mobile number is already added.</p>";
            return $message;
        }


    }


    // method for crate admission
    public function create($post,$file,$student_table)
    {
        $validation=$this->validation($post,$file,$student_table);
        if($validation == true){
            return $validation;
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

        $name=$post['name'];
        $father_name=    $post['father_name'];
        $mother_name=    $post['mother_name'];
        $birth_date=  $post['birth_date'];
        $mobile=  $post['mobile'];
        $gender=  $post['gender'];
        $result=  $post['result'];
        $address=  $post['village'].', '. $post['union'].', '.$post['sub_district'].', '. $post['district'];

        //manage roll
        if(isset($post['group'])){
            $group=$post['group'];
            $roll_query="SELECT MAX(roll) FROM $student_table WHERE stu_group='$group'";
        }else{
            $roll_query="SELECT MAX(roll) FROM $student_table";
        }

        $roll_result= database::connect()->query($roll_query);
        if($roll_result->num_rows>0){

            $roll_result=$roll_result->fetch_assoc();
            $roll=$roll_result['MAX(roll)']+1;

        }else{
            $roll=1;
        }
        if(isset($post['group'])){

            $group=$post['group'];
            $query="INSERT INTO $student_table(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,stu_group,result,address)
                VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$group','$result','$address')";

        }else{

            $query="INSERT INTO $student_table(roll,student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
                VALUES('$roll','$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$result','$address')";
        }
        $result=database::connect()->query($query);
        if($result){

            $text="Welcome to \'KPISMS\'.Your admission is successful.Your roll is ($roll).Thank you for admission our school.";
            $this->sendSms($mobile,$text);

            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your student admission successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your student admission failed.</p>";
            return $msg;
        }
    }

    public function update($post,$file,$student_table,$id)
    {
        $required= [
            $post['name'],
            $post['father_name'],
            $post['mother_name'],
            $post['birth_date'],
            $post['mobile'],
            $post['gender'],
            $post['result'],
            $post['village'],
            $post['union'],
            $post['sub_district'],
            $post['district'],
        ];
        $data=[
            $post['name'].'_name'=>'6',
            $post['father_name'].'_father name'=>'6',
        ];
        $string=[
            $post['name'].'_Name',
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
                    $img_query="SELECT image FROM $student_table WHERE id='$id'";
                    $img_result=database::connect()->query($img_query);
                    if($img_result->num_rows>0){
                        $img_result=$img_result->fetch_assoc();
                        unlink($img_result['image']);
                    }

                    $unique_name='upload/'.helper::imageUpload($file);

                    $query="UPDATE  $student_table SET image='$unique_name' WHERE id='$id'";
                    database::connect()->query($query);
                }else{
                    return helper::imageUpload($file);
                }
            }
        }

        //manage roll
        if(isset($post['group'])){
            $group=$post['group'];
            $roll_query="SELECT MAX(roll) FROM $student_table WHERE stu_group='$group'";

            $roll_result= database::connect()->query($roll_query);
            if($roll_result->num_rows>0){

                $roll_result=$roll_result->fetch_assoc();
                $roll=$roll_result['MAX(roll)']+1;

            }else{
                $roll=1;
            }

        }
        $name=$post['name'];
        $father_name=    $post['father_name'];
        $mother_name=    $post['mother_name'];
        $birth_date=  $post['birth_date'];
        $mobile=  $post['mobile'];
        $gender=  $post['gender'];
        $result=  $post['result'];
        $address=  $post['village'].', '. $post['union'].', '.$post['sub_district'].', '. $post['district'];
            if(isset($post['group'])){
                $group=$post['group'];
             $query="UPDATE  $student_table SET
             roll='$roll',
             student_name='$name',
             father_name='$father_name',
             mother_name='$mother_name',
             gender='$gender',
             birth_date='$birth_date',
             mobile='$mobile',
             stu_group='$group',
             result='$result',
             address='$address'
             WHERE id='$id'";
            }else{

             $query="UPDATE  $student_table SET
             student_name='$name',
             father_name='$father_name',
             mother_name='$mother_name',
             gender='$gender',
             birth_date='$birth_date',
             mobile='$mobile',
             result='$result',
             address='$address'
             WHERE id='$id'";
            }

            $result=database::connect()->query($query);
            if($result){
                $msg="<p class='alert alert-success'><strong>Success ! </strong>Your student update successful.</p>";
                return $msg;
            }else{
                $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your student update failed.</p>";
                return $msg;
            }

    }


    //select student for manage student
    public function select($table){

        $query="SELECT * FROM  $table ORDER BY result DESC ";
        $restlt=database::connect()->query($query);
        if($restlt){
            if($restlt->num_rows>0){

                return $restlt;

            }else{
                return false;
            }
        }

    }
    //select student with group
    public function selectWithGroup($table,$group){

        $query="SELECT * FROM  $table WHERE stu_group='$group' ORDER BY result DESC ";
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

    //select single  student By id with group
    public function singleStudent($class,$id){

        $table=$this->manageTable($class);

        $query="SELECT * FROM  $table WHERE id='$id' ORDER BY result DESC ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }
}