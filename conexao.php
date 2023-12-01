<?php
//conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webhook";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
   
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    echo "conectado" . "<br>";
}

// //puxando dados da coluna id_mensagem
// $sql = "SELECT id_mensagem FROM mensagem";
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $id_mensagem = $row['id_mensagem'];
//         echo "ID da mensagem: " . $id_mensagem . "<br>";
//         // Use the fetched data as needed
//     }
// } else {
//     echo "No data found";
// }
