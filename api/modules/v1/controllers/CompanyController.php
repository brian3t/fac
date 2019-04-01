<?php
/**
 * Created by IntelliJ IDEA.
 * User: tri
 * Date: 8/10/16
 * Time: 10:35 AM
 */

namespace app\api\modules\v1\controllers;

use app\api\base\controllers\BaseActiveController;

class CompanyController extends BaseActiveController
{
    public $modelClass = 'app\models\Company';
    
    
    // public function actionLogin()
    // {
    //     // Yii::$container
    //     $response = ['status' => 'failed'];
    //     $module = Yii::$app->getModule('user');
    //     if ($module == null) {
    //         $response['message'] = 'Module user not loaded';
    //         return $response;
    //     }
    //     $settingsController = $module->createController('settings/profile');
    //     if (!$settingsController || count($settingsController) != 2) {
    //         $response['message'] = 'Settings controller not found';
    //     }
    //     $settingsController = $settingsController[0];
    //     /** @var SettingsController $settingsController */
    //
    //     /** @var LoginForm $model */
    //     $model = Yii::createObject(LoginForm::className());
    //     $search_model = Yii::createObject(UserSearch::className());
    //     /** @var UserSearch $search_model */
    //
    //     if ($model->load(Yii::$app->getRequest()->post())) {
    //         $finder = $settingsController->getFinder();
    //         /** @var Finder $finder */
    //         $user_found = $finder->findUserByEmail($model->login);
    //         if (is_null($user_found)) {
    //             $response['message'] = 'Username does not exist';
    //             return $response;
    //         }
    //         if ($model->login()) {
    //             $cuser = Yii::$app->user->identity;
    //             $profile = $settingsController->actionApiProfile();
    //             $response['status']='ok';
    //             $response['profile'] = $profile;
    //         } else {
    //             $response['message'] = 'Wrong password';
    //         }
    //     }
    //     return $response;
    //
    // }
}