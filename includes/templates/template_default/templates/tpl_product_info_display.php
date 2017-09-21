<?php
// 添加至文件末尾
<!--facebook pixel start-->
<script>
    fbq('track', 'ViewContent', {
        content_ids: [<?php echo $_GET['products_id']; ?>],
        content_type: 'product'
        value: <?php echo $result = preg_replace('/([\x80-\xff]*)/i','',zen_get_products_display_price((int)$_GET['products_id'])); ?>,
        currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
    });
</script>
<script>
    function   facebook(){
        fbq('track', 'AddToCart', {
            content_ids: [<?php echo $_GET['products_id']; ?>],
            content_type: 'product'
            value: <?php echo $result = preg_replace('/([\x80-\xff]*)/i','',zen_get_products_display_price((int)$_GET['products_id'])); ?>,
            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
        });
    }
</script>
<!--facebook pixel end-->