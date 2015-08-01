<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace kingzeus\pages;

use yii\helpers\Html;
use yii\bootstrap\Widget;
use yii\widgets\ActiveForm;

/**
 *
 * @author Yefei Fan <fyfcnc@hotmail.com>
 */
class Login extends Widget
{

    /**
     * @var String logo
     */
    public $logo;
    
    public $title='Login';
    

    private $cssClassPage='login-box';
    private $cssClassLogo='login-logo';
    private $cssClassBody='login-box-body';
    private $cssClassTitle='login-box-msg';
    

    
    public $form=[];
    
    
    private $mForm;


    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();

        if (!isset($this->form['id'])) {
            $this->form['id'] = $this->getId();
        }
        if (!isset($this->form['input'])) {
            $this->form['input'] = [];
        }
        
        
        // page
        echo Html::beginTag('div',['class'=>$this->cssClassPage]);
        // logo
        echo Html::tag('div',$this->logo,['class'=>$this->cssClassLogo]);
        // body
        echo Html::beginTag('div',['class'=>$this->cssClassBody]);
        // title
        echo Html::tag('p',$this->title,['class'=>$this->cssClassTitle]);
        // form
        $this->mForm = ActiveForm::begin([
            'id'                     => $this->form['id'],
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
            'validateOnBlur'         => false,
            'validateOnType'         => false,
            'validateOnChange'       => false,
        ]);
        
        
        
    }
    
    public function run()
    {
                ActiveForm::end();      
       
            echo Html::endTag('div');
        echo Html::endTag('div');

    }
    
    /**
     * 输出模型的属性
     * @param unknown $type    输入框类型
     * @param unknown $model    模型
     * @param unknown $attribute 属性
     * @param array $Options  选项
     *              inputOptions  输入框选项
     *                   placeholder   占位文字(默认是属性的名称)
     *              glyphicon     图标       
     */
    public function echoField($type,$model,$attribute,$Options)
    {
        
        if (!isset($Options['inputOptions'])) {
            $Options['inputOptions'] = ['class'=>'form-control'];
        }else{
            $Options['inputOptions']['class']='form-control';
        }
        if (!isset($Options['inputOptions']['placeholder'])) {
            $Options['inputOptions']['placeholder'] = Html::encode($model->getAttributeLabel($attribute));
        }
        
        echo Html::beginTag('div',['class'=>'form-group has-feedback']);
                        
            echo Html::activeInput($type,$model, $attribute, $Options['inputOptions']);
            if (isset($Options['glyphicon'])) {
                echo Html::tag('span','',['class'=>'glyphicon '.$Options['glyphicon'].' form-control-feedback']);
            }
        
        
        echo Html::endTag('div');
    }
    
    
    
}
