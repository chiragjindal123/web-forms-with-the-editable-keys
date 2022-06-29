<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="database";
$link=mysqli_connect($server_name,$username,$password,$database_name);
$conn=mysqli_select_db($link,$database_name);
?>


<html>
<head>
	<title>
		sample
	</title>
</head>
<body>
	<div align="center">
		
	</div>
<form action="" method="post">
	<table border="1" align="center">
		<tr>
			<td>
			<label>Enter First Name</label></td>
			<td><input type="text" name="first_name"></td>
		</tr>
		<tr>
			<td>
			<label>Enter Last Name</label></td>
			<td><input type="text" name="last_name"></td>
		</tr>
		<tr>
			<td>
			<label>Gender</label></td>
			<td><input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female</td>
		</tr>
		<tr>
			<td>
			<label>Education</label></td>
			<td> <select name="Education">
                <option value="">--select education--  </option>
                <option value="10th"> 10th </option>
                <option value="12th"> 12th </option>
                <option value="graduation"> graduation </option>
                <option value="post-graduation"> post-graduation </option>

            </select></td>
		</tr>
		<tr>
			<td>
			<label>Hobbies</label></td>
			<td><input type="checkbox" name="interest" value="music"/> music
                <input type="checkbox" name="interest" value="yoga"/> yoga
                <input type="checkbox" name="interest" value="playing"/> playing
                <input type="checkbox" name="interest" value="other"/> other <br/>
            </td>
		</tr>
		<tr>
			<td colspan="2" align="center" >
                <input type="submit"name="submit1"value="insert">
                <input type="submit"name="submit2"value="delete">
                <input type="submit"name="submit3"value="update">
                <input type="submit"name="submit4"value="display">
                <input type="submit"name="submit5"value="search">
            </td>
		</tr>
	</table>
</form>
</body>
</html>


<?php
if($conn)
{
echo("connection ok     ");
}
else
{

  die("connection failed because".mysqli_connect_error());
}


if(isset($_POST["submit1"]))
{
mysqli_query($link,"insert into aat values('$_POST[first_name]','$_POST[last_name]','$_POST[gender]','$_POST[Education]','$_POST[interest]')");

echo"Record inserted successfully";
 }
if(isset($_POST["submit2"]))

{
mysqli_query($link,"delete from aat where first_name='$_POST[first_name]'");
echo"Record deleted successfully";
}
if(isset($_POST["submit3"]))
{
mysqli_query($link,"update aat set gender='$_POST[gender]'where first_name=';='$_POST[first_name]'");
}

if(isset($_POST["submit4"]))
{
$res=mysqli_query($link,"select * from aat");
echo"<table border=1>";
   echo"<tr>";
   echo"<th>"; echo"first_name"; echo"</th>";
   echo"<th>"; echo"last_name"; echo"</th>";
   echo"<th>"; echo"gender"; echo"</th>";
   echo"<th>"; echo"Education"; echo"</th>";
   echo"<th>"; echo"interest"; echo"</th>";
               
   echo"</tr>";
while($row=mysqli_fetch_array($res))
   {
      echo"<tr>";
echo"<td>";echo$row["first_name"];echo"</td>";
echo"<td>";echo$row["last_name"];echo"</td>";
echo"<td>";echo$row["gender"];echo"</td>";     
echo"<td>";echo$row["Education"];echo"</td>";     
echo"<td>";echo$row["interest"];echo"</td>";     
echo"</tr>";
}
echo"</table>";
}

if(isset($_POST["submit5"]))
{
$res=mysqli_query($link,"select*from aat where first_name='$_POST[first_name]'");

echo"<table border=1>";
    echo"<tr>";
    echo"<th>"; echo"first_name";echo"</th>";
    echo"<th>"; echo"last_name";echo"</th>";
    echo"<th>";echo"gender";echo"</th>";
    echo"<th>";echo"Education";echo"</th>";
    echo"<th>";echo"interest";echo"</th>";
    echo"</tr>";               
while($row=mysqli_fetch_array($res))
{
echo"<tr>";
echo"<td>"; echo$row["first_name"]; echo"</td>";
echo"<td>"; echo$row["last_name"];echo"</td>";
echo"<td>"; echo$row["gender"];echo"</td>";
echo"<td>"; echo$row["Education"];echo"</td>";
echo"<td>"; echo$row["interest"];echo"</td>";
echo"</tr>";
}  
echo"</table>";
}   
?>        
             
             
               



                                  
           