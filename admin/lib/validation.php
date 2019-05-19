<?php
/**
 *Session Class
 **/
class validation{


    public static function required($required=[])
    {
        if(is_array($required) && count($required)>0){
            foreach ($required as $key=>$value){
                $value = mysqli_real_escape_string(Database::connect(),$value);
                if(empty($value)){
                    $msg="<p class='alert alert-danger'><strong>Error ! </strong>Please fill up the required field.</p>";
                    return $msg;
                }
            }
        }
    }
    public static function length($data)
    {
        foreach ($data as $key=>$value){

            $exp=explode('_',$key);
            $string_len=strlen($exp[0]);
            $name=$exp[1];

            if($string_len<$value){
                $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your $name length is too short.</p>";
                return $msg;
            }
        }
    }
    public static function string($data)
    {
        foreach ($data as $key=>$value){
            $exp=explode('_',$value);
            $string=$exp[0];
            $name=$exp[1];
            $regex= preg_match_all('/[0-9\-\!$%\&\*\(\)\{\}\[\]\~\`]/',$string);
            if($regex==true){
                $msg="<p class='alert alert-danger'><strong>Error ! </strong> $name is must be string.</p>";
                return $msg;
            }
        }

    }

}

if(isset($_GET['query'])){
    $value = $_GET['query'];
    $formfield = $_GET['field'];

    if ($formfield == "class") {
        if($value=='Nine' || $value=='Ten'){
            ?>
            <div class="form-group">
                <label for="group">Group </label>
                <select class="form-control" name="group">
                    <option value="">Select One</option>
                    <option value="Science">SCIENCE</option>
                    <option value="Commerce">COMMERCE</option>
                    <option value="Arts">ARTS</option>
                </select>
            </div>
            <?php
        }
    }

}

