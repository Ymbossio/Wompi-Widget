<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wompi Panamá - Ejemplo</title>

    <script
  type="text/javascript"
  src="https://checkout.wompi.pa/widget.js"
></script>

</head>
<body>

<?php
$productos = [
    [
        "id" => 1,
        "producto" => "Laptop",
        "nombre" => "Lenovo ThinkPad",
        "precio" => 950.00,
        "reference" => "LP-THNK-001"
    ],
    [
        "id" => 2,
        "producto" => "Smartphone",
        "nombre" => "Samsung Galaxy S22",
        "precio" => 850.00,
        "reference" => "SM-GAL-002"
    ],
    [
        "id" => 3,
        "producto" => "Monitor",
        "nombre" => "Dell 24''",
        "precio" => 220.00,
        "reference" => "MON-DEL-003"
    ]
];

$public_key = "pub_test";
$keyIntegrity = "test_integrity";
$currency = "USD";

foreach ($productos as $producto) {
    $amountInCents = intval($producto["precio"] * 100);
    $reference = $producto["reference"];
    $signature = hash('sha256', $reference . $amountInCents . $currency . $keyIntegrity);
    ?>

    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?= $producto["producto"] ?></h3>
        <p><?= $producto["nombre"] ?></p>
        <p>Precio: $<?= $producto["precio"] ?></p>

        <script
            src="https://checkout.wompi.pa/widget.js"
            data-render="button"
            data-public-key="<?= $public_key ?>"
            data-currency="<?= $currency ?>"
            data-amount-in-cents="<?= $amountInCents ?>"
            data-reference="<?= $reference ?>"
            data-signature:integrity="<?= $signature ?>"
        ></script>
    </div>

<?php } ?>

</body>
</html>
