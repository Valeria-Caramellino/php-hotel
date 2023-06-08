<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
</head>
<style>
  
</style>
<body>
<?php 

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];


$controlloParking = null; 
if (array_key_exists("parking", $_GET)) {
$controlloParking = $_GET["parking"];
}; 

$minVote = 0; 

if (array_key_exists("vote", $_GET)) {
$minVote = $_GET["vote"];
};

$FilterForArray = [];

foreach ($hotels as $hotel) {
if ($hotel["parking"] == $controlloParking || $controlloParking === null) {
    if ($hotel["vote"] >= $minVote) {
        $FilterForArray[] = $hotel;
    }
}
}

?>
    <header>
        <section class="container">
            <div class="row bg-primary text-center">
                <div class="col-12">
                    <h1>PHP HOTEL</h1>
                </div>
                <div class="col-12">
                    <form method="get" class="d-flex align-items-center mb-4">
                        <div class="parking">
                            <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking">
                            <label class="form-check-label" for="parking">
                             Hotel con parcheggio
                            </label> 
                        </div> 
                        <div class="votation ps-5">
                            <label for="vote" class="form-label d-inline-block m-0">
                            filtra per minimo voto
                            </label>
                            <input type="number" class="form-control d-inline-block px-2 py-1" id="vote" name="vote" min="1" max="5">
                        </div>
                        <button type="submit" class="btn btn-dark px-2 py-1 mx-3">Appica</button>
                    </form>
                </div>
                
            </div>
        </section>
        

    </header>
    <main>
        <section class="container">
            <div class="row">
                <div class="col-11">
                    <table class="table">
                        <thead>
                            <?php foreach ($hotels[0] as $key => $value) { ?>
                                <th scope="col"><?= ucwords(str_replace('_', ' ', $key)) ?></th>
                            <?php }?>
                        </thead>
                        <tbody>
                            <?php foreach ($FilterForArray as $hotel) { ?>
                                <tr>
                                    <td><?= $hotel["name"] ?></td>
                                    <td><?= $hotel["description"] ?></td>
                                    <?php if ($hotel["parking"] == true) : ?>
                                        <td>Yes</td>
                                    <?php else : ?>
                                        <td>No</td>
                                    <?php endif ?>
                                    <td><?= $hotel["vote"] ?></td>
                                    <td><?= $hotel["distance_to_center"] ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>
        
    </main>
</body>
</html>