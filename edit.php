<?php

  include("function.php");
  $obj=new crudapp();

  $show = $obj->show_data();
  
  if(isset($_GET['status'])){
      if($_GET['status']='edit'){
        $id=$_GET['id'];
        $rdata=$obj->update_data($id);
  }
}

if(isset($_POST['edit'])){
	$obj->dupdata($_POST);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
   <form class="form" action="" method="post" enctype="multipart/form-data">
   	<?php   if(isset($return_msg)){echo $return_msg;} ?>
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e1" class="form-label fw-bold">Name</label>
	    <input type="text" name="uname" class="form-control fw-bold text-danger" id="e1" aria-describedby="e1" value="<?php echo $rdata['name']?>">
	  </div>
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e2" class="form-label fw-bold">Email</label>
	    <input type="email" name="uemail" class="form-control fw-bold text-danger" id="e2" aria-describedby="e2" value="<?php echo $rdata['email']?>">
	  </div>
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e3" class="form-label fw-bold">ID</label>
	    <input type="text" name="uid" class="form-control fw-bold text-danger" id="e3" aria-describedby="e3" value="<?php echo $rdata['stuid']?>">
	  </div>
	  
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e4" class="form-label fw-bold">Image</label>
	    <td><input type="file" name="uimg" class="form-control" id="e4" aria-describedby="e4" value="<?php echo $rdata['id']?>"><img style="height: 100px;" src="upload/<?php echo $rdata['image']; ?>"></td>
	  </div>
     <!-- <td><img style="height: 100px;" src="upload/<?php echo $rdata['image']; ?>"></td> -->
     <!-- <input type="text" name="" value="<?php echo $rdata['id']?>"> -->
     <input type="hidden" name="tt_id" value="<?php echo $rdata['id']?>">

  <button type="submit" class="btn btn-primary ms-3 fw-bold text-light" name="edit">Update</button>
</form>