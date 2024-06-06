<?php
$servername = "localhost";
$username = "izefa6381_zefa6381";
$password = "";
$database = "zefa6381_id20197455_bdsite";
$Zone = $_REQUEST["Zone"];
$Rech = $_REQUEST["Rech"];

// Ouverture de la connexion avec la BD
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT Nom_image_bat FROM Batiment WHERE Batiment.Nom_bat=:Rech AND Batiment.Zone_bat=:Zone');
    $stmt->bindParam(':Rech', $Rech);
    $stmt->bindParam(':Zone', $Zone);
    $stmt->execute();
    
    $nomImage = "";
    
    foreach ($stmt as $row) {
      $nomImage = $row['Nom_image_bat'];
    }
    
    echo $nomImage;
    
} catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
} catch(Exception $e) {    
    echo "Exception: " . $e->getMessage();
}