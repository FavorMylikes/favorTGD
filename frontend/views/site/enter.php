<?php
/**
 * @desc Created by FavorTGD.
 * @author : FavorMylikes<l786112323@gmail.com>
 * @since : 2016/3/1 15:45
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>
<div class="col-lg-12" style="vertical-align: middle;text-align:center;margin:auto auto">
    <h1 class="text-primary"><?= Html::encode('FavorTGD') ?></h1>
    <h4>与世界分享你的毕设、课设和工设</h4>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3" style="float: none">
            <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar-default navbar-container ',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                $menuItem[] = ['label' => '登陆', 'url' => '#login', 'options' => ['class' => 'navbar-item', 'style' => 'float:left;', 'onClick' => '$("#form-login").show();$("#form-signup").hide();']];
                $menuItem[] = ['label' => '注册', 'url' => '#signup', 'options' => ['class' => 'navbar-item', 'style' => 'float:right;', 'onClick' => '$("#form-signup").show();$("#form-login").hide();']];
            } else {

            }
            echo Nav::widget([
                'options' => ['class' => ' navbar-nav login-signup-nav'],
                'items' => $menuItem,
            ]);
            NavBar::end();
            ?>
        </div>

        <div class="col-lg-12" style="float: none;margin:0px auto">
            <?php
            echo $this->render('_enter_login', ['model' => $model_login]);
            echo $this->render('_enter_signup', ['model' => $model_signup]);
            ?>
        </div>
    </div>

</div>
