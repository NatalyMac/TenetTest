<?php

namespace app\controllers;

use Yii;
use app\models\Street;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * UserController implements the CRUD actions for User model.
 */
class StreetController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
   /* public function actionLists($id)
    {
        $countStreets =  Street::find()
            ->where(['city_id' => $id])
            ->count();
        $streets =  Street::find()
            ->where(['city_id' => $id])
            ->all();
        if ($countStreets > 0){
            foreach($streets as $street){
                echo "<option value='".$street->id."'>".$street->name."</option>";
            }
        }
        else {
            echo "<option></option>";
        }
    }

    public function actionListsPurge()
    {
            echo "<option></option>";
    }

*/
    public function actionLists() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $city_id = $parents[0];
                $streets =  Street::find()
                    ->where(['city_id' => $city_id])
                    ->asArray()
                    ->all();
                
                echo Json::encode(['output'=>$streets, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }




}