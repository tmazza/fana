<?php
use yii\helpers\Html;
?>
<div class="container" style="text-align:center">
	<br>
	<h3 style="color:<?=$color?>;">
		<?=$produto->nome;?>
	</h3>
	<br>
	<br>
	<?php
	$total = count($produto->imagens);
	$parcial = 0;
	?>
	<?php foreach ($produto->imagens as $i): ?>
		<?php $parcial++; ?>
		<?= Html::img($i->getUrl(), [
			'alt' => 'Imagem ' . $produto->nome,
		]); ?>
		<p><?= 'Imagem ' . $parcial.' de ' . $total; ?></p>
	<?php endforeach; ?>

</div>