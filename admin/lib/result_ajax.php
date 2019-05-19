<?php
    require_once 'database.php';

    session_start();


    class Subject{

        public function selectSubject($class,$group)
        {
            if($class=='class_six_results'){
                $class='Six';
            }elseif($class=='class_seven_results'){
                $class='Seven';
            }elseif($class=='class_eight_results'){
                $class='Eight';
            }elseif($class=='class_nine_results'){
                $class='Nine';
            }else{
                $class='Ten';
            }
                //select class six student here
                if($class=='Nine' ||$class=='Ten'){
                    $query="SELECT subject_name FROM books WHERE class_name='$class' AND class_group='$group'";
                }else{
                    $query="SELECT subject_name FROM books WHERE class_name='$class'";
                }
                $result=database::connect()->query($query);

                if ($result->num_rows>0){
                    return $result;
                }else{
                    return false;
                }

        }

    }

    $subject= new Subject();


    if(isset($_GET['query'])){
        $value = $_GET['query'];
        $formfield = $_GET['field'];

        $_SESSION['val']=$value;

        if ($formfield == "class") {
                if($value=='class_six_results' || $value=='class_seven_results' || $value='class_eight_results'){

            ?>
            <option value="">-----Select One-----</option>
                <?php
                $result=$subject->selectSubject($value,'');
                if($result){
                    if ($result->num_rows>0) {
                        foreach ($result as $value) {
                            ?>
                            <option value="<?php echo $value['subject_name']; ?>"><?php echo $value['subject_name'] ?></option>
                            <?php
                        }
                    }
                    }
                }

        }

    }


    if(isset($_GET['subject'])){
        $value = $_GET['subject'];
        $formfield = $_GET['field'];

        if ($formfield == "group") {
            $class=$_SESSION['val'];
            ?>
            <option value="">-----Select One-----</option>
            <?php
            $result=$subject->selectSubject($class,$value);
            if($result){
                if ($result->num_rows>0) {
                    foreach ($result as $value){
                        ?>
                        <option value="<?php echo $value['subject_name']; ?>"><?php echo $value['subject_name'] ?></option>
                        <?php
                    }
                }
            }
        }

    }




?>