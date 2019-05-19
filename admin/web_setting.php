<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <div class="container-fluid">
                    <h3 class="text-center">Website Settings</h3>
                    <br>
                    
                    <!--Change to school name-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>School Name</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_name'])){
                                   echo Setting::changeSchoolName($_POST['school_name']);
                                }
                            ?>
                            <form method='post'>
                                <input type='text' name='school_name' class='form-control' required /><br>
                                <input type='submit' name='btn_school_name' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to school logo-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>School Logo</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['school-logo'])){
                                   echo Setting::changeSchoolLogo($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='logo' class='form-control-file' required /><br>
                                <input type='submit' name='school-logo' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to website welcome message-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Welcome message</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_welcome_messege'])){
                                   echo Setting::changeWelcomeMessage($_POST['welcome_messege']);
                                }
                            ?>
                            <form method='post'>
                                <textarea name='welcome_messege' class='form-control' required></textarea><br>
                                <input type='submit' name='btn_welcome_messege' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to principle image-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Principle Image</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn-principle-image'])){
                                   echo Setting::changePrincipleImage($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='principle_image' class='form-control-file' required /><br>
                                <input type='submit' name='btn-principle-image' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to principle message-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Principle message</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_principle_message'])){
                                   echo Setting::changePrincipleMessage($_POST['principle_message']);
                                }
                            ?>
                            <form method='post'>
                                <textarea name='principle_message' class='form-control' required></textarea><br>
                                <input type='submit' name='btn_principle_message' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to principle message-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>School address</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_address'])){
                                   echo Setting::changeSchoolAddress($_POST['school_address']);
                                }
                            ?>
                            <form method='post'>
                                <textarea name='school_address' class='form-control' required></textarea><br>
                                <input type='submit' name='btn_school_address' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to phone number-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Phone number</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_phone'])){
                                   echo Setting::changePhoneNumber($_POST['school_phone']);
                                }
                            ?>
                            <form method='post'>
                                <textarea name='school_phone' class='form-control' required></textarea><br>
                                <input type='submit' name='btn_school_phone' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to email address-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Email address</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_email'])){
                                   echo Setting::changeEmailAddress($_POST['school_email']);
                                }
                            ?>
                            <form method='post'>
                                <input type='text' name='school_email' class='form-control' required /><br>
                                <input type='submit' name='btn_school_email' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to school image-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>School Image</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_image'])){
                                   echo Setting::changeSchoolImage($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='school_image' class='form-control-file' required /><br>
                                <input type='submit' name='btn_school_image' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to school about-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>About School</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_school_about'])){
                                   echo Setting::changeSchoolAbout($_POST['school_about']);
                                }
                            ?>
                            <form method='post'>
                                <textarea name='school_about' class='form-control' required></textarea><br>
                                <input type='submit' name='btn_school_about' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                   <!--Change to facebook link-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Facebook Link</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_facebook_link'])){
                                   echo Setting::changeFacebookLink($_POST['facebook_link']);
                                }
                            ?>
                            <form method='post'>
                                <input type='text' name='facebook_link' class='form-control' required /><br>
                                <input type='submit' name='btn_facebook_link' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to youtube link-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Youtube Link</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_youtube_link'])){
                                   echo Setting::changeYoutubeLink($_POST['youtube_link']);
                                }
                            ?>
                            <form method='post'>
                                <input type='text' name='youtube_link' class='form-control' required /><br>
                                <input type='submit' name='btn_youtube_link' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to principle sign-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Principle sign</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_principle_sign'])){
                                   echo Setting::changePrincipleSign($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='principle_sign' class='form-control-file' required /><br>
                                <input type='submit' name='btn_principle_sign' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to register sign-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Register sign</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_register_sign'])){
                                   echo Setting::changeRegisterSign($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='register_sign' class='form-control-file' required /><br>
                                <input type='submit' name='btn_register_sign' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to additional sign-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Additional sign</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_additional_sign'])){
                                   echo Setting::changeAdditionalSign($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='additional_sign' class='form-control-file' required /><br>
                                <input type='submit' name='btn_additional_sign' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to slider image 1-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Slider image 1</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_slider_image_1'])){
                                   echo Setting::changeSliderImageOne($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='slider_image_1' class='form-control-file' required /><br>
                                <input type='submit' name='btn_slider_image_1' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to slider image 2-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Slider image 2</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_slider_image_2'])){
                                   echo Setting::changeSliderImageTwo($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='slider_image_2' class='form-control-file' required /><br>
                                <input type='submit' name='btn_slider_image_2' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                    <!--Change to slider image 3-->
                    <div class='row'>
                        <div class='col-md-4 form-group'><h3>Slider image 3</h3></div>
                        <div class='col-md-8 form-group'>
                            <?php
                                if(isset($_POST['btn_slider_image_3'])){
                                   echo Setting::changeSliderImageThree($_FILES);
                                }
                            ?>
                            <form method='post' enctype='multipart/form-data'>
                                <input type='file' name='slider_image_3' class='form-control-file' required /><br>
                                <input type='submit' name='btn_slider_image_3' value='Change' class='mt-4 btn btn-success' />
                            </form>
                        </div>
                    </div><hr>
                    <!--./-->
                    
                    
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>

