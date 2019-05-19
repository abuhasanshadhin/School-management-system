<!-- Small modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body center-text">
                <a class="close " href="" data-dismiss="modal" aria-label="Close"><i style="font-size: 16px; padding: 10px" class="fa fa-close float-right"></i></a>
                <br>
                <?php
                if (isset($msg)){
                    ?>
                    <p><?php echo $msg; ?></p>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>
