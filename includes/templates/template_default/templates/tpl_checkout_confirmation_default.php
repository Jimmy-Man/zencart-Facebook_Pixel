<?php
// 添加至文件末尾
<!--facebook pixel start-->
<?php
    $faceboke_productid_str = implode($faceboke_productid_arr,',');
     if($order_totals[2]['code'] == 'ot_total'){
         $total_price = preg_replace('/([\x80-\xff]*)/i','',$order_totals[2]['text']);
     }
?>
<script>
    function   facebook(){
        fbq('track', 'Purchase', {
            content_ids: [<?php echo $faceboke_productid_str ?>],
            content_type: 'product'
            value: <?php echo $total_price ?>,
            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
        });
    }
</script>
<!--facebook pixel end-->