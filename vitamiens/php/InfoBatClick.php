<?php
$servername = "localhost";
$username = "izefa6381_zefa6381";
$password = "";
$database = "zefa6381_id20197455_bdsite";
$nomImg = $_REQUEST["nomImg"];

// Ouverture de la connexion avec la BD
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $info = "";
    $stmt = $conn->prepare('SELECT Type_sal, Info_sal, Etage_sal, Batiment.Nom_bat, Batiment.Zone_bat FROM Salle, Batiment WHERE Batiment.id_bat=Salle.id_bat AND Nom_image_bat=:nomImg ORDER BY Salle.Type_sal ASC, Salle.Etage_sal ASC');
    $stmt->bindParam(':nomImg', $nomImg);
    $stmt->execute();

    $prev_type = "";
    $typeSalle = "";
    
    foreach ($stmt as $row) {
        if($typeSalle != $row['Type_sal'])
        {
            $typeSalle = $row['Type_sal'];
            $typeSalleAff = $row['Type_sal'];
        }
        else
        {
            $typeSalleAff="SAME";
        }
        $infoSalle = $row['Info_sal'];
        $etageSalle = $row['Etage_sal'];
    
        $info.=$typeSalleAff."|".$infoSalle.",".$etageSalle."|";
    }
    echo $info;
    
} catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
} catch(Exception $e) {    
    echo "Exception: " . $e->getMessage();
}