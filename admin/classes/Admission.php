<?php
/**
 *Admission Class
 **/
class Admission{

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
    public function validation($post,$file)
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
            $post['name'].'_name'=>'10',
            $post['father_name'].'_father name'=>'10',
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
        $select_mobile="SELECT mobile FROM admission_students WHERE mobile='$mobile'";
        $result=database::connect()->query($select_mobile);
        if($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This mobile number is already added.</p>";
            return $message;
        }
    }

    // method for crate admission
    public function create($post,$file)
    {
        $validation=$this->validation($post,$file);
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

        $query="INSERT INTO admission_students(student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
                VALUES('$name','$father_name','$mother_name' ,'$gender','$unique_name','$birth_date','$mobile','$result','$address')";

        $result=database::connect()->query($query);

        if($result){
            $text="Welcome to \'KPISMS\'.Your admission is successful.Your roll is pending,we create your roll by your result as soon as possible.Thank you for admission.";
            $this->sendSms($mobile,$text);
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your student admission successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your student admission failed.</p>";
            return $msg;
        }


    }

    public function update($post,$file,$id)
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
                    $img_query="SELECT image FROM admission_students WHERE id='$id'";
                    $img_result=database::connect()->query($img_query);
                    if($img_result->num_rows>0){
                        $img_result=$img_result->fetch_assoc();
                        unlink($img_result['image']);
                    }

                    $unique_name='upload/'.helper::imageUpload($file);

                    $query="UPDATE  admission_students SET image='$unique_name' WHERE id='$id'";
                    database::connect()->query($query);
                }else{
                    return helper::imageUpload($file);
                }
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

            $query="UPDATE  admission_students SET
             student_name='$name',
             father_name='$father_name',
             mother_name='$mother_name',
             gender='$gender',
             birth_date='$birth_date',
             mobile='$mobile',
             result='$result',
             address='$address'
             WHERE id='$id'";


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
    public function select(){
            $query="SELECT * FROM  admission_students ORDER BY result DESC ";
            $restlt=database::connect()->query($query);
            if($restlt->num_rows>0){
                return $restlt;
            }else{
                return false;
            }

    }
    //select student for manage student
    public function singleStudent($stu_id){
            $query="SELECT * FROM  admission_students WHERE id='$stu_id'";
            $restlt=database::connect()->query($query);
            if($restlt->num_rows>0){
                return $restlt;
            }else{
                return false;
            }

    }

}