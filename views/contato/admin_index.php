<h3>Mensagens</h3>
<table class="table table-hover" style="width: 100%;">
    <thead>
	<tr>
	    <th>#</th>
	    <th>Nome</th>
	    <th>E-mail</th>
	    <th>Mensagem</th>
	</tr>
    </thead>
    <tbody>
	<?php 
	
	/* @var $mensagem Models\Mensagem */
	foreach ($data['mensagens'] as $mensagem): ?>
	<tr>
	    <td><?= $mensagem->getIdMensagem() ?></td>
	    <td><?= $mensagem->getNome() ?></td>
	    <td><?= $mensagem->getEmail() ?></td>
	    <td><?= nl2br($mensagem->getMensagem()) ?></td>
	</tr>
	<?php endforeach; ?>
    </tbody>
</table>