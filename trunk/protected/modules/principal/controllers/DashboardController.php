<?php

class DashboardController extends Controller {

    public function filters() {
        return array(
            array('CrugeAccessControlFilter -error'),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
//        var_dump('hola');
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
//         var_dump('hola');
//         die();
//        
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->user->ui->loginUrl);
        }
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                if ($error['code'] == 404) {
                    $this->layout = '//layouts/error';
                    $this->render('404', $error);
                } else if ($error['code'] == 401) {
                    $this->layout = '//layouts/error';
                    $this->render('401', $error);
                } else {
                    $this->render('error', $error);
                }
            }
        }
    }

    public function actionVacio() {
        $this->render('empty');
    }

}
