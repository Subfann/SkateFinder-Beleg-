<?php
include 'headerTest2.php';
require 'database.php';
?>
<?php




  /*
  $query2="SELECT * FROM categories";
  $read=$mysqli->query($query2);        */



  /*
  public function getCategories(){
    $this->db->query("SELECT * FROM categories);
    $results = $this->db->resultsSet();
    return $results;
  }  */

?>



<!-- Hero Section  -->

  <!-- End Hero Section  -->

  <!--
<div class="container-fluid">
	<div class="banner">
		<img src="images/ba2.jpg">
	</div>

</div>

-->




<section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Skatespot Liste</h1>
        
        <form  name="myform" action="" method="post">
          <select name="page" onchange="this.form.submit()" class="form-control">
			  <option value="0">Alle anzeigen</option>
				  <?php
				  $getcat = $mysqli->query('SELECT * FROM `categories`');
				  while($cat = $getcat->fetch_object()) {

				  if(isset($_POST['page'])) {
					  if ($_POST['page'] == $cat->id) {
						  $isselected = 'selected';
					  } else {
						  $isselected = '';
					  }
				  }

					  echo '<option value="'.$cat->id.'" '.$isselected.'>'.$cat->value.'</option>';
				  }
				  ?>

          </select>
        </form>

      </div>
      <div class="service-bottom">



<table class="table table-striped table-hover ">
  <thead>
    <tr class="tabup">

      <th>Spot</th>
      <th>Kategorie</th>
      <th>Ort</th>
      <th>Ansicht</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($_POST['page']) && $_POST['page'] != '0'){
	  $query='SELECT * FROM spot WHERE `categorie` = "'.$_POST['page'].'"';
  } else {
	  $query="SELECT * FROM spot";
  }
  $read=$mysqli->query($query);

  while ($row=$read->fetch_assoc()) { ?>

    <tr class="info">
      <td><?php echo  $row['name'];   ?></td>
      <td><?php echo  $mysqli->query('SELECT `value` FROM `categories` WHERE `id` = "'.$row['categorie'].'"')->fetch_object()->value;   ?></td>
      <td><?php echo  $row['ort'];   ?></td>
      <td><img src="uploads/<?php echo  $row['images']; ?>"</td>
      <td><a href="single2.php?posts=<?php echo  $row['id'];  ?>">Details</a></td>
    </tr>

    <?php } ?>
  </tbody>
</table> 
	

</div>
    </div>
  </section>

<?php  include 'footer.php' ; ?>

