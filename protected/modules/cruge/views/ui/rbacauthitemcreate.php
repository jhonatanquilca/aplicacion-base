<?php
/* $model:  es una instancia que implementa a CrugeAuthItemEditor */

$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>
<div class="col-lg-12">
    <div class="widget">
        <div class="widget-header">
            <h4>
                 <a class="icon-chevron-down" data-toggle="collapse" href=".widget-content"></a>
                <i class="icon-key"></i> <?php echo ucwords(CrugeTranslator::t("Creando") . " " . CrugeTranslator::t($model->categoria)); ?>
            </h4>
            
        </div>
        <div class="widget-content in">
            <?php $this->renderPartial('_authitemform', array('model' => $model), false); ?>
        </div>
    </div>
</div>