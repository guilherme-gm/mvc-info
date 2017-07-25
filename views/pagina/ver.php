<?php
/* @var $pagina Models\Pagina */
$pagina = $data['pagina'];
?>
<h2><?= $pagina->getTitulo() ?></h2>
<p><?= $pagina->getConteudo() ?></p>