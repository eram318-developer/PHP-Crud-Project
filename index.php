<?php

  include("function.php");
  $obj=new crudapp();


  if(isset($_POST['submit'])){
  	$return_msg=$obj->add_data($_POST);
  }

  $show = $obj->show_data();
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
    

    <h1 class="text-center pt-3 fw-bold">Crud Operation</h1>
   <form class="form bg-light" action="" method="post" enctype="multipart/form-data">
   	<?php   if(isset($return_msg)){echo $return_msg;}?>
	  <div class="mb-3 my-4 p-4 w-25 col-sm-12">
	    <label for="e1" class="form-label fw-bold">Name</label>
	    <input type="text" name="name" class="form-control" id="e1" aria-describedby="e1">
	  </div>
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e2" class="form-label fw-bold">Email</label>
	    <input type="email" name="email" class="form-control" id="e2" aria-describedby="e2">
	  </div>
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e3" class="form-label fw-bold">ID</label>
	    <input type="text" name="id" class="form-control" id="e3" aria-describedby="e3">
	  </div>
	  
	  <div class="mb-3 my-4 p-4 w-25">
	    <label for="e4" class="form-label fw-bold">Image</label>
	    <input type="file" name="img" class="form-control" id="e4" aria-describedby="e4">
	  </div>
  <button type="submit" class="btn btn-primary ms-4 fw-bold" name="submit">Submit</button>
</form>
    
    <div class="container2 mt-5 p-5 shadow bg-light">
    	
    	<table class="table table-bordered">
		  <thead>
		    <tr> 
		      <th scope="col">Serial</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">ID</th>
		      <th scope="col">Image</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php while($st=mysqli_fetch_assoc($show)){ ?>
		    <tr>
		      <td class="fw-bold"><?php echo $st['id']; ?></td>
		      <td class="fw-bold"><?php echo $st['name']; ?></td>
		      <td class="fw-bold"><?php echo $st['email']; ?></td>
		      <td class="fw-bold"><?php echo $st['stuid']; ?></td>
		      <td><img style="height: 100px;" src="upload/<?php echo $st['image']; ?>"></td>
		      <td>
		        <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $st['id']; ?>">Edit</a>
		        <a class="btn btn-danger" href="#">Delete</a>	
		      </td>
		    </tr>

		<?php } ?>
		  </tbody>
       </table>
    </div>	





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>