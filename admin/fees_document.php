
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<?php
if(isset($_GET['document'])){
    $regex=preg_match_all('/\d+\-[a-zA-Z]+\-[a-zA-Z0]+\-[0-9]+/',$_GET['document']);
    if($regex==false){
        echo "<script> window.location=index.phpript>";
    }else{
        $all_document=explode('-',$_GET['document']);
        $roll=$all_document[0];
        $class=$all_document[1];
        $group=$all_document[2];
        $now_fees=$all_document[3];
    }
}
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Result</li>
        <li class="active">Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box-body">
                <p class="alert alert-success">Your <b class=''><?php echo $now_fees; ?>tk</b> receive successfully.Your other fees information given below.For print click the print button.
                    <a href="" onClick="printdiv('div_print')" class="btn btn-info"><i class="glyphicon glyphicon-print"></i></a> </p>
            </div>
            <div class="box" id="div_print">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                                <div class="box-body">
                                    <div>
                                        <h2 class='text-center font-italic'>Kurigram Govt. School</h2>
                                        <h4 class='text-center font-weight-light'>Fees Document</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div  class="col-md-10">
                                            <br>
                                            <br>
                                            <p><b>Date :</b>
                                                <?php
                                                $timestamp= time();
                                                $date= date('d F Y',$timestamp);
                                                echo $date;
                                                ?>
                                            </p>
                                            <?php
                                            if($group=='0'){
                                                $query="SELECT * FROM students_fees WHERE roll='$roll' AND class='$class'";
                                            }else{
                                                $query="SELECT * FROM students_fees WHERE roll='$roll' AND class='$class' AND stu_group='$group'";
                                            }
                                            $document_result=database::connect()->query($query)->fetch_assoc();
                                            ?>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th  class="font-italic">Name</th>
                                                    <td  class="font-italic"><?php echo $document_result['name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Roll</th>
                                                    <td  class="font-italic">
                                                        <?php
                                                        if($document_result['roll']<10){
                                                            echo "0";
                                                        }
                                                        echo $document_result['roll'];
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Class</th>
                                                    <td  class="font-italic"><?php echo $document_result['class']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Group</th>
                                                    <td  class="font-italic">
                                                        <?php
                                                        if($document_result['class']=='Nine' ||$document_result['class']=='Ten'){
                                                            echo $document_result['stu_group'];
                                                        }else{
                                                            echo "-----";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Monthly Fees</th>
                                                    <td  class="font-italic">
                                                        <?php
                                                      if($class=='Nine' || $class=='Ten'){
                                                            $group=$document_result['stu_group'];
                                                            $final_class=$class.'('.$group.')';
                                                        }else{
                                                            $final_class=$class;
                                                        }
                                                        $monthly_fees_query="SELECT *  FROM student_monthly_fees WHERE  class='$final_class'";
                                                        $monthly_fees=database::connect()->query($monthly_fees_query)->fetch_assoc();
                                                        echo $monthly_fees['fees'].' Tk';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Total Fees</th>
                                                    <td  class="font-italic"><?php $t_f=$monthly_fees['fees']*12; echo $t_f; ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Now Paid</th>
                                                    <td  class="font-italic"><?php echo $now_fees; ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <th  class="font-italic">Total Paid</th>
                                                    <td  class="font-italic">

                                                        <?php
                                                        if($class=='Nine' || $class=='Ten'){
                                                            $total_query="SELECT SUM(fees) FROM students_fees WHERE roll='$roll' AND class='$class' AND stu_group='$group'";
                                                        }else{
                                                            $total_query="SELECT SUM(fees) FROM students_fees WHERE roll='$roll' AND class='$class'";
                                                        }
                                                        $total=database::connect()->query($total_query)->fetch_assoc();
                                                        echo $total['SUM(fees)'];
                                                        ?>
                                                        Tk
                                                    </td>
                                                </tr>
                                                <?php
                                                $total_result=$t_f-$total['SUM(fees)'];
                                                if($total_result<0 || $total_result==0){
                                                    ?>
                                                    <tr>
                                                        <th  class="font-italic"></th>
                                                        <td class="font-italic text-primary">Your total fees given successfully.</td>
                                                    </tr>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <tr>
                                                        <th  class="font-italic">Unpaid</th>
                                                        <td class="font-italic"><?php echo $total_result; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                            <br>
                                            <div class="text-right">
                                                <p class="">Receive by Register</p>
                                                <p>(Md Mamun)</p>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>