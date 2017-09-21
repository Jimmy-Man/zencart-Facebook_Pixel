<?php
//添加
      $productids_arr[$rows]= $listing->fields['products_id'];

//上下文
// if ($listing_split->number_of_rows > 0) {
//   $rows = 0;
//   $listing = $db->Execute($listing_split->sql_query);
//   $extra_row = 0;
//   while (!$listing->EOF) {
// //facebook pixel start
//       $productids_arr[$rows]= $listing->fields['products_id'];
// //facebook pixel end
//       $rows++;

//     if ((($rows-$extra_row)/2) == floor(($rows-$extra_row)/2)) {
//       $list_box_contents[$rows] = array('params' => 'class="productListing-even"');
//     } else {
//       $list_box_contents[$rows] = array('params' => 'class="productListing-odd"');
//     }

