<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'wrapper-black',
        ['content' => $content]
    );
} else {
    dmstr\web\AdminLteAsset::register($this);
    backend\assets\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower/admin-lte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <?php $this->beginBody() ?>
            
            <?= $this->render(
                    'header.php',
                    ['directoryAsset' => $directoryAsset]
                ) 
            ?>

            <?= $this->render(
                    'left.php',
                    ['directoryAsset' => $directoryAsset]
                )
            ?>

            <div class="content-wrapper" style="min-height: 858px;">

            <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                )
            ?>

            </div>

            <footer class="main-footer">
                <div class="container">
                    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                    <p class="pull-right"><?= Yii::powered() ?></p>
                </div>
            </footer>

            <?php $this->endBody() ?>
        </div>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
