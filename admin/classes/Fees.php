<?php
    class Fees{
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
        public function addFees($post){
            $required=[
                $post['roll'],
                $post['class'],
                $post['fees'],
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $student_name=$post['name'];
            $student_roll=$post['roll'];
            $student_class=$post['class'];
            if(isset($post['group'])){
                $student_group=$post['group'];
            }
            $student_fees=$post['fees'];

           if(($student_class=='Nine' && !empty($student_group)) || ($student_class=='Ten' && !empty($student_group))) {
               $add_query = "INSERT INTO students_fees(name,roll,class,fees,stu_group)VALUES('$student_name','$student_roll','$student_class','$student_fees','$student_group')";


               $class='class_'.strtolower($student_class).'_students';
               $select_mobile="SELECT mobile FROM $class WHERE roll='$student_roll' AND stu_group='$student_group'";
           }else{
                $add_query="INSERT INTO students_fees(name,roll,class,fees,stu_group)VALUES('$student_name','$student_roll','$student_class','$student_fees','')";


                $class='class_'.strtolower($student_class).'_students';
               $select_mobile="SELECT mobile FROM $class WHERE roll='$student_roll'";
           }

           //send sms
            $result=database::connect()->query($select_mobile);
           if($result->num_rows>0){
               $result=$result->fetch_assoc();
           }else{
               $message="<p class='alert alert-danger'><strong>Error!</strong> This roll is invalid.</p>";
               return $message;
           }


            $text="Thanks! for your pay.Your $student_fees tk receive successful.Powered by \'KPISMS\'";
            if($result){
                $mobile=$result['mobile'];
                $this->sendSms($mobile,$text);
            }



            $add_fees=database::connect()->query($add_query);
            if($add_fees){
                $document= $student_roll.'-'.$student_class.'-0-'.$student_fees;
                echo "<script> window.location='fees_document.php?document=$document';</script>";
            }

        }
        public function selectMonthlyFees()
        {
            $query='SELECT * FROM student_monthly_fees';
            $result=database::connect()->query($query);
            if ($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }
        public function selectMonthlyFeesById($id)
        {
            $query="SELECT * FROM student_monthly_fees WHERE id='$id'";
            $result=database::connect()->query($query);
            if ($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }
        public function updateMonthlyFees($post,$update_id)
        {
            $required=[
                $post['class'],
                $post['fees']
            ];
            if (validation::required($required)){
                return validation::required($required);
            }

            $fees=$post['fees'];

            $update_query="UPDATE student_monthly_fees SET fees=$fees WHERE id=$update_id";
            $result=database::connect()->query($update_query);
            if ($result){
                echo "<script> window.location='monthly_fees.php?msg=1';</script>";
            }

        }

        public function selectFeesForFeesHistory()
        {
            $query="SELECT * FROM students_fees ORDER BY id DESC";
            $result=database::connect()->query($query);
            if ($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }
        public function selectFeesForUpdateFees($id)
        {
            $query="SELECT * FROM students_fees WHERE id='$id' ORDER BY id DESC";
            $result=database::connect()->query($query);
            if ($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }
        public function selectByDate($post){
            $start_date=mysqli_real_escape_string(database::connect(),$post['start_date']);
            $end_date=mysqli_real_escape_string(database::connect(),$post['end_date']);
            if(empty($start_date) || empty($end_date)){
                return "msg";
            }else{
                $start_date= $start_date.' 00:00:00';
                $end_date= $end_date.' 24:00:00';
                $query="SELECT * FROM students_fees WHERE fees_date>='$start_date' AND fees_date<='$end_date'";
                $date_result=database::connect()->query($query);
                if (($date_result)){
                    return $date_result;
                }
            }
        }

        public function selectByOptionDate($post){
            $optionValue=$post['option_value'];
            date_default_timezone_set('Asia/Dhaka');
            $end=date('Y-m-d',time()).' 24:00:00';
            if($optionValue==1){
                $start=date('Y-m-d',time()).' 00:00:00';
            }elseif ($optionValue==7){
                $weakly=60*60*24*7;
                $timestamp=time()-$weakly;
                $start=date('Y-m-d',$timestamp).' 00:00:00';

            }elseif ($optionValue==30){
                $monthly=60*60*24*30;
                $timestamp=time()-$monthly;
                $start=date('Y-m-d',$timestamp).' 00:00:00';

            }else{
                $total=60*60*24*365;
                $timestamp=time()-$total;
                $start=date('Y-m-d',$timestamp).' 00:00:00';

            }

            if (empty($optionValue)){
                return "msg";
            }else{
                $query="SELECT * FROM students_fees WHERE fees_date>='$start' AND fees_date<='$end'";
                $date_result=database::connect()->query($query);
                if (($date_result==true)){
                    return $date_result;
                }
            }
        }

        public function updateSingleFees($post,$edit_id){
            $required=[
                $post['name'],
                $post['roll'],
                $post['class'],
                $post['fees'],
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $student_name=$post['name'];
            $student_roll=$post['roll'];
            $student_class=$post['class'];
            $student_group=$post['group'];
            $student_fees=$post['fees'];

            if (($post['class']=='Nine' && empty($post['group'])) || ($post['class']=='Ten' && empty($post['group']))){
                $message="<p class='alert alert-danger'><strong>Error!</strong> Please select group option.</p>";
                return $message;
            }
            if($post['class']=='Six' || $post['class']=='Seven' || $post['class']=='Eight'){
                $student_group='';
            }

                $update_query="UPDATE students_fees SET
                              name='$student_name',
                              roll='$student_roll',
                              class='$student_class',
                              stu_group='$student_group',
                              fees='$student_fees',
                              fees_date= CURRENT_TIMESTAMP 
                              WHERE id='$edit_id'
                              ";
                $update_result=database::connect()->query($update_query);
                if ($update_result==true){
                    $document= $student_roll.'-'.$student_class.'-0-'.$student_fees;
                    echo "<script> window.location='fees_document.php?document=$document';</script>";
                }



        }

        public function selectStudentForIndividualFees($post)
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
                $fees_details=$post['roll'].'_'.$post['class'].'_'.$post['group'];
            }else{
                $fees_details=$post['roll'].'_'.$post['class'].'_0';
            }

            echo "<script>window.location='individual_fees_history.php?fees_details=$fees_details';</script>";


        }
        public function selectIndividualFees($roll,$class,$group){
                if($group==0){
                    $group='';
                }

                $query="SELECT * FROM students_fees WHERE roll='$roll' AND class='$class' AND stu_group='$group' ORDER BY id DESC";
                $result=database::connect()->query($query);
                if($result->num_rows>0){
                    return $result;
                }else{
                    return false;
                }
        }

        public function selectTotalFees($class,$group)
        {
            if($group=='Science' || $group=='Commerce' || $group=='Arts'){
                $class=$class.'('.$group.')';
            }
            $query="SELECT fees FROM student_monthly_fees WHERE class='$class'";
            $result=database::connect()->query($query);
            if ($result->num_rows>0){
                $result= $result->fetch_assoc();
                $monthly_fees=$result['fees'];
                $total_fees=$monthly_fees*12;
                return $total_fees;
            }else{
                return false;
            }
        }

    }
?>