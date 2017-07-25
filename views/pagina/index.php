<?php foreach ($data['paginas'] as $pagina): ?>
<div class="item-pagina">
    <a href="?module=pagina&action=ver&id=<?= $pagina->getIdPagina() ?>"><?= $pagina->getTitulo() ?></a>
</div>
<?php endforeach; ?>
