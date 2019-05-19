<?php
/**
 *helper Class
 **/
class helper{

    //method for image upload
    public static function imageUpload($file)
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

            $upload = 'upload/' . $unique_name;
            move_uploaded_file($imagePath, $upload);

            return $unique_name;
        }

    }

    public static function delete($table,$id)
    {
        $query="DELETE  FROM  $table WHERE  id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt){

            if($table=='class_six_students' ||$table=='class_seven_students' ||$table=='class_eight_students' ||$table=='class_nine_students' ||$table=='class_ten_students' ||$table=='admission_students'){

                //delete image when update data
                $img_query="SELECT image FROM $table WHERE id='$id'";
                $img_result=database::connect()->query($img_query);
                if($img_result->num_rows>0){
                    $img_result=$img_result->fetch_assoc();
                    unlink($img_result['image']);
                }
            }


            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your data delete successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your data not delete.</p>";
            return $msg;
        }
    }

}