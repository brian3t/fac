<?php

namespace app\models\user;

use dektrium\user\models\Profile as BaseProfile;
use yii\web\UploadedFile;


/**
 * This is the model class for table "profile".
 *
 * @property string  $avatar
 *
 * @var UploadedFile avatarFile attribute
 */
class Profile extends BaseProfile {
    public $avatarFile;
    public function rules() {
        $rules                        = parent::rules();
        $rules['avatarLength']        = [ 'avatar','string','max' => 255 ];
        $rules['avatarFileSkipEmpty'] = [ 'avatarFile','file','skipOnEmpty' => true, ];

//		$rules['avatarFileImg'] = ['avatarFile','file','extensions' => 'gif, jpg, png',];
//		$rules['avatarFileIsImage'] = [['avatarFile'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'];
        return $rules;
    }

    public function attributeLabels() {
        $al = parent::attributeLabels();
        $al = array_merge( $al,[
        ] );

    }

}