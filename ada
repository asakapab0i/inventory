diff --git a/README b/README
old mode 100644
new mode 100755
diff --git a/css/addproduct.css b/css/addproduct.css
old mode 100644
new mode 100755
diff --git a/css/bigbutton.css b/css/bigbutton.css
old mode 100644
new mode 100755
diff --git a/css/checkorder.css b/css/checkorder.css
old mode 100644
new mode 100755
diff --git a/css/delivery.css b/css/delivery.css
old mode 100644
new mode 100755
diff --git a/css/forms.css b/css/forms.css
old mode 100644
new mode 100755
diff --git a/css/home.css b/css/home.css
old mode 100644
new mode 100755
diff --git a/css/homebigbutton.css b/css/homebigbutton.css
old mode 100644
new mode 100755
diff --git a/css/index.css b/css/index.css
old mode 100644
new mode 100755
diff --git a/css/ledger.css b/css/ledger.css
old mode 100644
new mode 100755
diff --git a/css/login.css b/css/login.css
old mode 100644
new mode 100755
diff --git a/css/main.css b/css/main.css
old mode 100644
new mode 100755
diff --git a/css/minibutton.css b/css/minibutton.css
old mode 100644
new mode 100755
diff --git a/css/product.css b/css/product.css
old mode 100644
new mode 100755
diff --git a/css/productlist.css b/css/productlist.css
old mode 100644
new mode 100755
diff --git a/css/register.css b/css/register.css
old mode 100644
new mode 100755
diff --git a/css/returns.css b/css/returns.css
old mode 100644
new mode 100755
diff --git a/css/sales.css b/css/sales.css
old mode 100644
new mode 100755
diff --git a/css/sample.css b/css/sample.css
old mode 100644
new mode 100755
diff --git a/disclamer.txt b/disclamer.txt
old mode 100644
new mode 100755
diff --git a/employee/add_product.php b/employee/add_product.php
old mode 100644
new mode 100755
diff --git a/employee/checkdelivery.php b/employee/checkdelivery.php
old mode 100644
new mode 100755
diff --git a/employee/checkorder.php b/employee/checkorder.php
old mode 100644
new mode 100755
diff --git a/employee/checkreturns.php b/employee/checkreturns.php
old mode 100644
new mode 100755
diff --git a/employee/delivery.php b/employee/delivery.php
old mode 100644
new mode 100755
index d4b4900..7e47772
--- a/employee/delivery.php
+++ b/employee/delivery.php
@@ -126,4 +126,4 @@ for(x=0;x<5;x++)
   </div> 
 </div>
 </body>
-</html>
\ No newline at end of file
+</html>
diff --git a/employee/home.php b/employee/home.php
old mode 100644
new mode 100755
diff --git a/employee/ledger.php b/employee/ledger.php
old mode 100644
new mode 100755
diff --git a/employee/product.php b/employee/product.php
old mode 100644
new mode 100755
diff --git a/employee/productlist.php b/employee/productlist.php
old mode 100644
new mode 100755
diff --git a/employee/returns.php b/employee/returns.php
old mode 100644
new mode 100755
diff --git a/employee/sales.php b/employee/sales.php
old mode 100644
new mode 100755
diff --git a/employee/sample.php b/employee/sample.php
old mode 100644
new mode 100755
diff --git a/images/Thumbs.db b/images/Thumbs.db
old mode 100644
new mode 100755
diff --git a/images/default.png b/images/default.png
old mode 100644
new mode 100755
diff --git a/images/mainLogo2.png b/images/mainLogo2.png
old mode 100644
new mode 100755
diff --git a/includes/addproduct_codes.php b/includes/addproduct_codes.php
old mode 100644
new mode 100755
diff --git a/includes/checkdelivery_codes.php b/includes/checkdelivery_codes.php
old mode 100644
new mode 100755
diff --git a/includes/checkorder_codes.php b/includes/checkorder_codes.php
old mode 100644
new mode 100755
diff --git a/includes/checkreturns_codes.php b/includes/checkreturns_codes.php
old mode 100644
new mode 100755
diff --git a/includes/connect.php b/includes/connect.php
old mode 100644
new mode 100755
index e79de31..d7f8045
--- a/includes/connect.php
+++ b/includes/connect.php
@@ -3,10 +3,10 @@
 $host="localhost";
 $loginName="root";
 $logpassword=""; 
-$db_name="efcpharmacy"; 
+$db_name="inventorydb"; 
 $tbl_name="employee"; 
 
 
 mysql_connect("$host", "$loginName", "$logpassword")or die("cannot connect"); 
 mysql_select_db("$db_name")or die("cannot select DB");
-?>
\ No newline at end of file
+?>
diff --git a/includes/delivery_codes.php b/includes/delivery_codes.php
old mode 100644
new mode 100755
diff --git a/includes/employee_html.php b/includes/employee_html.php
old mode 100644
new mode 100755
diff --git a/includes/generateTimestamp.php b/includes/generateTimestamp.php
old mode 100644
new mode 100755
diff --git a/includes/home_codes.php b/includes/home_codes.php
old mode 100644
new mode 100755
diff --git a/includes/html_codes.php b/includes/html_codes.php
old mode 100644
new mode 100755
diff --git a/includes/knowthename.php b/includes/knowthename.php
old mode 100644
new mode 100755
diff --git a/includes/ledger_codes.php b/includes/ledger_codes.php
old mode 100644
new mode 100755
diff --git a/includes/picture_config.php b/includes/picture_config.php
old mode 100644
new mode 100755
diff --git a/includes/product_codes.php b/includes/product_codes.php
old mode 100644
new mode 100755
diff --git a/includes/productlist_codes.php b/includes/productlist_codes.php
old mode 100644
new mode 100755
diff --git a/includes/returns_codes.php b/includes/returns_codes.php
old mode 100644
new mode 100755
diff --git a/includes/sales_codes.php b/includes/sales_codes.php
old mode 100644
new mode 100755
diff --git a/includes/sql_command.php b/includes/sql_command.php
old mode 100644
new mode 100755
diff --git a/includes/temp/delivery_codes2return.php b/includes/temp/delivery_codes2return.php
old mode 100644
new mode 100755
diff --git a/includes/temp/returns_codes.php b/includes/temp/returns_codes.php
old mode 100644
new mode 100755
diff --git a/index.php b/index.php
old mode 100644
new mode 100755
index 620715c..245a749
--- a/index.php
+++ b/index.php
@@ -45,4 +45,4 @@ include("includes/html_codes.php");
     </div>
     
 </body>
-</html>
\ No newline at end of file
+</html>
diff --git a/inventorydb.sql b/inventorydb.sql
old mode 100644
new mode 100755
diff --git a/login.php b/login.php
old mode 100644
new mode 100755
diff --git a/logout.php b/logout.php
old mode 100644
new mode 100755
diff --git a/register.php b/register.php
old mode 100644
new mode 100755
diff --git a/scripts/date_time.js b/scripts/date_time.js
old mode 100644
new mode 100755
diff --git a/scripts/jquery.js b/scripts/jquery.js
old mode 100644
new mode 100755
diff --git a/scripts/mainjs.js b/scripts/mainjs.js
old mode 100644
new mode 100755
diff --git a/validatelogin.php b/validatelogin.php
old mode 100644
new mode 100755
