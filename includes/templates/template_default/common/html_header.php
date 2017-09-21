<?php

//添加
    <?php if(FACEBOOK_PIXEL == true){ ?>
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', <?php echo FACEBOOK_PIXEL_ID ?>); // Insert your pixel ID here.
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=<?php echo FACEBOOK_PIXEL_ID ?>&ev=PageView&noscript=1"
            /></noscript>
    <?php } ?>


//上下文
//   $directory_array = $template->get_template_part($page_directory, '/^jscript_/');
//   while(list ($key, $value) = each($directory_array)) {
// /**
//  * include content from all page-specific jscript_*.php files from includes/modules/pages/PAGENAME, alphabetically.
//  * These .PHP files can be manipulated by PHP when they're called, and are copied in-full to the browser page
//  */
//     require($page_directory . '/' . $value); echo "\n";
//   }

// // DEBUG: echo '<!-- I SEE cat: ' . $current_category_id . ' || vs cpath: ' . $cPath . ' || page: ' . $current_page . ' || template: ' . $current_template . ' || main = ' . ($this_is_home_page ? 'YES' : 'NO') . ' -->';
// ?>
// <!--    facebook pixel start-->
//     <?php if(FACEBOOK_PIXEL == true){ ?>
//         <script>
//             !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
//                 n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
//                 n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
//                 t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
//                 document,'script','https://connect.facebook.net/en_US/fbevents.js');
//             fbq('init', <?php echo FACEBOOK_PIXEL_ID ?>); // Insert your pixel ID here.
//             fbq('track', 'PageView');
//         </script>
//         <noscript><img height="1" width="1" style="display:none"
//                        src="https://www.facebook.com/tr?id=<?php echo FACEBOOK_PIXEL_ID ?>&ev=PageView&noscript=1"
//             /></noscript>
//     <?php } ?>
// <!--    facebook pixel end-->
// </head>
// <?php // NOTE: Blank line following is intended: ?>

