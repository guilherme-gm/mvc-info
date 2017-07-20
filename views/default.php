<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?= Lib\Config::get('site_name') ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<h2>Cabeçalho</h2>
	<p><?= __('lng.teste2', 'Sem frase') ?></p>
        <?= $data['content'] ?>
	<h2>Rodapé</h2>
    </body>
</html>
