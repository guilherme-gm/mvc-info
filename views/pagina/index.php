<?php foreach ($data['paginas'] as $pagina): ?>
<div class="item-pagina">
    <a href="<?= Lib\App::getRouter()->getUrl('pagina', 'ver', [$pagina->getIdPagina()]) ?>"><?= $pagina->getTitulo() ?></a>
</div>
<?php endforeach; ?>
