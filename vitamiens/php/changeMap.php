<?php

$map = $_REQUEST["map"];
echo "<img class=\"plan\" usemap=\"#map{$map}\" src=\"data/img/map/{$map}.jpg\" alt=\"Plan UFR des Sciences\">";

?>