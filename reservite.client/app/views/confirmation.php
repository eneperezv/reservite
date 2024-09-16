<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Reservation Confirmed</h1>
    <p>Room Type: <?= $data['reservation']['roomType'] ?></p>
    <p>Check-In Date: <?= $data['reservation']['checkInDate'] ?></p>
    <p>Check-Out Date: <?= $data['reservation']['checkOutDate'] ?></p>
</body>
</html>
