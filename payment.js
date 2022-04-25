<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(e) {

    $("#Mini_Payment").click(function(e) {
        var mem =
            `<input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $person*100; ?>">`;
        $(".ptm").append(mem);
    });

    $("#Full_Payment").click(function(e) {
        var mem =
            `<input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $total-$discount; ?>">`;
        $(".ptm").append(mem);
    });

});
</script>
