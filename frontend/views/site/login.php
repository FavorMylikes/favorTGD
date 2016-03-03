<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登陆';
?>
<div class="site-login">
    <div class="col-lg-12" style="vertical-align: middle;text-align:center;margin:auto auto">
        <h1 class="text-primary"><?= Html::encode($this->title) ?></h1>
        <h4>与世界分享你的毕设、课设和工设</h4>
        <?php echo $this->render('_enter_login', ['model' => $model]); ?>
    </div>
</div>