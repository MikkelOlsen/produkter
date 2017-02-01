<?php

    $navn = '';
    $info = '';
    $pris = '';    
    $fejlnavn = '';
    $fejlinfo = '';
    $fejlpris = '';
    $fejl = 0; // fejl-conuter
    $success = 'Opret dit produkt her'; // success-besked

if ($_POST) // CHeck om POST ekstistere
{

    ## Definer variabler
    $navn = $_POST['produktnavn'];
    $info = $_POST['produktinfo'];
    $pris = $_POST['produktpris'];

    if( isset( $_POST['produktnavn'] ) )
    {
        if (empty( $_POST['produktnavn']))
        {
            $fejlnavn = "Navn - Feltet er ikke udfyldt!";
            $fejl++;
        }
        else
        {
            if ( preg_match('/\d/', $_POST['produktnavn']))
            {
                $fejlnavn = "Produktnavnet må kun indeholde bogstaver";
                $fejl++;
            }
            else
            {
                $navn = $_POST['produktnavn'];
            }
        }
    }

    if( isset ( $_POST['produktinfo'] ) )
    {
        if (empty( $_POST['produktinfo']))
        {
            $fejlinfo = "Du mangler at udfylde produktinfo!";
        }
        else 
        {
            $info = $_POST['produktinfo'];
        }
    }
    
    if( isset( $_POST['produktpris'] ) )
    {
        if (empty( $_POST['produktpris']))
        {
            $fejlpris = "Du skal skrive en pris";
            $fejl++;
        }
        else
        {
            if (!is_numeric ($_POST['produktpris']))
            {
                $fejlpris = "Prisen kan kun være tal";
                $fejl++;
            }
            else
            {
                $pris = $_POST['produktpris'];
            }
        }
    }

    if ( $fejl === 0 )
    {
    $conn = mysqli_connect('localhost', 'root', '', 'shop'); // Opret forbindelse til databasen
    mysqli_query($conn, "INSERT INTO `produkter` (produktnavn, produktinfo, produktpris) VALUES ('$navn', '$info', '$pris')"); //Sæt data ind i databsen
    mysqli_close($conn); // Luk forbindelsen
        $navn = '';
        $info = '';
        $pris = '';
        $success = "Produktet er oprettet";

    }



}

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

<div class="row">

<h1><?php echo $success; ?></h1>

<form class="col s20" action="" method="post">

    <label>Produktnavn</label>
    <input type="text" name="produktnavn" value="<?php echo $navn; ?>">
    <p><?php echo $fejlnavn; ?></p>

    <label>Produktinfo</label>
    <textarea name="produktinfo"></textarea>
    <p><?php echo $fejlinfo; ?></p>

    <label>Produktpris</label>
    <input type="text" name="produktpris" value="<?php echo $info; ?>">
    <p><?php echo $fejlpris; ?></p>

    <input type="submit">
</form>

</div>
    
</body>
</html>

