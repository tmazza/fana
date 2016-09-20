<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container">
	Nome:<h3><?=$produto->nome;?></h3>
	Capa:<br> 
	<?php if($produto->capa == $capaDefault): ?>
		Sem capa.
	<?php else: ?>
		<?= Html::img($produto->getUrlCapa(),[
			'style' => 'width: 200px;',
		]); ?>
	<?php endif; ?>
	<h3>Imagens</h3> (clique para selecionar como capa)
	<hr>
	<?php foreach ($produto->imagens as $i): ?>
		<div style="display: inline-block; vertical-align: top; width: 300px;">
			<a href="<?=Url::to(['produto/capa',
				'id' => $produto->id,
				'idImg' => $i->id,
			])?>">
				<?= Html::img($i->getUrl(),[
					'style' => 'width: 100%;',
				]); ?>
			</a>
		</div>
	<?php endforeach; ?>
</div>