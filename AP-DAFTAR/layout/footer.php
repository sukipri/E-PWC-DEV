<hr>
<center> &copy;2018 RS Panti Wilasa Citarum Semarang. All rights reserved</center>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more-without-design.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});
</script>