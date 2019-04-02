<?php 
spl_autoload_register(function($class_name){
    require './app/'.$class_name.'.php';
});

$data = null;

$resource = new Resource();
if(isset($_POST['btnSearch'])){
	$dir = $_POST['links'];
	$data = $resource->dirToArray($dir);
	
}

if(isset($_POST['btnChange']))
{
	$links = $_POST['links'];
	$oldName = $links.'/'.$_POST['oldName'];
	$newName = $links.'/'.$_POST['newName'];

	$result = $resource->rename($oldName,$newName);

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RESEARCH</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/scripts.js">
  	
  </script>

  <script type="text/javascript">
  	<?php if($result) { ?>
  		alert('Seccessful change');

  	<?php } else { ?>
  		alert('Change failed');
 	<?php 	} ?>
  </script>
  <style type="text/css">
  	a {
  		cursor: pointer;
  		padding: 10px;
  		background: #fff;
  		border: 1px solid #000;
	}
	a:hover {
		background-color: #00ffff;
		border-radius: 10px;
	}
  	li {
  		margin-top: 10px;
  		padding-bottom: 20px;
  	}
  	ul {
  		margin: 20px;
  		border-style:dashed; 
  		display: inline-block;
  		padding: 20px;
  	}
	#formRename {
		display: none;
	}
  </style>
</head>
<body>
	
<div class="container">
	<H1>RENAME FILE PHP</H1>
	<form action="rename.php" method="POST">
		<div class="form-group">
			<label for="link">Link address:</label>
			<input type="text" class="form-control" id="link" name="links">
		</div>
		<button type="submit" name="btnSearch" class="btn btn-primary">Submit</button>
	</form>
	<form action="rename.php" method="POST" id="formRename" role="form">
		<legend>Form change a new name</legend>
		<div class="form-group">
			<label for="">Name needs change</label>
			<input type="text" class="form-control" name="oldName" id="oldName">
			<label for="">New name</label>
			<input type="text" class="form-control" name="newName" id="newName" placeholder="Enter a new name">
			<input type="hidden" class="form-control" id="links" name="links" value="<?php echo $dir ?>">
		</div>
		<button type="submit" name='btnChange' class="btn btn-primary">Submit</button>
	</form>

<?php if($data){ ?>
	<ul>
<?php foreach ($data as $key => $item1) { ?>
	
	<?php if(!is_numeric($key)) { ?>
 		<li>
 			<ul>
			<?php foreach ($item1 as $key2 => $item2) { ?>
				<li>
				<a ><?php echo $key.'/'.$item2 ?></a>
				</li>
			<?php } ?>
			</ul>
		</li>
	<?php } else { ?>
		<li><a><?php echo $item1 ?></a></li>
	<?php }?>
<?php } ?>
</ul>
<?php } ?>
	
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


