<?php
//class for admin
require_once '../classes/class.phpmailer.php';

Class  teacherLogin{

    //method for admin login
    public function login($post){
        $email=mysqli_real_escape_string(database::connect(),$post['email']);
        $password=mysqli_real_escape_string(database::connect(),$post['password']);
        if(empty($email) || empty($password)){
            $message="<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Field must not be empty.</p>";
            return $message;
        }else{
            $query="SELECT * FROM total_teachers WHERE email='$email' AND password='$password'";
            $result=database::connect()->query($query);
            if($result->num_rows>0){

                $result=$result->fetch_assoc();
                session::set('teacherLogin','true');
                session::set('teacherEmail',$result['email']);
                session::set('teacherId',$result['id']);
                session::set('teacherName',$result['name']);


                echo "<script>window.location='index.php';</script>";
            }else{
                $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Email or password doesn't match.</p>";
                return $msg;
            }
        }

    }

    public function selectTeacher($teacher_id)
    {
        $query="SELECT * FROM total_teachers WHERE id='$teacher_id'";
        $result=database::connect()->query($query);
        if ($result){
            return $result;
        }else{
            return false;
        }
    }
    public function imageUpload($file)
    {
        $permission = array("jpg", "jpeg", "png", "zip", "rar");
        $imageName = $file['image']['name'];
        //$imageSize = $file['image']['size'];
        $imagePath = $file['image']['tmp_name'];
        $div_name = explode('.', "$imageName");
        $ext = strtolower(end($div_name));

        $unique_name = substr(md5(time()), 0, 30) . '.' . $ext;
        if (in_array($ext, $permission) === false) {
            $msg = "<p class='alert alert-danger'><strong>Error! </strong>Only :-" . implode(', ', $permission) . " file uploaded.</p>";
            return $msg;
        } else {

            $upload = '../upload/' . $unique_name;
            move_uploaded_file($imagePath, $upload);

            return $unique_name;
        }

    }

    public function updateProfile($post,$file,$teacher_id)
    {
        $required= [
            $post['teacher_name'],
            $post['father_name'],
            $post['mobile'],
            $post['email'],
        ];
        $data=[
            $post['teacher_name'].'_name'=>'6',
            $post['father_name'].'_father name'=>'6',
        ];
        $string=[
            $post['teacher_name'].'_Name',
            $post['father_name'].'_Father name',
        ];
        if(validation::required($required)){
            $msg="<p class='alert alert-danger' style='font-size: 12px'><strong>Error ! </strong>Field must not be empty</p>";
            return $msg;
        }
        if(validation::string($string)){
            $msg="<p class='alert alert-danger' style='font-size: 12px'><strong>Error ! </strong>Your father name is must be character.</p>";
            return $msg;
        }
        if(Validation::length($data)){
            $msg="<p class='alert alert-danger' style='font-size: 12px'><strong>Error ! </strong>Your field length too short.</p>";
            return $msg;
        }
        if($file['image']['name'] !=''){
            if($this->imageUpload($file)==true){
                $exp=explode('.',$this->imageUpload($file));
                $permission=array("jpg","jpeg","png","zip","rar");

                if(in_array($exp[1],$permission)==true){

                    //delete image when update data
                    $img_query="SELECT image FROM total_teachers WHERE id='$teacher_id'";
                    $img_result=database::connect()->query($img_query);
                    if($img_result->num_rows>0){
                        $img_result=$img_result->fetch_assoc();
                        $unl='../'.$img_result['image'];
                        unlink($unl);
                    }

                    $unique_name='upload/'.$this->imageUpload($file);

                    $query="UPDATE  total_teachers SET image='$unique_name' WHERE id='$teacher_id'";
                    database::connect()->query($query);
                }else{
                    return $this->imageUpload($file);
                }
            }
        }


        $name=$post['teacher_name'];
        $father_name=    $post['father_name'];
        $mobile=  $post['mobile'];
        $email=  $post['email'];

        $query="UPDATE  total_teachers SET
             teacher_name='$name',
             father_name='$father_name',
             mobile='$mobile',
             email='$email'
             WHERE id='$teacher_id'";

        $result=database::connect()->query($query);
        if($result){
            $msg="<p class='alert alert-success'  style='font-size: 12px'><strong>Success ! </strong>Your profile update successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger' style='font-size: 12px'><strong>Error ! </strong>Your profile update failed.</p>";
            return $msg;
        }

    }
    public function changePassword($post,$teacher_id){
        $old_password=mysqli_real_escape_string(database::connect(),$post['old_password']);
        $password=mysqli_real_escape_string(database::connect(),$post['password']);
        $confirm_password=mysqli_real_escape_string(database::connect(),$post['confirm_password']);

        if(empty($old_password) || empty($password) || empty($confirm_password)){
            $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }elseif (strlen($password)<5){
            $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Your password too short minimum six character.</p>";
            return $msg;
        }elseif ($password !=$confirm_password){
            $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Your password and confirm password doesn't match.</p>";
            return $msg;
        }else{
            $query="SELECT * FROM total_teachers WHERE password='$old_password' AND id='$teacher_id'";
            $result=database::connect()->query($query);
            if($result->num_rows<1){
                $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong>Error!</strong> Your old password doesn't match.</p>";
                return $msg;
            } else{
                $query="UPDATE total_teachers SET password='$password' WHERE id='$teacher_id'";
                $update_result=database::connect()->query($query);
                if ($update_result){
                    $msg= "<p class='alert alert-success' style='font-size: 12px'><strong>Success!</strong> Your password update successful.</p>";
                    return $msg;
                }
            }
        }

    }

    public function forgetPassword($post)
    {
        $email=mysqli_real_escape_string(database::connect(),$post['email']);
        if(empty($email)){
            $msg= "<p class='alert alert-danger' style='font-size: 12px'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }
        $query="SELECT * FROM total_teachers WHERE email='$email'";
        $result=database::connect()->query($query);
        if($result->num_rows<1){
            $msg= "<p class='alert alert-danger'  style='font-size: 12px'><strong>Error!</strong> Your email address is invalid.</p>";
            return $msg;
        }else{
            $result=$result->fetch_assoc();
            $password=$result['password'];

            $subject = "Change Password";
            $msg = "WELCOME!Our high school management soft.Your email address is: $email and password is: $password .Thanks your for use our software.";

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

            $msg= "<p class='alert alert-success'  style='font-size: 12px'><strong>Success!</strong> Your password send.Check mail now.</p>";
            return $msg;
        }
    }

}
?>
