
    <h2 id="titre">Nos restaurants</h2>

    <h5 style="text-align:center; color:grey">Veuillez sélectionnez le restaurant dans lequel vous voulez commander</h5>


    <?= $this->Html->script('jquery-1.12.0'); ?>
    <script type="text/javascript" src="//www.google.fr/jsapi"></script>
    <script type="text/javascript">
      google.load("maps", "3.4", {
        other_params: "sensor=false&language=fr"
      });
    </script>
    <?= $this->Html->script('jquery.googlemap.js'); ?>

    <div id="map" style="width: 500px; height: 400px;"></div>

    <script type="text/javascript">
      var listeAdresse = <?php echo $listeAdresse;?>;
      var listeCp = <?php echo $listeCp; ?>;
      var listeVille = <?php echo $listeVille; ?>;
      var listeId = <?php echo $listeId; ?>;

      $(function() {
        $("#map").googleMap();
        for(var i = 0; i < listeId.length; i++){
      
          $("#map").addMarker({
            address: listeAdresse[i], // Postale Address
            //url: "../meals/" + listeId[i], // Link
            icon: "../webroot/img/burgerking_icon.png",
            title: listeVille[i],
            text: "<p>" + listeCp[i] + " - " + listeAdresse[i] + "</p>" + " <a href='../meals?id=" + listeId[i] + "'>Commander chez ce restaurant</a>"
          });
        }
      })
    </script>