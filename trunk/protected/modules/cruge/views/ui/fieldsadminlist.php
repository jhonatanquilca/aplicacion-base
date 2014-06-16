<?php
$this->pageTitle = Yii::t('app', 'Campos Personalizados');
?>
<div class="col-lg-12">
    <div class="widget">
        <div class="widget-header">
            <h4>
                <a class="icon-chevron-down" data-toggle="collapse" href=".widget-content"></a>
                <i class="icon-list"></i> <?php echo ucwords(CrugeTranslator::t("campos personalizados")); ?>
            </h4>
            
        </div>
        <div class="widget-content in">
            <?php
            $cols = array();
            // presenta los campos de ICrugeField
            foreach (Yii::app()->user->um->getSortFieldNamesForICrugeField() as $key => $fieldName) {
                $value = null;
                if ($fieldName == 'required')
                    $value = '$data->getRequiredName()';
                $cols[] = array('name' => $fieldName, 'value' => $value);
            }
            $cols[] = array(
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
                'deleteConfirmation' => CrugeTranslator::t("Esta seguro de eliminar este campo ?"),
                'buttons' => array(
                    'update' => array(
                        'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                        'options' => array('title' => CrugeTranslator::t("editar campo")),
                        'url' => 'array("fieldsadminupdate","id"=>$data->getPrimaryKey())',
                        'imageUrl' => false,
                    ),
                    'delete' => array(
                        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                        'options' => array('title' => CrugeTranslator::t("eliminar campo")),
                        'url' => 'array("fieldsadmindelete","id"=>$data->getPrimaryKey())',
                        'imageUrl' => false,
                    ),
                ),
                'htmlOptions' => array(
                    'width' => '80px'
                )
            );
            //$this->widget(Yii::app()->user->ui->CGridViewClass, array(
            //    'dataProvider'=>$dataProvider,
            //    'columns'=>$cols,
            //	'filter'=>$model,
            //));

            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'llamada-grid',
                'type' => 'striped condensed',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => $cols
            ));
            ?>
        </div>
    </div>
</div>