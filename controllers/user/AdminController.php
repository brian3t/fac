<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers\user;

use dektrium\user\controllers\AdminController as BaseAdminController;
use dektrium\user\models\Profile;
use dektrium\user\models\User;
use dektrium\user\Module;
use Yii;
use yii\base\ExitException;
use yii\base\Model;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * AdminController allows you to administrate users.
 *
 * @property Module $module
 *
 */
class AdminController extends BaseAdminController
{
    
    /**
     * Updates an existing profile.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdateProfile($id)
    {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $profile = $user->profile;
        $event = $this->getProfileEvent($profile);
        
        if ($profile == null) {
            $profile = Yii::createObject(Profile::className());
            $profile->link('user', $user);
        }
        
        $this->performAjaxValidation($profile);
        
        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);
        
        if ($profile->load(Yii::$app->request->post())) {
            $profile->avatarFile = UploadedFile::getInstance($profile, 'avatarFile');
            $avatarFolder = \Yii::$app->getBasePath() . "/api/img/avatar/" . \Yii::$app->user->id;
            if ($profile->avatarFile) {
                if (is_dir($avatarFolder)) {
                    BaseFileHelper::removeDirectory($avatarFolder);
                }
                mkdir($avatarFolder, 0775);
                
                $profile->avatarFile->saveAs($avatarFolder . '/' . $profile->avatarFile->baseName . '.' . $profile->avatarFile->extension);
                $profile->avatar = $profile->avatarFile->baseName . '.' . $profile->avatarFile->extension;
            }
            if ($profile->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Profile details have been updated'));
                $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
                return $this->refresh();
            }
        }
        
        return $this->render('_profile', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
    
    /**
     * Shows information about user.
     *
     * @param int $id
     *
     * @return string
     */
    public
    function actionInfo(
        $id
    ) {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        
        return $this->render('_info', [
            'user' => $user,
        ]);
    }
    
    /**
     * If "dektrium/yii2-rbac" extension is installed, this page displays form
     * where user can assign multiple auth items to user.
     *
     * @param int $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public
    function actionAssignments(
        $id
    ) {
        if (!isset(Yii::$app->extensions['dektrium/yii2-rbac'])) {
            throw new NotFoundHttpException();
        }
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        
        return $this->render('_assignments', [
            'user' => $user,
        ]);
    }
    
    /**
     * Confirms the User.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function actionConfirm(
        $id
    ) {
        $model = $this->findModel($id);
        $event = $this->getUserEvent($model);
        
        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);
        $model->confirm();
        $this->trigger(self::EVENT_AFTER_CONFIRM, $event);
        
        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been confirmed'));
        
        return $this->redirect(Url::previous('actions-redirect'));
    }
    
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public
    function actionDelete(
        $id
    ) {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not remove your own account'));
        } else {
            $model = $this->findModel($id);
            $event = $this->getUserEvent($model);
            $this->trigger(self::EVENT_BEFORE_DELETE, $event);
            $model->delete();
            $this->trigger(self::EVENT_AFTER_DELETE, $event);
            Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been deleted'));
        }
        
        return $this->redirect(['index']);
    }
    
    /**
     * Blocks the user.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function actionBlock(
        $id
    ) {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not block your own account'));
        } else {
            $user = $this->findModel($id);
            $event = $this->getUserEvent($user);
            if ($user->getIsBlocked()) {
                $this->trigger(self::EVENT_BEFORE_UNBLOCK, $event);
                $user->unblock();
                $this->trigger(self::EVENT_AFTER_UNBLOCK, $event);
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been unblocked'));
            } else {
                $this->trigger(self::EVENT_BEFORE_BLOCK, $event);
                $user->block();
                $this->trigger(self::EVENT_AFTER_BLOCK, $event);
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been blocked'));
            }
        }
        
        return $this->redirect(Url::previous('actions-redirect'));
    }
    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel(
        $id
    ) {
        $user = $this->finder->findUserById($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }
        
        return $user;
    }
    
    /**
     * Performs AJAX validation.
     *
     * @param array|Model $model
     *
     * @throws ExitException
     */
    protected
    function performAjaxValidation(
        $model
    ) {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode(ActiveForm::validate($model));
                Yii::$app->end();
            }
        }
    }
}
