<?php
$this->title = 'Fana Confecções';
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php
if(!Yii::$app->user->isGuest)
    echo Html::a('Cadastrar novo produto',Url::to(['/produto/insert']));
?>
<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div id="fh5co-board" data-columns>
                <?php foreach ($produtos as $p): ?>
                    <div class="item">
                        <div class="animate-box">
                            <a href="<?=Url::to(['/site/produto',
                                'id' => $p['id'],
                            ]);?>" class="image-popup fh5co-board-img" title="<?=$p['nome'];?>">
                            <img src="images/load.gif" data-src="<?=$p->getUrlCapa();?>" alt="Imagem <?=$p['nome'];?>"></a>
                        </div>
                        <div class="fh5co-desc">
                            <?=Html::a($p['nome'],['/site/produto','id'=>$p['id']]);?>
                            <?php
                            if(!Yii::$app->user->isGuest)
                                echo Html::a('Editar',Url::to(['/produto/index','id'=>$p['id']]));
                            ?>                     
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

