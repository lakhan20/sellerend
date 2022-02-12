<?php
include "include/connection.php";
$orderid=$_GET['salesOrderId'];
$iscanceled=$_GET['isCanceled'];
?>

<script>
function CancelOrderConfirmBox() {
    return confirm("Are you sure you want to cancel this Order");
}
</script>
<?php
if($iscanceled){
$cnfrmbox= '<script>CancelOrderConfirmBox();</script>';
if($cnfrmbox){
    echo "--------".$cnfrmbox;
    echo var_dump($cnfrmbox);
}
else{
    echo "err";
}

}

?>

<?php


// echo $orderid;
// echo $iscanceled;
function acceptCancelOrder($iscanceled,$orderid,$conn){
    echo "function called";
$acceptRequest="UPDATE sales_orders SET Is_canceled=$iscanceled WHERE idsales_orders='$orderid'";
echo "<br>".$acceptRequest;

$res=mysqli_query($conn,$acceptRequest);
echo "<br>". var_dump($res);
// $n=mysqli_num_rows($res);
// echo "----------".$n;
if($res){
    echo "order done..";
}
else{
    
    echo "error..".error_get_last();
    echo "sw";
}                  
}

?>
