<?php

$nome = $_POST['nome'];
$email = $_POST['email'];

$dados = array('list' => array(
	'contacts' => array(array(
		'email' => $email,
		'cunstom_fields' => array(
			'nome' => $nome
			)
		)
	),
	'overwriteattributes' => true)
);

$data_string = json_encode($dados);                                                                                   

$ch = curl_init('https://emailmarketing.locaweb.com.br/api/v1/accounts/NUMERO_DA_SUA_CONTA/lists/NUMERO_DA_SUA_LISTA/contacts');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'GET: https://emailmarketing.locaweb.com.br/api/v1/accounts',
    'Content-Type: application/json',
	'X-Auth-Token: AQUI_VAI_O_SEU_TOKEN'
	)
);
$result = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo 'HTTP code: ' . $httpcode;
 
?>
