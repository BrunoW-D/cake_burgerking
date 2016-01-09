
    <h1 id="titre">Nos restaurants</h1>
    
    <?php
    $i = 0;
    foreach ($restaurants as $restaurant):
      $listeAdresse[$i] = $restaurant->adresse;
      $listeCp[$i] = $restaurant->cp;
      $listeVille[$i] = $restaurant->town_id;
      $listeLat[$i] = $restaurant->latitude;
      $listeLng[$i] = $restaurant->longitude;
      $listeId[$i] = $restaurant->id;
      $i++;
    endforeach;

    $listeAdresse = json_encode($listeAdresse);
    $listeCp = json_encode($listeCp);
    $listeVille = json_encode($listeVille);
    $listeLat = json_encode($listeLat);
    $listeLng = json_encode($listeLng);
    $listeId = json_encode($listeId);
    ?>

    <div id="map"></div>
    
    <script src="js/map.js">

      

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxP0ew2KsKFW9MW3vJPL-eY3E5qXBo6i8&signed_in=true&callback=initMap">
    </script>