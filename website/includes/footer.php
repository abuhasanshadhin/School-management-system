$<div class="text-center box-wrapper py-1">
    <p class="mt-2">Copyright &copy;
        <a href="https://www.facebook.com/abuhasan.shadhin" title="Abu Hasan Shadhin"
           class="text-light" target="_blank">SHADHIN</a> |
        <a href="https://www.facebook.com/mamunur.roshid.31924" title="MD Mamunur Rashid"
           class="text-light" target="_blank">MAMUN</a> |
        <a href="https://www.facebook.com/profile.php?id=100009524803869" title="Podar Chandro Roy"
           class="text-light" target="_blank">PODAR</a>
    </p>
</div>

</div>
</div>


<div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <i class="fa fa-2x fa-arrow-circle-up"></i>
    </span>
</div>

<script>
    /*Print Div Content*/
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
    // -----

    /*Page Scroll*/
    $(".scroll-top-wrapper").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".scroll-top-wrapper").fadeIn();
        } else {
            $(".scroll-top-wrapper").fadeOut();
        }
    });

    $(".scroll-top-wrapper").click(function () {
        $("html, body").animate({scrollTop: 0}, 800);
    });
    // -----

</script>

</body>
</html>