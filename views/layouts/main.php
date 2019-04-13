<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use kartik\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet"
          href="//<?= Yii::$app->request->serverName . "/" . Yii::$app->request->baseUrl ?>less/stylesheets/custom.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.png'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo '<span class="version">v0.6</span>';
    $items = [];
    $admin_items = [

    ];
    if (!Yii::$app->user->isGuest) {
        $items[] = [
            'label' => 'My Account',
            'items' => [
                ['label' => 'Profile', 'url' => '/user/settings/profile'],
                ['label' => 'Account', 'url' => '/user/settings/account'],
                // ['label' => 'Social Networks', 'url' => '/user/settings/networks'],
                ['label' => 'Log Out', 'url' => '/user/security/logout'],
            ],
        ];
        // '<li>'
        //     . Html::beginForm(['/site/logout'], 'post')
        //     . Html::submitButton(
        //         'Logout (' . Yii::$app->user->identity->username . ')',
        //         ['class' => 'btn btn-link']
        //     )
        //     . Html::endForm()
        //     . '</li>';
        if (Yii::$app->user->identity->getIsAdmin()) {
            $admin_items[] = '<li class="dropdown-header">Users</li>';
            $admin_items[] = ['label' => 'Admin', 'url' => '/user/admin/index'];
        }
    } else {
        $items[] = ['label' => 'Sign Up', 'url' => ['/user/registration/register']];
        $items[] = ['label' => 'Login', 'url' => ['/user/security/login']];

    }
    $items = array_merge($items, [
        [
            'label' => 'Admins',
            'items' => $admin_items,
        ],
        [
            'label' => 'Bands',
            'url' => '/band',
        ],
        [
            'label' => 'Venues',
            'url' => '/venue',
        ],
        [
            'label' => 'Events',
            'url' => '/event',
        ],
        ['label' => 'Raw User data', 'url' => '/user'],
        ['label' => 'Webapp', 'url' => 'https://app.livenout.usvsolutions.com', 'linkOptions' => ['target' => '_blank'],
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);
    ?>

    <?php
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="flash">
            <?php foreach (Yii::$app->session->allFlashes as $key => $message) {
                echo \kartik\widgets\Alert::widget([
                    'type' => Alert::TYPE_INFO,
                    'title' => ucwords($key),
                    'body' => is_array($message) ? implode('<br/>', $message) : $message,
                    'icon' => 'glyphicon glyphicon-info-sign',
                ]);
            }
            ?>
        </div>
        <script src="/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#tiny',
                skin: 'oxide',
                width: 600,
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
            });


        </script>
        <textarea id="tiny">Next, use our Get Started docs to setup Tiny!</textarea>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Web Factory <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
