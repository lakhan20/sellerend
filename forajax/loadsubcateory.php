<?php
// C:\xampp\htdocs\admin\admin\include\connection.php
 include "../include/connection.php";

 
//  echo "hii";
 $categoryid=$_GET["categaryid"];

 $res=mysqli_query($conn,"select * from subcategory where category_idcategory=$categoryid" );

?>
<select class="form-control" name="subcategoryname" id="subcategoryname">

<?php
 while($row=mysqli_fetch_array($res)){

    echo "<option>";
    echo $row["subcategoryname"];
    echo "</option>";
}
echo "</select>";

?>