<?php
    // class for send mail
    require_once 'class.phpmailer.php';

class Communication{

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

    public function create($post){
        $required=[
            $post['mobile'],
            $post['description']
        ];
        if(validation::required($required)){
            return validation::required($required);
        }

        $mobile=$post['mobile'];
        $description=$post['description'];

        if(isset($post['email']) && !empty($post['email'])){
          $email=$post['email'];

            $subject = "Message From High School";
            $msg = $post['description'];

            $body             = $msg;
            $mail = new PHPMailer();
            $mail->AddReplyTo("mamunur200020@gmail.com","HiGH SCHOOL");
            $mail->SetFrom('mamunur200020@gmail.com', 'HiGH SCHOOL');
            $mail->AddReplyTo("mamunur200020@gmail.com","HiGH SCHOOL");
            $address = $post['email'];
            $mail->AddAddress($address, "User");
            $mail->Subject    = $subject;
            $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            $mail->MsgHTML($body);
            $mail->Send();

        }else{
            $email='';
        }

        $add_query = "INSERT INTO total_communication(mobile,email,description)
        VALUES('$mobile','$email','$description')";

        $add_result=database::connect()->query($add_query);
        if($add_result){
            $this->sendSms($mobile,$description);
            $message="<p class='alert alert-success'><strong>Success!</strong> Your message send successful.</p>";
            return $message;
        }

    }

    public function select()
    {
        $query="SELECT * FROM total_communication  ORDER BY id DESC";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    //select unseen message here

    public function selectUnseenComplain()
    {
        $query="SELECT * FROM total_complain WHERE status='0'  ORDER BY id DESC";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    public function selectSeenComplain()
    {
        $query="SELECT * FROM total_complain WHERE status='1' ORDER BY id DESC";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    public function selectSingleComplain($com_id)
    {
        $query="SELECT * FROM total_complain WHERE id='$com_id'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    //update complain
    public function updateStatus($com_id)
    {
        $query="UPDATE  total_complain SET status='1' WHERE id='$com_id'";
        database::connect()->query($query);
    }

}
?>