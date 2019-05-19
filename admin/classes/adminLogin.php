<?php
//class for admin
require_once 'class.phpmailer.php';

Class  adminLogin{

    //method for admin login
    public function login($post){
        $email=mysqli_real_escape_string(database::connect(),$post['email']);
        $password=mysqli_real_escape_string(database::connect(),$post['password']);
        if(empty($email) || empty($password)){
            $msg= "<p class='alert alert-danger'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }else{
            $query="SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
            $result=database::connect()->query($query);
            if($result->num_rows>0){

                $result=$result->fetch_assoc();
                session::set('addLogin','true');
                session::set('addEmail',$result['email']);
                session::set('addName',$result['name']);


                echo "<script>window.location='index.php';</script>";
            }else{
                $msg= "<p class='alert alert-danger'><strong>Error!</strong> Email or password doesn't match.</p>";
                return $msg;
            }
        }

    }

    public function updateProfile($post)
    {
        $name=mysqli_real_escape_string(database::connect(),$post['name']);
        $email=mysqli_real_escape_string(database::connect(),$post['email']);
        if(empty($email) || empty($email)){
            $msg= "<p class='alert alert-danger'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }
        $query="UPDATE tbl_admin SET name='$name',email='$email'";
        $update=database::connect()->query($query);
        if($update){
            session::set('addName',$name);
            session::set('addEmail',$email);
            $msg= "<p class='alert alert-success'><strong>Success!</strong> Your profile update successful.</p>";
            return $msg;
        }
    }
    public function changePassword($post){
        $old_password=mysqli_real_escape_string(database::connect(),$post['old_password']);
        $password=mysqli_real_escape_string(database::connect(),$post['password']);
        $confirm_password=mysqli_real_escape_string(database::connect(),$post['confirm_password']);

        if(empty($old_password) || empty($password) || empty($confirm_password)){
            $msg= "<p class='alert alert-danger'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }elseif (strlen($password)<5){
            $msg= "<p class='alert alert-danger'><strong>Error!</strong> Your password too short minimum six character.</p>";
            return $msg;
        }elseif ($password !=$confirm_password){
            $msg= "<p class='alert alert-danger'><strong>Error!</strong> Your password and confirm password doesn't match.</p>";
            return $msg;
        }else{
            $query="SELECT * FROM tbl_admin WHERE password='$old_password'";
            $result=database::connect()->query($query);
            if($result->num_rows<1){
                $msg= "<p class='alert alert-danger'><strong>Error!</strong> Your old password doesn't match.</p>";
                return $msg;
            } else{
                $query="UPDATE tbl_admin SET password='$password'";
                $update_result=database::connect()->query($query);
                if ($update_result){
                    $msg= "<p class='alert alert-success'><strong>Success!</strong> Your password update successful.</p>";
                    return $msg;
                }
            }
        }

    }

    public function forgetPassword($post)
    {
        $email=mysqli_real_escape_string(database::connect(),$post['email']);
        if(empty($email)){
            $msg= "<p class='alert alert-danger'><strong'>Error!</strong> Field must not be empty.</p>";
            return $msg;
        }
        $query="SELECT * FROM tbl_admin WHERE email='$email'";
        $result=database::connect()->query($query);
        if($result->num_rows<1){
            $msg= "<p class='alert alert-danger'><strong>Error!</strong> Your email address is invalid.</p>";
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

            $msg= "<p class='alert alert-success'><strong>Success!</strong> Your password send.Check mail now.</p>";
            return $msg;
        }
    }

}
?>
