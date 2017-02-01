<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produkter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<body>

<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="">Opret Produkt</a></li>
        <li><a href="">Produkter</a></li>
      </ul>
    </div>
  </nav>

    <table>
        <thead>
            <tr>
                <th>Produktnavn</th>
                <th>Produktinfo</th>
                <th>Produktpris</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'shop'); // Opret forbindelse til databasen
                $result = mysqli_query($conn, "SELECT produktnavn, produktinfo, produktpris FROM `produkter`");
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
                {
                    ?>
                    <tr>
                        <td><?=$row['produktnavn']?></td>
                        <td><?=$row['produktinfo']?></td>
                        <td><?=$row['produktpris']?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>