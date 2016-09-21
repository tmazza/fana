<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Produto;
use app\models\ProdutoImagem;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class ProdutoController extends Controller
{	
	public $capaDefault = 'images/load.gif';


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                 'rules' => [
	                ['allow' => true,
	                 'roles' => ['@'],],
	            ],
            ],
        ];
    }


	public function actionIndex($id)
	{
		$produto = Produto::findOne((int) $id);
		return $this->render('index',[
			'produto' => $produto,
			'capaDefault' => $this->capaDefault,
		]);
	}

	public function actionCapa($id,$idImg)
	{
		$produto = Produto::findOne((int) $id);
		$imagem = ProdutoImagem::findOne((int) $idImg);
		$produto->capa = $imagem->path;
		$produto->update();
		$this->redirect(['/produto/index','id'=>$produto->id]);
	}

	public function actionInsert($id=false)
	{
		$model = $id ? Produto::findOne((int)$id) : new Produto();
		$model->scenario = $id ? \yii\base\Model::SCENARIO_DEFAULT : Produto::SCENARIO_INSERT;

        if (Yii::$app->request->isPost) {
        	$model->load(Yii::$app->request->post());
        	$model->capa = is_null($model->capa) ? $this->capaDefault : $model->capa;
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->validate()) {
            	try {
            		if($model->save()){
            			foreach ($model->imageFiles as $i) {
        					$ext = '.' . pathinfo($i->name, PATHINFO_EXTENSION);
        					$key = 'produto/' . $model->id . '/';
        					$key .= hash('crc32',$i->name. microtime(true)).$ext;
        					$type = $i->type;
        					$this->uploadAWS($key,$i->tempName,$type);

        					$image = new ProdutoImagem;
        					$image->produto_id = $model->id;
        					$image->path = $key;

        					if(!$image->save()){
            					throw new Exception("Erro ao salvar imagem de produto.", 500);
        					}
            			}
            			$this->redirect(['/produto/index','id' => $model->id]);
            		} else {
            			throw new Exception("Erro ao salvar produto.", 500);
            		}
            	} catch(Exception $e) {
				    throw $e;
            	}
            } else {
            	print_r($model->getErrors());
            }
        }

		return $this->render('insert',[
			'model' => $model,
		]);
	}

	private function uploadAWS($key,$path,$type='image/jpeg')
	{

		$s3 = new \Aws\S3\S3Client([
		    'version' => 'latest',
		    'region'  => Yii::$app->params['amazon']['region'],
		    'credentials' => Yii::$app->params['amazon']['credentials']
		]);

		$result = $s3->putObject(array(
			'ACL'		   => 'public-read',
		    'Bucket'       => Yii::$app->params['amazon']['bucketId'],
    		'ContentType'  => $type,
		    'Key'          => $key,
		    'SourceFile'   => $path,
	    ));

	}

}

