<?php
class Notice{

    public function create($post,$file){
        $required=[
            $post['title'],
            $file['image']['name'],
            $post['description']
        ];
        

        if(helper::imageUpload($file)==true){
           
                return helper::imageUpload($file);
            
        }

        $title=$post['title'];
        $description=$post['description'];



        $add_query = "INSERT INTO notice(title,description,image)
       VALUES('$title','$description','$unique_name')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your notice add successful.</p>";
            return $message;
        }

    }


    public function select()
    {

        $query="SELECT * FROM notice ORDER BY id DESC";

        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }


}
?>