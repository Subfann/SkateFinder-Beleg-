<?php

include 'header3.php';
require 'database.php';

if(isset($_GET['posts'])){

	$id=$_GET['posts'];
	$query2= "SELECT * FROM spot where id='$id'";
	$readd=$mysqli->query($query2);

}

?>

<body>
    <div class="container">
        <header>
            <div class="trans">
                    <div class="brand">
                        <a href="index.php"><h1><span>S</span>kate <span>F</span>inder</h1></a>
                    </div>
            </div>
        </header>

        <div id="hero">
        
        </div>

             <div id="oben"></div>
                    <div id="ort1">Ort</div>
                    <div id="straße1">Straße</div>
                    <div id="beleb1">Besuchtheit</div>
                    <div id="zustand1">Zustand</div>
                    <div id="beschr1">Beschreibung</div>
                    <div id="rooms1">Ansicht</div>

         <?php while ($row= $readd->fetch_assoc()) { ?>

                    <div id="ort2"><?php echo $row['ort'];  ?></div>
                    <div id="straße2"><?php echo $row['adresse'];  ?></div>
                    <div id="beleb2"><?php echo $row['beleb'];  ?></div>
                    <div id="zustand2"><?php echo $row['zustand'];  ?></div>
                    <div id="beschr2"><?php echo $row['descrip'];  ?></div>
                    <div id="rooms2">	<?php  $image_name="SELECT * FROM spot as p join details as d 
      					on p.id =d.proid where d.proid =".$row['id'];
      					$read1=$mysqli->query($image_name);

      					foreach ($read1 as $value) { ?>

      						<img class="bild" src="uploads/<?php echo $value['images']; ?>" />
      						
      					<?php  } ?></div>
<?php   } ?>
                    <div id="links"></div>
                    <div id="rechts"></div>
            <div id="unten">
                <div class="vertical">
                <a href="index.php">Zurück </a>
                </div>
            </div>
            <footer>
       
                <div class="cont">
                <div class="brand2"><h1><span>S</span>kate <span>F</span>inder</h1></div>
              <h2>Find Your Spot Today</h2>
              
               
                  <a href="https://www.facebook.com/"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png"/></a>
               
              
                  <a href="https://www.instagram.com/ericspielmann/"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png"/></a>
              
            
                  <a href="https://twitter.com/TransWorldSKATE"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png"/></a>
              
               
                  <a href="https://www.youtube.com/watch?v=ay-fvHxK-j0"><img src="https://img.icons8.com/bubbles/100/000000/youtube.png"/></a>
               
           
              <p>Copyright © 2020 Eric Spielmann</p>
        
            </div>
              </footer>

    </div>
</body>

<?php  include 'footer2.php' ; ?>