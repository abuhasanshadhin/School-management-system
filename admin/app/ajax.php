<?php
if(isset($_GET['query'])){
    $value = $_GET['query'];
    $formfield = $_GET['field'];

    if ($formfield == "class") {
        if($value=='Nine' || $value=='Ten'){
            ?>
            <div class="form-group">
                <select style="font-size: 13px" name="group" class="form-control">
                    <option value="">----SELECT GROUP----</option>
                    <option value="Science">SCIENCE</option>
                    <option value="Commerce">COMMERCE</option>
                    <option value="Arts">ARTS</option>
                </select>
            </div>
            <?php
        }
    }

}