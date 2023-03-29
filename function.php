<?php
   
   class crudapp{
   	private $conn;

   	#database host,db user,db pass,db name
   public function __construct(){
	   	$dbhost='localhost';
	   	$dbuser='root';
	   	$dbpass="";
	    $dbname='testdb';

    $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


    if(!$this->conn){
    	die("DB is not connected");
    }
   }

   public function add_data($data){
	   	 $stu_name=$data['name'];
	   	 $stu_mail=$data['email'];
	   	 $stu_id=$data['id'];
	   	 $stu_img=$_FILES['img']['name'];
	   	 $tmp=$_FILES['img']['tmp_name'];
	   	 

   	 $query = "INSERT INTO testtable(name,email,stuid,image) VALUE ('$stu_name','$stu_mail','$stu_id','$stu_img')";

   	 //this->conn bojhae kon database e jete hobe query ta bujhabe db te ki kaj korte hbe//

   	 if(mysqli_query($this->conn,$query)){
   	 	move_uploaded_file($tmp, 'upload/'.$stu_img);
          return "Information Added Successfully";
   	 }

   }


   public function show_data(){
   	  $query= "SELECT * FROM testtable";
   	  if(mysqli_query($this->conn,$query)){
	   	  	$returndata=mysqli_query($this->conn,$query);
	   	  	return $returndata;
   	  }
   }
   public function update_data($id){
   	  $query= "SELECT * FROM testtable WHERE id=$id";
   	  if(mysqli_query($this->conn,$query)){
	   	  	$returndata=mysqli_query($this->conn,$query);
	   	  	$sdata=mysqli_fetch_assoc($returndata);
	   	  	return $sdata;
   	  }
   }

  public function dupdata($data){
  

	  	$stname=$data['uname'];
	  	$stmail=$data['uemail'];
	  	$stroll=$data['uid'];
	  	$stid=$data['tt_id'];
	  	$stimg=$_FILES['uimg']['name'];
	  	$temp_name=$_FILES['uimg']['tmp_name'];

  	if($stimg!=""){
        move_uploaded_file($temp_name, 'upload/'.$stimg);
        $query="UPDATE testtable SET name='$stname',email='$stmail',stuid='$stroll',image='$stimg' WHERE id=$stid ";
        $ud=mysqli_query($this->conn,$query);
        header('location:index.php');
  	}
  	else{
        $query="UPDATE testtable SET name='$stname',email='$stmail',stuid='$stroll' WHERE id=$stid ";
        $ud=mysqli_query($this->conn,$query);
        header('location:index.php'); 
  	}
    

    // $query="UPDATE testtable SET name='$stname',email='$stmail',stuid='$stroll',image='$stimg' WHERE id=$stid ";

    // if(mysqli_query($this->conn,$query)){
    // 	move_uploaded_file($temp_name, 'upload/'.$stimg);
    // 	return "Image Updated Successfully";
    // }
  }
 }
?>