<?php

/* @var $pagina Models\Pagina */
$pagina = $data['pagina'];
?>
<h3>Editar Página</h3>
<form method="POST" action="">
    <input type="hidden" name="idPagina" value="<?= $pagina->getIdPagina() ?>"/>
    <div class="form-group">
	<label for="titulo">Título</label>
	<input type="text" name="titulo" id="titulo" class="form-control" value="<?= $pagina->getTitulo() ?>" placeholder="Título"/>
    </div>
    <div class="form-group">
	<label for="titulo">Conteúdo</label>
	<textarea name="conteudo" id="conteudo" class="form-control" placeholder="Título"><?= $pagina->getConteudo() ?></textarea>
    </div>
    <div class="form-group">
	<input type="checkbox" name="publicado" id="publicado" <?= ($pagina->getPublicado() ? 'checked=""' : '') ?>/>
	<label for="publicado">Publicado</label>
    </div>
    
    <input type="submit" class="btn btn-success" value="Editar"/>
</form>