<?php
//添加至文件末尾
<!--facebook pixel start-->
<script>
    function   facebook(){
        fbq('track', 'CompleteRegistration', {
            value: <?php $_SESSION['cart']->total ?> ,
            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
        });
    }
</script>
<!--facebook pixel end-->
