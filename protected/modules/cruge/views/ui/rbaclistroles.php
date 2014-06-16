<?php
$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>


<div class="col-lg-12">
    <div class="widget">
        <div class="widget-header">
            <h4>
                <a class="icon-chevron-down" data-toggle="collapse" href=".widget-content"></a>
                <i class="icon-key"></i> <?php echo ucwords(CrugeTranslator::t("roles")); ?>
            </h4>

        </div>
        <div class="widget-content in">
            <div class="row-fluid">
                <div class='col-lg-12'>
                    <?php
                    echo CHtml::link('<i class="icon-plus icon-white"></i> ' . CrugeTranslator::t("Crear Nuevo Rol")
                            , Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE), array('class' => 'btn btn-success pull-right'));
                    ?>
                </div>
            </div>

            <?php $this->renderPartial('_listauthitems', array('dataProvider' => $dataProvider), false); ?>
        </div>
    </div>
</div>