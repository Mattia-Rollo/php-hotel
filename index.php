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
    [
        'name' => 'Hotel Roma',
        'description' => 'Hotel Roma Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
    [
        'name' => 'Hotel Bingo',
        'description' => 'Hotel Bingo Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 38
    ],
    [
        'name' => 'Hotel Stella',
        'description' => 'Hotel Stella Descrizione',
        'parking' => false,
        'vote' => 3,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Palma',
        'description' => 'Hotel Palma Descrizione',
        'parking' => true,
        'vote' => 5,
        'distance_to_center' => 15
    ],

];

// $dati = $_GET['parcheggio'];
// var_dump($dati);
// var_dump($_GET['parcheggio']);
// $radiobuttonvalue = $_GET['parcheggio'];
if (isset($_GET['parcheggio']) && !empty($_GET['parcheggio'])) {
    $hotels = array_filter($hotels, fn($item) => $item['parking'] == filter_var($_GET['parcheggio'], FILTER_VALIDATE_BOOLEAN));
    // var_dump($hotels);
}
if (isset($_GET['voto']) && !empty($_GET['voto'])) {
    $hotels = array_filter($hotels, fn($item) => $item['vote'] >= $_GET['voto']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="./download.png">
    <link rel="stylesheet" href="style.css">
    <title>Hotel</title>
</head>

<body>
    <div class="container bg-light rounded shadow-lg py-5">
        <h1 class="py-4 text-center">Hotel a Milano</h1>

        <form action="index.php" method="get">
            <div class="d-flex gap-2 align-items-center py-3">
                <div class="d-flex gap-2 h100">
                    <label for="parcheggio">Parcheggio:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parcheggio" id="parcheggio" value="true">
                        <label class="form-check-label" for="Si">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parcheggio" value="false" id="parcheggio">
                        <label class="form-check-label" for="No">
                            No
                        </label>
                    </div>
                </div>
                <div class="d-flex h-100">
                    <select name="voto" id="voto" class="h-100">
                        <option value="">Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button class="rounded" type="submit">invia</button>
                    <button class="rounded" type="reset">reset</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">Hotel</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance km</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) { ?>

                <tr>
                    <?php
                    // var_dump($hotel['parking']);
                    $park = $hotel['parking'] ? 'si' : 'no';
                    echo "<td>" . $hotel['name'] . "</td>";
                    echo "<td>" . $hotel['description'] . " </td>";
                    echo "<td>" . $park . "</td>";
                    echo "<td>" . $hotel['vote'] . "</td>";
                    echo "<td>" . $hotel['distance_to_center'] . "</td> ";


                    ?>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>