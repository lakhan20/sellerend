<?php
$productSelectQuery="SELECT * FROM `product`";
$res=mysqli_query($conn,$productSelectQuery);
if(mysqli_num_rows($res) >0){

$str="<table class='table  table-bordered table-hover'><tr><th>ProductName<th>description<th>brand<th>Price<th>Image<th>Update<th>Delete</th></tr>";
  while($productRow=mysqli_fetch_assoc($res)){
  
    $str.="<tr><td>".$productRow["pname"]."</td><td>".$productRow["description"]."</td><td>"
	.$productRow["brand"]."</td><td>".$productRow["price"]."</td><td>
	<img src='".$productRow["image"]."' height='100' width='100'>"."</td><td>
    <a href='ProductUpdate.php?id=".$productRow["idproduct"]."' class='btn btn-xs btn-info'><i class='ace-icon fa fa-check bigger-120'></i></a>"."</td><td>
	<a href='ProductDelete.php?id=".$productRow["idproduct"]."' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></a>"."</td></tr>
    ";

}
    $str.="</table>";
    echo $str;
}
    
?>


