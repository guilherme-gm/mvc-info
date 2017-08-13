<?php foreach ($data['paginas'] as $pagina): ?>
<div class="item-pagina">
    <a href="<?= Lib\App::getRouter()->getUrl('pagina', 'ver', [$pagina->getIdPagina()]) ?>"><?= $pagina->getTitulo() ?></a><br />
    Postado por: <?= $pagina->getAutor()->getNome() ?>
</div>
<?php endforeach; ?>
