<?php
class Setting{
    
    /*Change school name*/
    public static function changeSchoolName($data){
        $query = "UPDATE setting SET school_name='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>School name has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change welcome message*/
    public static function changeWelcomeMessage($data){
        $query = "UPDATE setting SET welcome_messege='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>Welcome message has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change principle message*/
    public static function changePrincipleMessage($data){
        $query = "UPDATE setting SET principle_message='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>Principle message has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change school address*/
    public static function changeSchoolAddress($data){
        $query = "UPDATE setting SET school_address='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>School address has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change phone number*/
    public static function changePhoneNumber($data){
        $query = "UPDATE setting SET school_phone='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>School phone number has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change email address*/
    public static function changeEmailAddress($data){
        $query = "UPDATE setting SET school_email='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>School email address has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change about school*/
    public static function changeSchoolAbout($data){
        $query = "UPDATE setting SET school_about='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>School about has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change facebook link*/
    public static function changeFacebookLink($data){
        $query = "UPDATE setting SET facebook_link='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>Facebook link has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change youtube link*/
    public static function changeYoutubeLink($data){
        $query = "UPDATE setting SET youtube_link='$data'";
        $response = database::connect()->query($query);
        if($response){
            return "<p class='alert alert-success'>Youtube link has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change school logo*/
    public static function changeSchoolLogo($file){
        $image_name = $file['logo']['name'];
        $image_tmp = $file['logo']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT school_logo FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['school_logo']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET school_logo='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>School logo has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change principle image*/
    public static function changePrincipleImage($file){
        $image_name = $file['principle_image']['name'];
        $image_tmp = $file['principle_image']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT principle_image FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['principle_image']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET principle_image='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Principle image has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change school image*/
    public static function changeSchoolImage($file){
        $image_name = $file['school_image']['name'];
        $image_tmp = $file['school_image']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT school_image FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['school_image']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET school_image='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>School image has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change principle sign*/
    public static function changePrincipleSign($file){
        $image_name = $file['principle_sign']['name'];
        $image_tmp = $file['principle_sign']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT principle_sign FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['principle_sign']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET principle_sign='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Principle sign has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    
    /*Change register sign*/
    public static function changeRegisterSign($file){
        $image_name = $file['register_sign']['name'];
        $image_tmp = $file['register_sign']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT register_sign FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['register_sign']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET register_sign='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Register sign has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    
    /*Change additional sign*/
    public static function changeAdditionalSign($file){
        $image_name = $file['additional_sign']['name'];
        $image_tmp = $file['additional_sign']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT additional_sign FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['additional_sign']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET additional_sign='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Additional sign has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    
    /*Change slider image 1*/
    public static function changeSliderImageOne($file){
        $image_name = $file['slider_image_1']['name'];
        $image_tmp = $file['slider_image_1']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT slider_image_1 FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['slider_image_1']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET slider_image_1='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Slider image one has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change slider image 2*/
    public static function changeSliderImageTwo($file){
        $image_name = $file['slider_image_2']['name'];
        $image_tmp = $file['slider_image_2']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT slider_image_2 FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['slider_image_2']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET slider_image_2='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Slider image two has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    /*Change slider image 3*/
    public static function changeSliderImageThree($file){
        $image_name = $file['slider_image_3']['name'];
        $image_tmp = $file['slider_image_3']['tmp_name'];

        $divide_extention = explode('.', $image_name);
        $file_extention = strtolower(end($divide_extention));
        $unique_name = substr(md5(time()), 0, 3) . "." . $file_extention;
        $uploaded_image = "upload/" . $divide_extention[0] . "_" . $unique_name;
        
        $image_query = "SELECT slider_image_3 FROM setting";
        $response = database::connect()->query($image_query);
        $response = $response->fetch_assoc();
        unlink($response['slider_image_3']);
        
        move_uploaded_file($image_tmp, $uploaded_image);
        $up_query = "UPDATE setting SET slider_image_3='$uploaded_image'";
        $response = database::connect()->query($up_query);
        if($response){
            return "<p class='alert alert-success'>Slider image three has been changed.</p>";
        }else{
            return "<p class='alert alert-danger'><strong>Oops!</strong> Something went wrong.</p>";
        }
    }
    
    
    
}