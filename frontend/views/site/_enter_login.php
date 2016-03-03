<?php
/**
 * @desc Created by FavorTGD.
 * @author : FavorMylikes<l786112323@gmail.com>
 * @since : 2016/3/1 18:59
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<style type="text/css">
    #form-signup{
        display:none;
    }
</style>

<?php $form = ActiveForm::begin(['id' => 'form-login','layout' => 'horizontal']); ?>

<?= $form->field($model, 'email')->label(false)->textInput(['placeholder'=>$model->getAttributeLabel('email'),'autofocus' => true]) ?>

<?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder'=>$model->getAttributeLabel('password')]) ?>
<div>
    <?php
    $forgot=Html::a('密码忘了', ['site/request-password-reset'],[]);
    $forgot="<div style='color:#999;display: inline;float:right'>$forgot</div>"
    ?>
<?php echo $form->field($model, 'rememberMe',['labelOptions'=>['style'=>'display:inline;float:left'],'horizontalCheckboxTemplate'=> "{beginWrapper}\n<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}$forgot\n</div>\n{error}\n{endWrapper}\n{hint}"])->inline()->checkbox();?>
</div>
    <div class="form-group">
        <div class="row col-sm-6 col-sm-offset-3">
            <?= Html::submitButton('登陆', ['class' => 'btn btn-info', 'name' => 'login-button','style'=>"width:100%;"]) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
