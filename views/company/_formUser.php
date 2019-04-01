<div class="form-group" id="add-user">
    <?php

    use kartik\builder\TabularForm;
    use kartik\grid\GridView;
    use yii\data\ArrayDataProvider;
    use yii\helpers\Html;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $row,
        'pagination' => [
            'pageSize' => -1
        ]
    ]);
    echo TabularForm::widget([
        'dataProvider' => $dataProvider,
        'formName' => 'User',
        'checkboxColumn' => false,
        'actionColumn' => false,
        'attributeDefaults' => [
            'type' => TabularForm::INPUT_TEXT,
        ],
        'attributes' => [
            "id" => ['type' => TabularForm::INPUT_HIDDEN,'visible' => false],
            'username' => ['type' => TabularForm::INPUT_TEXT],
            'email' => ['type' => TabularForm::INPUT_TEXT],
            'auth_key' => ['type' => TabularForm::INPUT_TEXT],
            'confirmed_at' => ['type' => TabularForm::INPUT_TEXT],
            'unconfirmed_email' => ['type' => TabularForm::INPUT_TEXT],
            'first_name' => ['type' => TabularForm::INPUT_TEXT],
            'last_name' => ['type' => TabularForm::INPUT_TEXT],
            'job_title' => ['type' => TabularForm::INPUT_TEXT],
            'line_of_business' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                'items' => ['Management' => 'Management','Agency' => 'Agency','Promotion' => 'Promotion','Venue' => 'Venue','Network' => 'Network','Studio' => 'Studio','Public Relations' => 'Public Relations','Consulting' => 'Consulting','Talent' => 'Talent','Client' => 'Client','Production Company' => 'Production Company','Photography' => 'Photography','Editing' => 'Editing','Business Management' => 'Business Management','Tour Management' => 'Tour Management','Personal' => 'Personal','Other' => 'Other',],
                'options' => [
                    'columnOptions' => ['width' => '185px'],
                    'options' => ['placeholder' => 'Choose Line Of Business'],
                ]
            ],
            'union_memberships' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                'items' => ['SAG-AFTRA' => 'SAG-AFTRA','WGAW' => 'WGAW','Directors Guild of America' => 'Directors Guild of America','ATA' => 'ATA','Producers Guild of America' => 'Producers Guild of America','AMPTP' => 'AMPTP','ASCAP' => 'ASCAP','I.A.T.S.E.' => 'I.A.T.S.E.','International Cinematographers Guild' => 'International Cinematographers Guild','Teamsters Union 399' => 'Teamsters Union 399','MPEG' => 'MPEG','Annimation Guild' => 'Annimation Guild','Motion Picture Sound Editors' => 'Motion Picture Sound Editors','Other' => 'Other',],
                'options' => [
                    'columnOptions' => ['width' => '185px'],
                    'options' => ['placeholder' => 'Choose Union Memberships'],
                ]
            ],
            'note' => ['type' => TabularForm::INPUT_TEXT],
            'phone_number_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                'items' => ['Home' => 'Home','Business' => 'Business','Cell' => 'Cell','Fax' => 'Fax','Other' => 'Other','' => '',],
                'options' => [
                    'columnOptions' => ['width' => '185px'],
                    'options' => ['placeholder' => 'Choose Phone Number Type'],
                ]
            ],
            'phone_number' => ['type' => TabularForm::INPUT_TEXT],
            'birthdate' => ['type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\datecontrol\DateControl::classname(),
                'options' => [
                    'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                    'saveFormat' => 'php:Y-m-d',
                    'ajaxConversion' => true,
                    'options' => [
                        'pluginOptions' => [
                            'placeholder' => 'Choose Birthdate',
                            'autoclose' => true
                        ]
                    ],
                ]
            ],
            'website_url' => ['type' => TabularForm::INPUT_TEXT],
            'twitter_id' => ['type' => TabularForm::INPUT_TEXT],
            'facebook_id' => ['type' => TabularForm::INPUT_TEXT],
            'instagram_id' => ['type' => TabularForm::INPUT_TEXT],
            'google_id' => ['type' => TabularForm::INPUT_TEXT],
            'yahoo_id' => ['type' => TabularForm::INPUT_TEXT],
            'linkedin_id' => ['type' => TabularForm::INPUT_TEXT],
            'work_phone' => ['type' => TabularForm::INPUT_TEXT],
            'mobile_phone' => ['type' => TabularForm::INPUT_TEXT],
            'home_phone' => ['type' => TabularForm::INPUT_TEXT],
            'address1' => ['type' => TabularForm::INPUT_TEXT],
            'address2' => ['type' => TabularForm::INPUT_TEXT],
            'city' => ['type' => TabularForm::INPUT_TEXT],
            'state' => ['type' => TabularForm::INPUT_TEXT],
            'zipcode' => ['type' => TabularForm::INPUT_TEXT],
            'country' => ['type' => TabularForm::INPUT_TEXT],
            'del' => [
                'type' => 'raw',
                'label' => '',
                'value' => function ($model,$key)
                {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>','#',['title' => 'Delete','onClick' => 'delRowUser(' . $key . '); return false;','id' => 'user-del-btn']);
                },
            ],
        ],
        'gridSettings' => [
            'panel' => [
                'heading' => false,
                'type' => GridView::TYPE_DEFAULT,
                'before' => false,
                'footer' => false,
                'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add User',['type' => 'button','class' => 'btn btn-success kv-batch-create','onClick' => 'addRowUser()']),
            ]
        ]
    ]);
    echo "    </div>\n\n";
    ?>

