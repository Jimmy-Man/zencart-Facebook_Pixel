Zen Cart Facebook_Pixel
===============

此插件用于在zencar上使用[facebook 像素](https://www.facebook.com/business/help/742478679120153)
--------------------

开发版本：
Zen Cart&reg; v1.5.4

适用版本:ALL

--------------------


插件安装
------------

`由于此插件需要修改模板文件所以采取手动添加代码到指定文件的方式`

需要修改到的文件如下:
```php
        modified:   includes/configure.php
        modified:   includes/functions/html_output.php
        modified:   includes/modules/product_listing.php
        modified:   includes/templates/template_default/common/html_header.php
        modified:   includes/templates/template_default/common/tpl_tabular_display.php
        modified:   includes/templates/template_default/templates/tpl_checkout_confirmation_default.php
        modified:   includes/templates/template_default/templates/tpl_checkout_payment_default.php
        modified:   includes/templates/template_default/templates/tpl_checkout_shipping_default.php
        modified:   includes/templates/template_default/templates/tpl_login_default.php
        modified:   includes/templates/template_default/templates/tpl_product_info_display.php
        modified:   admin/includes/languages/english.php
        modified:   admin/includes/languages/schinese.php
```

- includes/configure.php
```php
   define('SQL_CACHE_METHOD', 'none');
   define('DIR_FS_SQL_CACHE', 'C:/phpStudy/PHPTutorial/WWW/zen-cart-chinese-1.5.4/cache');
-
+  define('FACEBOOK_PIXEL_CURRENCY','USD'); //在文件末尾添加这一句
 // EOF

```
注意这个文件的权限。
- includes/functions/html_output.php
```php
     if (zen_not_null($alt)) $image_submit .= ' title=" ' . zen_output_string($alt) . ' "';

     if (zen_not_null($parameters)) $image_submit .= ' ' . $parameters;
-
+    $image_submit .= 'onclick="facebook()"';//在文件中添加这一句 line： 276
     $image_submit .= ' />';

     return $image_submit;

```
- includes/modules/product_listing.php
```php
   $error_categories = true;
 }
-
+//facebook pixel start
+$productids_str= implode($productids_arr,',');
+//facebook pixel end
 if (($how_many > 0 and $show_submit == true and $listing_split->number_of_rows > 0) and (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART == 1 or  PRODUCT_LISTING_MULTIPLE_ADD_TO_CART == 3) ) {
   $show_top_submit_button = true;
 } else {
```
将facebook pixel 注释中间的内容添加至文件中  line ：79

- /includes/templates/template_default/common/html_header.php
```php
 // DEBUG: echo '<!-- I SEE cat: ' . $current_category_id . ' || vs cpath: ' . $cPath . ' || page: ' . $current_page . ' || template: ' . $current_template . ' || main = ' . ($this_is_home_page ? 'YES' : 'NO') . ' -->';
 ?>
-
+<!--    facebook pixel start-->
+    <?php if(FACEBOOK_PIXEL == true){ ?>
+        <script>
+            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
+                n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
+                n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
+                t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
+                document,'script','https://connect.facebook.net/en_US/fbevents.js');
+            fbq('init', <?php echo FACEBOOK_PIXEL_ID ?>); // Insert your pixel ID here.
+            fbq('track', 'PageView');
+        </script>
+        <noscript><img height="1" width="1" style="display:none"
+                       src="https://www.facebook.com/tr?id=<?php echo FACEBOOK_PIXEL_ID ?>&ev=PageView&noscript=1"
+            /></noscript>
+    <?php } ?>
+<!--    facebook pixel end-->
 </head>
 <?php // NOTE: Blank line following is intended: ?>

```
注意：将facebook pixel 注释中间的内容添加至文件的`</head>` 闭合标签上 要保证这段代码在`<head>`末尾的位置,紧挨着闭合标签

- /includes/templates/template_default/common/tpl_tabular_display.php
```php
+<!--facebook pixel start-->
+<script>
+    fbq('track', 'Search', {
+        search_string: '<?php echo $keywords ?>',
+        content_ids: [<?php echo $productids_str ?>],
+        content_type: 'product'
+    });
+</script>
+<!--facebook pixel end-->

```
将这段代码添加至文件末尾

- includes/templates/template_default/templates/tpl_checkout_confirmation_default.php
```php
+<!--facebook pixel start-->
+<?php
+    $faceboke_productid_str = implode($faceboke_productid_arr,',');
+     if($order_totals[2]['code'] == 'ot_total'){
+         $total_price = preg_replace('/([\x80-\xff]*)/i','',$order_totals[2]['text']);
+     }
+?>
+<script>
+    function   facebook(){
+        fbq('track', 'Purchase', {
+            content_ids: [<?php echo $faceboke_productid_str ?>],
+            content_type: 'product'
+            value: <?php echo $total_price ?>,
+            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
+        });
+    }
+</script>
+<!--facebook pixel end-->

```
将这段代码添加至文件末尾

-  includes/templates/template_default/templates/tpl_checkout_payment_default.php
```php
+<!--facebook pixel start-->
+<script>
+    fbq('track', 'AddPaymentInfo');
+</script>
+<!--facebook pixel end-->
```
将这段代码添加至文件末尾

- includes/templates/template_default/templates/tpl_checkout_shipping_default.php
```php
+<!--facebook pixel start-->
+<script>
+    fbq('track', 'InitiateCheckout');
+</script>
+<!--facebook pixel end-->
```
将这段代码添加至文件末尾

- includes/templates/template_default/templates/tpl_login_default.php
```php
+<!--facebook pixel start-->
+<script>
+    function   facebook(){
+        fbq('track', 'CompleteRegistration', {
+            value: <?php $_SESSION['cart']->total ?> ,
+            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
+        });
+    }
+</script>
+<!--facebook pixel end-->
```
将这段代码添加至文件末尾

- includes/templates/template_default/templates/tpl_product_info_display.php
```php
+<!--facebook pixel start-->
+<script>
+    fbq('track', 'ViewContent', {
+        content_ids: [<?php echo $_GET['products_id']; ?>],
+        content_type: 'product'
+        value: <?php echo $result = preg_replace('/([\x80-\xff]*)/i','',zen_get_products_display_price((int)$_GET['products_id'])); ?>,
+        currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
+    });
+</script>
+<script>
+    function   facebook(){
+        fbq('track', 'AddToCart', {
+            content_ids: [<?php echo $_GET['products_id']; ?>],
+            content_type: 'product'
+            value: <?php echo $result = preg_replace('/([\x80-\xff]*)/i','',zen_get_products_display_price((int)$_GET['products_id'])); ?>,
+            currency: '<?php echo FACEBOOK_PIXEL_CURRENCY; ?>'
+        });
+    }
+</script>
+<!--facebook pixel end-->
```
将这段代码添加至文件末尾

- admin/includes/languages/english.php
- admin/includes/languages/schinese.php
```php
define('BOX_CONFIGURATION_FACEBOOKPixel_SETTINGS', 'FacebookPixel Settings');
```
将这段代码添加至文件中


结束。