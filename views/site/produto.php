<?php
use yii\helpers\Html;
?>
<div class="container" style="text-align:center">
	<h3 style="color:<?=$color?>;">
		<?=$produto->nome;?>
	</h3>

	<?php foreach ($produto->imagens as $i): ?>
		<?= Html::img($i->getUrl(), [
			'alt' => 'Imagem ' . $produto->nome,
		]); ?>
	<?php endforeach; ?>

</div>