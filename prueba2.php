<?php

//include "conexion-local.php";  // Connection to Data base information LOCAL
//include "conexion-cloud.php";  // Connection to Data base information CLOUD
$host = "localhost";
$user = "root";
$pass = "password";
$db = "prueba";

//Crea la conexion con el SERVIDOR DE LA BASE DE DATOS
$enlace = mysqli_connect($host, $user, $pass, $db);

//En el caso que la conexion no se logre, muestra el mensaje de error
if (!$enlace) {
   echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
   exit;
}
//En el caso que sea exitoso, muestra el siguientre mensaje
echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
echo "<br>";

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//If json_decode failed, the JSON is invalid.
if (!is_array($decoded)) {
   throw new Exception('Received content contained invalid JSON!');
}

date_default_timezone_set('America/Bogota'); // This line is important when the server is REMOTE and is located in other countries such as the USA or Europe. Set the time in Colombia to correctly record the date and time data with command "date" (used bellow), in the database.
$dev_id = $decoded['dev_id'];
$date = date("Y-m-d");
$hour = date("H:i:s");
$hw_serial = $decoded['hardware_serial'];
$latitude =  $decoded['payload_fields']['latitude_gps'];
$longitude = $decoded['payload_fields']['longitude_gps'];
$data_rate = $decoded['metadata']['data_rate'];


$sqlinsert = "INSERT INTO tablita (id, latitud, longitud) VALUES ('1', '2.222222', '3.33333333')";

if ($enlace->query($sqlinsert) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT * FROM tablita";
if($result = mysqli_query($enlace, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table width='100%' border='2px solid black' border-collapse: collapse>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>latitud</th>";
                echo "<th>longitud</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['latitud'] . "</td>";
                echo "<td>" . $row['longitud'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

  // $sql1 = "INSERT into LoRaWAN_messages (dev_id, date, hour, hw_serial, latitude, longitude, data_rate) 
   //VALUES ('$dev_id', '$date', '$hour', '$hw_serial', '$latitude', '$longitude','$data_rate' )";
   //--- In the previous line, it must be taken into account that "locations" is the name of the table in the database, the fields below 
  // ---are the names of the fields in the database
   //--- After "VALUES" the variables that have the data coming from the microcontrolled card are placed
   //$result1 = $mysqli->query($sql1);
