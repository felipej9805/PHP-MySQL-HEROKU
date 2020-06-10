<?php

//include "conexion-local.php";  // Connection to Data base information LOCAL
//include "conexion-cloud.php";  // Connection to Data base information CLOUD
$host = "localhost";
$user = "root";
$pass = "password";
$db = "prueba";

//Crea la conexion con el SERVIDOR DE LA BASE DE DATOS
$enlace = mysqli_connect($host, $user, $pass);

//En el caso que la conexion no se logre, muestra el mensaje de error
if (!$enlace) {
   echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
   exit;
}

//En el caso que sea exitoso, muestra el siguientre mensaje
echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
echo "<br>";
echo "Conexión exitosa...";
echo "<br>";
echo "El host: $host";
echo "<br>";
echo "El usuario: $user";
echo "<br>";
echo "A la base de datos: $db";
echo "<br>";

//Receive the RAW post data.
//$content = trim(file_get_contents("data-prueba.json"));
 
//Attempt to decode the incoming RAW post data from JSON.
//$decoded = json_decode($content, true);
 
//If json_decode failed, the JSON is invalid.
//if(!is_array($decoded)){
//    throw new Exception('Received content contained invalid JSON!');
//}


//Crea la conexion a LA BASE DE DATOS que estamos trabajando, en caso que no sea exitoso, nos mostrara un mensaje
//$basededatos = mysqli_select_db( $enlace, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
//echo "Se conecto a la base de datos llamada: $db !!!!". PHP_EOL;
//echo "<br>";
   
   //date_default_timezone_set('America/Bogota'); // This line is important when the server is REMOTE and is located in other countries such as the USA or Europe. Set the time in Colombia to correctly record the date and time data with command "date" (used bellow), in the database.
   //$dev_id=$decoded['dev_id'];
   //$date = date("Y-m-d");
   //$hour = date("H:i:s");
   //$hw_serial=$decoded['hardware_serial'];
   //$latitude=  $decoded['payload_fields']['latitude_gps'];
   //$longitude= $decoded['payload_fields']['longitude_gps'];
   //$data_rate= $decoded['metadata']['data_rate'];


  // $sql1 = "INSERT into LoRaWAN_messages (dev_id, date, hour, hw_serial, latitude, longitude, data_rate) 
   //VALUES ('$dev_id', '$date', '$hour', '$hw_serial', '$latitude', '$longitude','$data_rate' )";
   //--- In the previous line, it must be taken into account that "locations" is the name of the table in the database, the fields below 
  // ---are the names of the fields in the database
   //--- After "VALUES" the variables that have the data coming from the microcontrolled card are placed
   //$result1 = $mysqli->query($sql1);

?>
