<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\widgets;
use yii\helpers\Html;
/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->session->setFlash('error', 'This is the message');
 * \Yii::$app->session->setFlash('success', 'This is the message');
 * \Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Alert extends \yii\bootstrap\Alert
{
//    'closeButton' => $this->closeButton,
//    'options' => $this->alertOptions,
//    'delay'=>$this->delay,
//    'type'=>$type,
//    'order'=>$order,

    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    protected $alertTypes = [
        'error'   => 'alert-danger',
        'danger'  => 'alert-danger',
        'success' => 'alert-success',
        'info'    => 'alert-info',
        'warning' => 'alert-warning'
    ];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

    /**
     * @var integer the delay in microseconds after which the alert will be displayed.
     * Will be useful when multiple alerts are to be shown.
     */
    public $delay=1000;
    /**
     * @var string default alert class
     */
    public $type='info';
    /**
     * @var int default otder of alert flash
     */
    public $order=1;
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        $this->registerAssets();
    }

    /**
     * Initializes the widget options.
     * This method sets the default values for various options.
     */
    protected function initOptions()
    {
        parent::initOptions();
        Html::addCssClass($this->options, ' '. $this->alertTypes[$this->type]);
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        if ($this->delay > 0) {
            $js = 'jQuery("#li-alert' . $this->order . '").delay(' . $this->delay*$this->order .').fadeTo(400, 0.00, function() {
				$(this).slideUp("slow", function() {
					$(this).remove();
				});
			});';
            $view->registerJs($js);
        }
    }
}
