<?php
include("config.php");
if(isset($_POST['name'])&&isset($_POST['sc']))
{	echo "ok";
	$name=$_POST['name'];
	$score=$_POST['sc']; 
	$qry="select * from score where name='$name'";
	$result = mysqli_query($db, $qry);
	$row = mysqli_fetch_assoc($result);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		$qry1="insert into score (name,sc) values ('$name','$score')";
		mysqli_query($db,$qry1);
	}
   
	if($row['sc']<$score)
	{   $qry2="update score set sc='$score' where name='$name'";
		mysqli_query($db,$qry2);
	}
}
?>