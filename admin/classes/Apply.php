<?php
/**
 *Admission Class
 **/
class Apply{
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
    //select student for manage student
    public function select(){

        $query="SELECT * FROM  online_admission ORDER BY id DESC ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    // method for crate admission
    public function move($stu_id)
    {
        $select_data="SELECT * FROM online_admission WHERE id='$stu_id'";
        $select_result=database::connect()->query($select_data)->fetch_assoc();
        $name=$select_result['student_name'];
        $father_name=$select_result['father_name'];
        $mother_name=$select_result['mother_name'];
        $gender=$select_result['gender'];
        $unique_name=$select_result['image'];
        $birth_date=$select_result['birth_date'];
        $mobile=$select_result['mobile'];
        $result='';
        $address=$select_result['address'];



        $query="INSERT INTO admission_students(student_name,father_name,mother_name,gender,image,birth_date,mobile,result,address)
            VALUES('$name','$father_name','$mother_name','$gender','$unique_name','$birth_date','$mobile','$result','$address')";
        $result=database::connect()->query($query);
        if($result){
            $del_query="DELETE FROM online_admission WHERE id='$stu_id'";
            database::connect()->query($del_query);
           /* $text="Welcome to \'KPISMS\'.Your admission is successful.Your roll is pending,we create your roll by your result as soon as possible.Thank you for admission.";
            $this->sendSms($mobile,$text);*/
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your student move successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your student move failed.</p>";
            return $msg;
        }
    }




}