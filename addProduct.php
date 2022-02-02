<?php
include "include/header.php";
include "include/sidebar.php";
include "include/connection.php";
?> 

<head>
<style>
  #x{
    float:right;
  }
  #x{
    float:right;
  }
</style>
 
</head>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <?php

         if(isset($_POST['addproduct'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            echo $target_file;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            //    echo "updating...";
           $pname=$_POST['pname'];
           $bname=$_POST['bname'];
           $min_set_per_qty=$_POST['minsetperqty'];
           $qty_per_set=$_POST['qtyperset'];
           $mrp=$_POST['mrp'];
           $price=$_POST['price'];
           $description=$_POST['desc'];
           $hsn=$_POST['hsn'];
           $gst=$_POST['gst'];
           $id=$_COOKIE["idRegister"];
          //  $subcatid=$_GET["subcategaryid"];
           $subcatid=$_POST["subcategoryname"];

          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            if($uploadOk==0){
                echo "file uploading failed...";
            }
            else{
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
            }


           $sql="INSERT INTO `product`(`name`,`brand`,`minimum_set_qut-pur`,`quantity_of_1_set`,`MRP`,`price`,`description`,`image`,`HSN_code`,`GST_rate`,`subcategory_idsubcategory`, `User_idRegister` )  VALUES ('$pname','$bname',$min_set_per_qty,$qty_per_set,$mrp,$price,'$description','$target_file',$hsn,$gst,$subcatid,$id)";
// echo "<br>". $sql;
               $result=mysqli_query($conn,$sql);

        //   echo "---------------------------------".$result;
           if($result>0){
           echo'<div class="alert alert-success">
           <strong>Success!</strong> product successfully added!
         </div>';
        // header("location:home.php");
                  }
           else{
            echo'<div class="alert alert-danger">
            <strong>Success!</strong> Something went wrong while adding product...!!
          </div>';
           }
          }
         ?>
                 <!-- //  $sql = "UPDATE employee ". "SET emp_salary = $emp_salary ". 
        //        "WHERE emp_id = $emp_id" ; -->
        <div class="col-md-9" >
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><b><h1>&nbsp;&nbsp;<u>Add product</h1></b></u></li>
            </ul>
            <div class="tab-content" >
              <div class="active tab-pane" id="activity">

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method ="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Product name :</label>

                    
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inpt"  name="pname" <?php  ?> >    
                    
                    
                    </div>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">brand name :</label>

                    
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inpt"  name="bname" <?php  ?> >    
                    
                    
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Min Set per Qty :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="minsetperqty">    
                    
                    
                    </div>
                    </div>    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Qty of 1 set :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="qtyperset">    
                    
                    
                    </div>
                    
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">MRP :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="mrp">    
                    
                    
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">price :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="price">    
                    </div>
                    
                  </div>
                
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description : </label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" name="desc"></textarea>
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label" >Image :</label>

                    
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="img" name="image">    
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">HSN number :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="hsn">    
                    </div>
                    
                  </div>
                
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">GST (%) :</label>

                    
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inpt" name="gst">    
                    </div>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Select category :</label>

                    
                    <div class="col-sm-10">   
                    
                <?php

                  $selectcategory="SELECT * FROM category";

                  if($res=mysqli_query($conn,$selectcategory)){
                    if(mysqli_num_rows($res)>0){
                   echo' <select class="form-control" name="cat" onchange="select_category(this.value)">
                        <option disabled selected>Select category </option>
                   ';
                   
                      while($row=mysqli_fetch_array($res)){

                        echo '<option  value='.$row["idcategory"].'>'.$row["categoryname"].'</option>';
                        //$value= $row['idcategory'];
                      }
                   echo '</select>
                   </div>
                   </div>';

                    }
                  }

                ?>
       


                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Select sub-category :</label>
                    <div class="col-sm-10" id="subcatid"  >   
                    <select class="form-control">
                   <option value="">select </option>
                    </select>
                </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="addproduct">Add product</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function select_category(cat){
      alert(cat);
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
          document.getElementById("subcatid").innerHTML=xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET","forajax/loadsubcateory.php?categaryid="+cat,true);
      xmlhttp.send();
    }
    function select_subcategory(subcat){
      
      alert(subcat);
      
    }
  </script>
  <?php
  include "include/footer.php";
  ?>