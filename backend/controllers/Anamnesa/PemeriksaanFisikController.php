<?php

namespace backend\controllers\Anamnesa;

use Yii;
use backend\models\PemeriksaanFisik;
use backend\models\Registrasi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;
use yii\web\Response;

class PemeriksaanFisikController extends Controller{

   //  public $layout = 'anamnesa';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
 public function actionUpdate($id){

     $modelRegistrasi = $this->findRegistrasi($id);
     $model = $this->findModel($modelRegistrasi->id);
     //  Yii::$app->response->format = Response::FORMAT_JSON; 
     $registrasi = $this->findPasien($id);
     // $model = $this->findModel($id);
      
    //  $registrasi = Registrasi::findOne($model->registrasi_id);
        

     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->render('create', [
                'model' => $model,
                'pasien' =>  $registrasi->pasien,
                'registrasi' => $registrasi,
            ]);
        //}
     
 }
 
 public function actionExit($id) {
     $modelRegistrasi = $this->findPasien($id);
     $modelRegistrasi->status_registrasi = 'Pemeriksaan';
     $modelRegistrasi->save();
     
     return $this->redirect(['/registrasi/index']);        
 }

  public function actionSaveStatusterkini($id){
     $model = $this->findModel($id);
    
       $return =0;
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
     
 }
 
  public function actionSaveTinggibadan($id){
     $model = $this->findModel($id);
       $return =0;
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
     
 }
 
  public function actionPopupGcs($id){
     $model = $this->findModel($id);
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_popupGcs', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
   public function actionPopupTinggibadan($id){
     $model = $this->findModel($id);
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_popupTinggibadan', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
 public function actionTandaVital(){
     
     $model = $this->findModel( Yii::$app->getRequest()->getQueryParam('id'));
       Yii::$app->response->format = Response::FORMAT_JSON;
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_tandaVital', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
    public function actionPopupNadi($id){
         $model = $this->findModel($id);
    
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_popupNadi', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
  public function actionPopupPernapasan($id){
      $model = $this->findModel($id);
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_popupPernapasan', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
  
  public function actionPopupSuhu($id){
     $model = $this->findModel($id);
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_popupSuhu', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
 public function actionEvaluasi(){
      $model = $this->findModel( Yii::$app->getRequest()->getQueryParam('id'));
       Yii::$app->response->format = Response::FORMAT_JSON;
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->renderAjax('_evaluasi', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
 
  public function actionPopupKulit($id){
       $model = $this->findModel($id);
       
            return $this->renderAjax('_popupKulit', [
                'model' => $model,
               
                
            ]);
        
 }
 
   public function actionPopupKepala($id){
      $model = $this->findModel($id);
       
            return $this->renderAjax('_popupKepala', [
                'model' => $model,
               
                
            ]);
        
 }
 
    public function actionPopupMata($id){
     $model = $this->findModel($id);
       
            return $this->renderAjax('_popupMata', [
                'model' => $model,
               
                
            ]);
        
 }
 
 public function actionPopupTelinga($id){
       $model = $this->findModel($id);
       
            return $this->renderAjax('_popupTelinga', [
                'model' => $model,
               
                
            ]);
        
 }
 
  public function actionPopupHidung($id){
       $model = $this->findModel($id);
       
            return $this->renderAjax('_popupHidung', [
                'model' => $model,
               
                
            ]);
        
 }
 
   public function actionPopupMulut($id){
       $model = $this->findModel($id);
       
            return $this->renderAjax('_popupMulut', [
                'model' => $model,
               
                
            ]);
        
 }
 
 
     protected function findModel($id)
    {
        if (($model = PemeriksaanFisik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
       protected function findRegistrasi($id)
    {
        if (($model = PemeriksaanFisik::findOne(['registrasi_id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     protected function findPasien($id)
    {
        if (($model = Registrasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}