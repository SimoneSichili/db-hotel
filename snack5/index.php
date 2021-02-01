<?php 
    include __DIR__ . "/database.php";

    $filteredHotels = [];

    if(!empty($_GET)) {

        foreach ($hotels as $hotel) {
            if($_GET["vote"] == $hotel["vote"] && $_GET["vote"] > 0) {
                $filteredHotels[] = $hotel;
            } elseif ($_GET["distance"] >= $hotel["distance_to_center"]) {
                $filteredHotels[] = $hotel;
            } elseif (filter_var($_GET["parking"], FILTER_VALIDATE_BOOLEAN) == $hotel["parking"]) {
                $filteredHotels[] = $hotel;
            }        
        }
    } else {
        $filteredHotels = $hotels;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Snack 5</title>
</head>
<body>
    <div class="container">
        <?php foreach ($filteredHotels as $hotel) { ?>
            <div class="hotel">
                <h2><?php echo $hotel["name"]; ?></h2>
                <p><?php echo $hotel["description"]; ?></p>
                <hr>
                <div>Parcheggio: <span><?php echo $hotel["parking"] ? "Si" : "No"; ?></span></div>
                <div>Voto: <span><?php echo $hotel["vote"]; ?></span></div>
                <div>Distanza: <span><?php echo $hotel["distance_to_center"]." Km"; ?></span></div>
            </div>
        <?php } ?>
    </div>
</body>
</html>