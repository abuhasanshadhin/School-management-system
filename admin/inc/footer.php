
</div>
            <footer class="main-footer fixed">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2018
                    <a target="_blank" href="https://www.facebook.com/mamunur.roshid.31924"> Mamun, </a>
                    <a target="_blank" href="https://www.facebook.com/abuhasan.shadhin">Shadhin, </a>
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100009524803869">Padar </a>.
                </strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script src="assets/dist/js/pages/dashboard.js" type="text/javascript"></script>

<!-- jQuery 2.1.3 -->
<script src="assets/assets/js/jquery.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<script>

    // AJAX code to check input field values when onblur event triggerd.
    function validate(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(field).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "lib/validation.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
    }
</script>
    </body>
</html>
