<!-- 
<form method="">
<select class="form-control">
<option value="brand">brand</option>
<option value="category">subcategory</option>

</select>

</form> -->

<?php
$id=$_COOKIE['idRegister'];
$productSelectQuery="SELECT * FROM `product` WHERE User_idRegister=$id";
$res=mysqli_query($conn,$productSelectQuery);
if(mysqli_num_rows($res) >0){

$str="<table class='table table-striped'>
<thead>
<tr><th>sr no</th><th>ProductName<th>description<th>brand<th>Price<th>Image<th>Update</tr></thead>";
 $cnt=1; 
 while($productRow=mysqli_fetch_assoc($res)){
  
    $str.="<tbody><tr><td>".$cnt."</td><td>".$productRow["pname"]."</td><td>".$productRow["description"]."</td><td>"
	.$productRow["brand"]."</td><td>".$productRow["price"]."</td><td>
	<img src='".$productRow["image"]."' height='100' width='100'>"."</td><td>
    <a href='ProductUpdate.php?id=".$productRow["idproduct"]."' class='btn btn-xs btn-info'><i class='ace-icon fa fa-check bigger-120'></i></a>"."</td>

    </tr>
    ";
    $cnt++;

}
    $str.="</tbody></table>";
    echo $str;
}
    
?>


