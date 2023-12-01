<?php
include 'conexao.php';
//Recebe o corpo do JSON enviado pela Instância
$json = file_get_contents('php://input');
$decode = json_decode($json, true);

//Gravar o JSON-body no arquivo de decode
ob_start();
var_dump($decode);
$input = ob_get_contents();
ob_end_clean();


//Cria um log para poder ver os JSON passado pelo webhook
// file_put_contents('log.log', $input . PHP_EOL, FILE_APPEND);


// Verifica SE É uma mensagem recebida
if (isset($decode['event']) && $decode['event'] == 'messages.upsert') {
    $mensagem = $decode['data']['message']['conversation'];
    $numero = $decode['data']['key']['remoteJid'];
    $usuer = $decode['data']['pushName']; // passar a chave do JSON de nome do usuario
    $curl = curl_init();

    //Se o webhook receber uma mensagem ele salva no banco de dados
    $sql = "INSERT INTO mensagem (usuario_mensagem, numero_usuario_mensagem, mensagem) VALUES ('$usuer', '$numero', '$mensagem')";
    $result = $con->query($sql);

    //Um EXEMPLO de envio de mensagem automatica, podendo ser configurada da forma que quiser.
if ($mensagem == 'oi' || $mensagem == 'ola') {
    $response = enviarMensagem($numero, 'Oi, tudo bem?');
    echo $response;
}else {
    $response = enviarMensagem($numero, '...');
    echo $response;
}
}

//Função para fazer os envios das mensagens.
function enviarMensagem($numero, $mensagem) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://12a26-2804-7f2-2980asdaw2113-asda-e469-5daf-aa9c-5cef-4fdd.ngrok-free.app/message/sendText/Guilherme', //colocar a url do servidor que está rodando a API.
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "number": "' . $numero . '",
            "textMessage": {
                "text": "' . $mensagem . '"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'apikey: zYzP7o123131&&@&@!qeqweQQKMCS#!cstxhSDDSWQZX3SJ2sa@#!$3D4FZTCu4ehnM8v4hu' //colocar a key da API.
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}



