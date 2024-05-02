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

$filtroParcheggio = isset($_GET["sceltaParcheggio"]) && $_GET["sceltaParcheggio"] !== "prendefinito" ? $_GET["sceltaParcheggio"] : false;
$filtroVoto = isset($_GET["sceltaVoto"]) && $_GET["sceltaVoto"] !== "prendefinito" ? $_GET["sceltaVoto"] : false;

$hotelFiltrato = $hotels; 

if ($filtroParcheggio || $filtroVoto) {
    $hotelFiltrato = [];
    foreach ($hotels as $hotel) {
        if ($filtroParcheggio && $filtroVoto) {
            if ($hotel["parking"] && $hotel["vote"] >= $filtroVoto) {
                $hotelFiltrato[] = $hotel;
            }
        } elseif ($filtroParcheggio) {
            if ($hotel["parking"]) {
                $hotelFiltrato[] = $hotel;
            }
        } elseif ($filtroVoto) {
            if ($hotel["vote"] >= $filtroVoto) {
                $hotelFiltrato[] = $hotel;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <h1 class="text-center text-danger">Hotel List</h1>
    </header>
    <main>
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><?= $hotels[0]['name'] ?></th>
                        <td><?= $hotels[0]['description'] ?></td>
                        <td><?= $hotels[0]['parking'] ?></td>
                        <td><?= $hotels[0]['vote'] ?></td>
                        <td><?= $hotels[0]['distance_to_center'] ?> km</td>
                    </tr>
                    <tr>
                        <th><?= $hotels[1]['name'] ?></th>
                        <td><?= $hotels[1]['description'] ?></td>
                        <td><?= $hotels[1]['parking'] ?></td>
                        <td><?= $hotels[1]['vote'] ?></td>
                        <td><?= $hotels[1]['distance_to_center'] ?> km</td>
                    </tr>
                    <tr>
                        <th><?= $hotels[2]['name'] ?></th>
                        <td><?= $hotels[2]['description'] ?></td>
                        <td><?= $hotels[2]['parking'] ?></td>
                        <td><?= $hotels[2]['vote'] ?></td>
                        <td><?= $hotels[2]['distance_to_center'] ?> km</td>
                    </tr>
                    <tr>
                        <th><?= $hotels[3]['name'] ?></th>
                        <td><?= $hotels[3]['description'] ?></td>
                        <td><?= $hotels[3]['parking'] ?></td>
                        <td><?= $hotels[3]['vote'] ?></td>
                        <td><?= $hotels[3]['distance_to_center'] ?> km</td>
                    </tr>
                    <tr>
                        <th><?= $hotels[4]['name'] ?></th>
                        <td><?= $hotels[4]['description'] ?></td>
                        <td><?= $hotels[4]['parking'] ?></td>
                        <td><?= $hotels[4]['vote'] ?></td>
                        <td><?= $hotels[4]['distance_to_center'] ?> km</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="container mt-5">
            <div class="row">
                <h2 class="text-center text-danger">BONUS</h2>
            </div>
            <div class="row mt-3">
                <h4 class="fw-bolder">Filtri</h4>
            </div>
            <div class="row mt-3">
                <form action="index.php" method="GET"> 
                    <div class="row">
                        <div class="col-5 d-flex align-items-center">
                            <label class="fw-bold" for="sceltaParcheggio">Parcheggio</label>
                            <select class="form-select ms-3" name="sceltaParcheggio" id="sceltaParcheggio">
                                <option value="prendefinito" selected>Scegli...</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-5 d-flex align-items-center">
                            <label class="fw-bold" for="sceltaVoto">Voto</label>
                            <select class="form-select ms-3" name="sceltaVoto" id="sceltaVoto">
                                <option value="prendefinito" selected>Scegli...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button class="p-1 ps-3 pe-3" type="submit">FILTRA</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Parking</th>
                                <th>Vote</th>
                                <th>Distance to center</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hotelFiltrato as $hotel): ?>
                                <tr>
                                    <td><?= $hotel['name'] ?></td>
                                    <td><?= $hotel['description'] ?></td>
                                    <td><?= $hotel['parking'] ? 'Yes' : 'No' ?></td>
                                    <td><?= $hotel['vote'] ?></td>
                                    <td><?= $hotel['distance_to_center'] ?> km</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<style>
    
    tbody tr th:nth-child(1){
        font-weight: normal !important;
    }

</style>