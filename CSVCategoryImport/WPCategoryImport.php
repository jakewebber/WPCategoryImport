<?php
/**
 * @package ImportCategories
 * @version 1.0
 * @author Jacob Webber
 */
/*
/*
Plugin Name: CSVCategoryImport
Description: Import categories from CSV. Use FTP to put CSV File in ABSPATH directory. Parent categories must be at top of file. No spaces between commas. Deactivate->Activate this plugin to apply.
Parent categories must be in file before child categories

*/

/* EXAMPLE: category,category parent,slug,description
"Country",""
"Country2",""
"city1","Country"
"city2","Country2"
"County x","","county-x","county x descripiton of this category"
*/

ini_set("auto_detect_line_endings", true); 

require_once(ABSPATH . "wp-admin/includes/admin.php");
$import_file = ABSPATH . 'wp-content/plugins/importCategories/fountainreportdates.csv'; //Change to your CSV location
$import = array();
$fh = fopen($import_file,'r');
while($data = fgetcsv($fh, 1000, ',')) {
    $import[] = $data;
}

foreach ($import as $importcat) {
  $numfields = count($importcat);
  $cat_ID = get_cat_ID($importcat[0]);
  $cat_name = $importcat[0];
  $category_parent = get_cat_ID($importcat[1]);

  if ($numfields > 2)
    $category_nicename = sanitize_title($importcat[2]);

  if ($numfields > 3)
    $category_description = $importcat[3];

  $args = compact('cat_ID', 'cat_name', 'category_description', 'category_nicename', 'category_parent');
  wp_insert_category($args);
}
?>