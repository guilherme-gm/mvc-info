<h3>Páginas</h3>
<table class="table table-striped" style="width: 400px;">
    <tbody>
	<?php foreach ($data['paginas'] as $pagina): ?>

    	<tr>
    	    <td><?= $pagina->getTitulo() ?></td>
    	    <td class="text-right">
    		<a href="?route=admin&module=pagina&action=editar&id=<?= $pagina->getIdPagina() ?>"
    		   class="btn btn-sm btn-primary">
    		    Editar
    		</a>
    		<a href="?route=admin&module=pagina&action=excluir&id=<?= $pagina->getIdPagina() ?>"
    		   class="btn btn-sm btn-danger"
		   onclick="return confirmaExcluir()">
    		    Excluir
    		</a>
    	    </td>
    	</tr>

	<?php endforeach; ?>
    </tbody>
</table>

<br />
<div>
    <a href="?route=admin&module=pagina&action=nova"
       class="btn btn-sm btn-success">
	Nova Página
    </a>
</div>