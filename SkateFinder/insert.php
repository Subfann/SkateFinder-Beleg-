<?php
include 'headerTest.php';
require 'database.php';
?>
<?php

function ESCAPE($string) {
	global $mysqli;
	return mysqli_real_escape_string($mysqli , $string);
}



if(isset($_POST['submit'])){

	$name= ESCAPE($_POST['name']);
	$monthly= ESCAPE($_POST['monthly']);
	$ort= ESCAPE($_POST['ort']);
	$adresse= ESCAPE($_POST['adresse']);
	$beleb= ESCAPE($_POST['beleb']);
	$zustand= ESCAPE($_POST['zustand']);
	$descrip=ESCAPE($_POST['descrip']);
	
	$target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["images"]["name"]);
	$temp_file=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
	
	
	$query="INSERT INTO spot (name,categorie,ort,adresse,beleb,zustand,descrip,images) VALUES ('$name','$monthly','$ort','$adresse','$beleb','$zustand','$descrip','$temp_file')";
	$insert=$mysqli->query($query);
	$last_id = $mysqli->insert_id;
	$c=count($_FILES['img']['name']);
	if($insert){

		if($c < 10){

			for ($i=0; $i <$c; $i++) { 
				$img_name=$_FILES['img']['name'][$i];
				move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
				$query_multi="INSERT INTO details(images,proid) VALUES ('$img_name','$last_id')";
				$ins=$mysqli->query($query_multi);
			}
			// else{
			// 	echo "MAX LIMIT EXCEED";
			// }

		}

	}


}


?>

<div class="container1"> 

<form id=form1 class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Spot hinzufügen </legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name des Spots</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control"  placeholder="zb: Treppe neben der Lingner ">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Art des Spots(Kategorie)</label>
      <div class="col-lg-10">
		  <select name="monthly" id="cars" class="form-control">
			  <?php
			  $getcat = $mysqli->query('SELECT * FROM `categories`');
			  while($cat = $getcat->fetch_object()) {
			  	echo '<option value="'.$cat->id.'">'.$cat->value.'</option>';
			  }
			  ?>
		  </select>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Ort</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="ort" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Straße</label>
      <div class="col-lg-10">
        <input type="text" name="adresse" class="form-control"  placeholder="Adresse">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Besuchtheit</label>
      <div class="col-lg-10">
        <input type="text" name="beleb" class="form-control"  placeholder="viel befahren/ruhig gelegen">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Zustand</label>
      <div class="col-lg-10">
        <input type="text" name="zustand" class="form-control"  placeholder="Gut/Mittel/Schlecht">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Beschreibung</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="descrip" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Bild vom Spot</label>
      <div class="col-lg-10">
        <input type="file" name="images">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Weitere Bilder des Spots/Detailaufnahmen (optional)</label>
      <div class="col-lg-10">
        <input type="file" name="img[]" multiple>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Abbrechen</button>
        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
      </div>
    </div>
  </fieldset>
</form>

</div>


<?php  include 'footer.php' ; ?>