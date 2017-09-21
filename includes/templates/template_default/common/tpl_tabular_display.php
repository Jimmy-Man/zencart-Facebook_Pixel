<?php
// 添加 至文件最后
<!--facebook pixel start-->
<script>
    fbq('track', 'Search', {
        search_string: '<?php echo $keywords ?>',
        content_ids: [<?php echo $productids_str ?>],
        content_type: 'product'
    });
</script>
<!--facebook pixel end-->