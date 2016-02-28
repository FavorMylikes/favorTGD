<?php
/**
 * @desc Created by FavorTGD.
 * @author : FavorMylikes<l786112323@gmail.com>
 * @since : 2016/2/29 1:50
 */

namespace common\widgets;
use yii\bootstrap\Widget;
use yii\helpers\Html;

class FlashMessages extends Widget
{
    /**
     * @var int set each Alert hidden time millsecond
     */
    public $delay=1000;
    /**
     * @var array set Alert options
     */
    public $alertOptions=[];
    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
//        echo '<ul class="flashes" style="list-style-type:none;padding-right: 21px;margin-right: 21px;overflow: hidden">';
        echo Html::beginTag('ul', $this->options) . "\n";
    }

    public function run()
    {
        parent::run();
        $session = \Yii::$app->session;
        $flashes = $session->getAllFlashes();
        foreach ($flashes as $type => $data) {
            $data = (array) $data;
            $order=1;
            foreach ($data as $i => $message) {
                /* initialize css class for each alert box */
                /* assign unique id to each alert box */
                echo Html::beginTag('li',['id'=>'li-alert'.$order]);
                echo Alert::widget([
                    'body' => $message,
                    'closeButton' => $this->closeButton,
                    'options' => $this->alertOptions,
                    'delay'=>$this->delay,
                    'type'=>$type,
                    'order'=>$order,
                ]);
                echo Html::endTag('li');
                $order++;
            }
            $session->removeFlash($type);
        }
        echo '</ul>';
    }

}