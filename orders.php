
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<?php
// include "include/header.php";
// include "include/sidebar.php";
include "include/connection.php";
?> 


<?php

// echo $_COOKIE["idRegister"];
// include "include/header.php";
// include "include/sidebar.php";

// include "include/header.php";
// include "include/sidebar.php";
include "include/connection.php";
$id=$_COOKIE["idRegister"];
// $selectSalesOrder="SELECT * FROM `sales_product_details`JOIN sales_orders ON sales_product_details.sales_orders_idsales_orders=sales_orders.idsales_orders
//   JOIN product ON sales_product_details.product_idproduct=product.idproduct WHERE product.Sales_idRegister=$id";

// $selectSalesOrder ="SELECT * FROM `sales_product_details` JOIN sales_orders JOIN product WHERE sales_orders.User_idRegister=$id AND product.Seller_idRegister=$id";
// $selectSalesOrder="SELECT * FROM `sales_product_details` JOIN sales_orders JOIN product WHERE sales_orders.User_idRegister=$id";
$selectSalesOrder="SELECT * FROM sales_product_details LEFT OUTER JOIN 
sales_orders ON sales_product_details.sales_orders_idsales_orders=idsales_orders 
LEFT OUTER JOIN product on product_idproduct=product.idproduct
 WHERE sales_orders.User_idRegister=$id";
$res=mysqli_query($conn,$selectSalesOrder);
// echo "----------".$res;

if(mysqli_num_rows($res) >0){
    $cnt=1;
    $str='<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">SrNo.</th>
    <th scope="col">ProductName</th>
    <th ssscope="col">Description</th> 
    <th scope="col">Image</th>
    <th scope="col">Qty</th>
    <th scope="col">OrderDate</th>
    <th scope="col">#</th>
    <th scope="col">AcceptOrder</th>
    <th scope="col">CancelOrder</th>
     </tr>
    </thead>
    ';
    while($saleOrderRow=mysqli_fetch_assoc($res)){
        
        $str.='<tbody>
        <th scope="row">'.$cnt.'</th>
        <th scope="row">'.$saleOrderRow['pname'].'</th>
        <th scope="row">'.$saleOrderRow['description'].'</th>
        <th scope="row"><img src="'.$saleOrderRow['image'].' " height="100" width="100"></th>
        <th scope="row">'.$saleOrderRow['Qty'].'</th>
        <th scope="row">'.$saleOrderRow['order_date'].'</th>
        <th scope="row"><a href="showOrderDetail.php?">See More</th>
        ';
    //    echo $saleOrderRow['Is_canceled'];
        if($saleOrderRow['Is_canceled']==NULL){
        $str.='<th scope="row"><a href="AcceptCancel.php?salesOrderId='.$saleOrderRow['idsales_orders'].'&isCanceled=0" class="btn btn-success" >Accept</a></th>
        <th scope="row"><a href="AcceptCancel.php?salesOrderId='.$saleOrderRow['idsales_orders'].'&isCanceled=1" class="btn btn-danger" >Cancel Order</a></th>';    
        }    
        elseif($saleOrderRow['Is_canceled']==1){
         $str.='
         <th scope="row"></th>
         <th scope="row"><button type="button" class="btn btn-danger" disabled> Order Cancelled</button></th>  
         ';
        }
        
        
        elseif($saleOrderRow['Is_canceled']==0){
            $str.='
         <th scope="row"><button type="button" class="btn btn-success" disabled>Order Accepted</button></th>
         <th scope="row"></th>
         ';
        }
        // $str.= '<th scope="row"><a href="#">See More</th>';

        // echo $saleOrderRow['Is_canceled'];
        $cnt++;
        // echo $saleOrderRow['pname'] . "<br>";
        // echo $saleOrderRow['brand'] . "<br>";
        // echo "<br>".$saleOrderRow['Price'];
        // echo "<br>".$saleOrderRow['net_amount'];
// echo  "<br>".date("l jS \of F Y h:i:s A");
    }
    $str.="</tbody></table>";
    echo $str;

}

?> 





