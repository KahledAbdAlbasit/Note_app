<!DOCTYPE html>
<html>
<head>
	<title>Note App</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: #fff;
		}
		form {
			margin-top: 20px;
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
			width: 100%;
			max-width: 500px;
			margin: 0 auto;
		}
		input[type="text"], textarea {
			margin-bottom: 10px;
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			resize: none;
			font-size: 16px;
			font-family: Arial, sans-serif;
		}
		input[type="submit"], input[type="reset"] {
			padding: 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			font-family: Arial, sans-serif;
			margin-right: 10px;
		}
		input[type="reset"] {
			background-color: #ddd;
			color: #333;
		}
		.actions {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: 20px;
		}
		.edit, .delete {
			padding: 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			font-family: Arial, sans-serif;
			margin-right: 10px;
		?=id'.$fetch'	
		}
		.delete {
			background-color: #f44336;
		}
	</style>

	<link rel="icon" href="icon">
</head>


<body>

<?php include "./dp.php";?>
<?php //include "./editModel.php";?>

<?php
if(isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=="POST")
{
	$title=$_POST["title"];
	$desc=$_POST["desc"];
	$sql="INSERT into `note`(`title`, `description`) VALUES ('$title','$desc')";
	$result=mysqli_query($conn,$sql);
    
}


?>
	<div class="container">
		<h1>Note App</h1>
		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$sql="SELECT * FROM `note`";
			$result=mysqli_query($conn,$sql);

			$noNoes=true;
			while($fetch=mysqli_fetch_assoc($result))
			{
				$noNoes=false;
				echo '<tr>
					<td>'.$fetch["title"].'</td>
					<td>'.$fetch["description"].'</td>
					<td class="actions">
				<a href="./update.php?upadetid='.$fetch["sno"].'" class="edit">Edit</a>
			

						<a href="./delete.php?id='.$fetch["sno"].'" class="delete">Delete</a>
                    </td>
                    </tr>';
			}
			if($noNoes)
			{
				echo '<tr>
					<td>messege</td>
					<td>NoNotes avilable for reading</td>
                    </tr>';
			}
			?>
				

                    </tbody>
                    </table>

                    <form  method="POST">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    
                        <label for="description">Description:</label>
                        <textarea id="description" name="desc" rows="4" required></textarea>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                        
                    </form>
                    </div>
                    </body>
                    
</html>