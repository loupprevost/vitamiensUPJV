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

    $info = "";
    $stmt = $conn->prepare('SELECT Type_sal, Info_sal, Etage_sal, Batiment.Nom_bat, Batiment.Zone_bat, Batiment.Nom_image_bat as batIMG FROM Salle, Batiment WHERE Batiment.id_bat=Salle.id_bat AND Batiment.Nom_bat=:Rech AND Batiment.Zone_bat=:Zone ORDER BY Salle.Etage_sal ASC, Salle.Type_sal ASC');
    $stmt->bindParam(':Rech', $Rech);
    $stmt->bindParam(':Zone', $Zone);
    $stmt->execute();

    $prev_type = "";
    $typeSalle = "";
    
    foreach ($stmt as $row) {
            $info=$row['batIMG'];
    }
    if($info!=null && $info!="")
    {
        echo $info;
    }
    else
    {
        echo "NONE";
    }
    
} catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
} catch(Exception $e) {    
    echo "Exception: " . $e->getMessage();
}