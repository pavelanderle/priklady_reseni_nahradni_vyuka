<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>BEER - účtenka</title>
</head>
<body>
    <div class="container p-3 my-3 border">
    <h2>PIVNÍ ÚČTENKA</h2>
    <div class="container p-3 my-3 border">
    <form action="#" method="get">
        <div class="form-group">
            <label for="NameBeer">Název piva:</label>
            <select class="form-control" id="nameBeer" name="nameBeer">
              <option value="Prazdroj">Prazdroj</option>
              <option value="Gambrinus">Gambrinus</option>
              <option value="Purkmistr">Purkmistr</option>
            </select>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="typeBeer" value="cp">Čepované pivo
            </label>
          </div>
        <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="typeBeer" value="lp" checked >Lahvové pivo
            </label>
        </div>
        <div class="form-group">
            <label for="usr">Počet piv:</label>
            <input type="number" class="form-control" id="numBeer" name="numBeer" value=1 required>
          </div>
        <div class="form-group">
            <input type="submit" value="Cena piv">
        </div>
    </form>
    </div>
    <div class="container p-3 my-3 border" >
      <h2>Souhrn:</h2>
      <?php
        if (isset($_GET["nameBeer"])) {
          include "Ext4_beer.php"; // připojení souboru s třídou
          $priceBeer = array("Prazdroj"=>23,"Gambrinus"=>18,"Purkmistr"=>20); // pole nastavením piv a jejich cen
          $priceMyBeer = $priceBeer[$_GET["nameBeer"]]; // získání ceny dle vybraného piva
          /* výběr typu piva */
          if ($_GET["typeBeer"]=="cp") {
            $myBeer = new BeerDraft($_GET["nameBeer"],$priceMyBeer,$_GET["numBeer"]); // vytvoření objektu ze třídy BeerDraft
          }
          else {
            $myBeer = new BeerBottled($_GET["nameBeer"],$priceMyBeer,$_GET["numBeer"]); // vytvoření objektu ze třídy BeerBottled
          }
          
          /* výpisy */
          echo "<p><strong>Zadané pivo: </strong>". $myBeer -> info()."</p>";
          echo "<p><strong>Celková cena: </strong>". $myBeer->getPriceSum()." Kč</p>";
        } 
      ?>
    </div>
    </div>
</body>
</html>