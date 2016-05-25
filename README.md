# WPCategoryImport
Very simple WordPress plugin for importing a CSV file as a taxonomy / categories. Don't pay $150 for a CSV import plugin if you only need to import a taxonomy. 

##Install
FTP transfer the plugin folder into ```wp-content/plugins/```
Find the plugin in your WordPress Admin page and activate.
##Usage
Modify the ```import_file``` variable in the PHP code to point to your CSV file. 
Deactivate -> Activate the plugin to import a new CSV file. 

<b>CSV File</b>

Parent categories must be in file before child categories
No spaces between commas 

Format:
>category,category parent,slug,description

