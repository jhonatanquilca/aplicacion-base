<?php

class Menu {

    private static $_controller;

    public static function getMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-dashboard"></i> Dashboard', 'url' => Yii::app()->homeUrl),
//            array('label' => '<li> <a href="'.Yii::app()->homeUrl.'"> <i class="icon-dashboard"></i> Dashboard </a> </li>'),
            array('label' => '<i class="icon-desktop"></i> Cuentas', 'url' => array('/tmp/ejemplo/admin'), 'access' => 'action_cuenta_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'cuenta')),
//            array('label' => '<a href="#"><i class="icon-edit"></i> Cuentas</a>', 'url' => array('/tmp/ejemplo/admin'), 'access' => 'action_cuenta_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'cuenta')),
//            array('label' => '<i class="icon-group"></i> Contactos', 'url' => array('/crm/contacto/admin'), 'access' => 'action_contacto_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'contacto')),
////            array('label' => '<i class="icon-rocket"></i> Campañas', 'url' => array('/campanias/default/index'), 'active_rules' => array('module' => 'campanias')),
//            array('label' => '<i class="icon-tags"></i> Oportunidades', 'url' => array('/oportunidades/oportunidad/admin'), 'access' => 'action_oportunidad_admin', 'active_rules' => array('module' => 'oportunidades')),
//            array('label' => '<i class="icon-money"></i> Cobranzas', 'url' => array('/cobranzas/cobranza/admin'), 'access' => 'action_cobranza_admin', 'active_rules' => array('module' => 'cobranzas')),
//            array('label' => '<i class="icon-fire-extinguisher"></i>Incidencias', 'url' => array('/incidencias/incidencia/admin'), 'access' => 'action_incidencia_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidencia')),
//            array('label' => '<i class="icon-tasks"></i> Tareas', 'url' => array('/tareas/tarea/admin'), 'access' => 'action_tarea_admin', 'active_rules' => array('module' => 'tareas')),
//            array('label' => '<i class="icon-calendar"></i> Calendario', 'url' => array('/eventos/calendario/index'), 'access' => 'action_calendario_index', 'active_rules' => array('module' => 'eventos')),
//            array('label' => '<i class="icon-book"></i>  Reportes', 'url' => '#', 'items' => array(
//                array('label' => 'Llamadas', 'url' => array('/llamadas/llamadaReporte'), 'access' => 'action_llamadaReporte_admin', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamadaReporte')),
//                array('label' => 'Sms', 'url' => array('/sms/reports/reporteSms'), 'access' => 'action_reporteSms_admin', 'active_rules' => array('module' => 'sms', 'controller' => 'reports/reporteSms')),
//                array('label' => 'Mail', 'url' => array('/mail/mailReporte'), 'access' => 'action_mailReporte_index', 'active_rules' => array('module' => 'mail', 'controller' => 'reports/mailReporte')),
//            )),
);

        return self::generateMenu($items);
    }

    public static function getAdminMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-mail-reply"></i>  Regresar a la App', 'url' => Yii::app()->homeUrl),
            array('label' => '<i class="icon-user"></i>  Usuarios', 'url' => Yii::app()->user->ui->userManagementAdminUrl, 'access' => 'Cruge.ui.*', 'active_rules' => array('module' => 'cruge')),
            array('label' => '<i class="icon-upload-alt"></i>  Importar Archivo CSV', 'url' => array('/importcsv/'), 'access' => 'importar_archivo_csv', 'active_rules' => array('module' => 'importcsv')),
            array('label' => '<i class="icon-archive"></i> Grupos', 'url' => array('/crm/grupo/admin'), 'access' => 'action_grupo_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'grupo')),
            array('label' => '<i class="icon-book"></i>  Catálogos', 'url' => '#', 'items' => array(
                    array('label' => 'Industrias', 'url' => array('/crm/industria/admin'), 'access' => 'action_industria_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'industria')),
                    array('label' => 'Etapas de Oportunidad', 'url' => array('/oportunidades/oportunidadEtapa/admin'), 'access' => 'action_oportunidadEtapa_admin', 'active_rules' => array('module' => 'oportunidades', 'controller' => 'oportunidadEtapa')),
                    array('label' => 'Etapas de Cobranza', 'url' => array('/cobranzas/cobranzaEtapa/admin'), 'access' => 'action_cobranzaEtapa_admin', 'active_rules' => array('module' => 'cobranzas', 'controller' => 'cobranzaEtapa')),
                    array('label' => 'Etapas de Tarea', 'url' => array('/tareas/tareaEtapa/admin'), 'access' => 'action_tareaEtapa_admin', 'active_rules' => array('module' => 'tareas', 'controller' => 'tareaEtapa')),
                )),
            array('label' => '<i class="icon-comments"></i>  Sms', 'url' => '#', 'items' => array(
                    array('label' => 'Motivos', 'url' => array('/sms/smsMotivo/admin'), 'access' => 'action_smsMotivo_admin', 'active_rules' => array('module' => 'sms', 'controller' => 'smsMotivo')),
                    array('label' => 'Plantillas', 'url' => array('/sms/smsPlantilla/admin'), 'access' => 'action_smsPlantilla_admin', 'active_rules' => array('module' => 'sms', 'controller' => 'smsPlantilla')),
                )),
            array('label' => '<i class="icon-envelope"></i>  Mail', 'url' => '#', 'items' => array(
                    array('label' => 'Asunto', 'url' => array('/mail/mailAsunto/admin'), 'access' => 'action_mailAsunto_admin', 'active_rules' => array('module' => 'mail', 'controller' => 'mailAsunto')),
                    array('label' => 'Plantillas', 'url' => array('/mail/mailPlantilla/admin'), 'access' => 'action_mailPlantilla_admin', 'active_rules' => array('module' => 'mail', 'controller' => 'mailPlantilla')),
                )),
            array('label' => '<i class="icon-fire-extinguisher"></i>  Incidencias', 'url' => '#', 'items' => array(
                    array('label' => 'Categoria', 'url' => array('/incidencias/incidenciaCategoria/admin'), 'access' => 'action_incidenciaCategoria_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaCategoria')),
                    array('label' => 'Motivo', 'url' => array('/incidencias/incidenciaMotivo/admin'), 'access' => 'action_incidenciaMotivo_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaMotivo')),
                    array('label' => 'Sub Motivo', 'url' => array('/incidencias/incidenciaSubmotivo/admin'), 'access' => 'action_incidenciaSubmotivo_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaSubmotivo')),
                    array('label' => 'Via ingreso', 'url' => array('/incidencias/incidenciaViaIngreso/admin'), 'access' => 'action_incidenciaViaIngreso_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaViaIngreso')),
                    array('label' => 'Estado', 'url' => array('/incidencias/incidenciaEstado/admin'), 'access' => 'action_incidenciaEstado_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaEstado')),
                    array('label' => 'Prioridad', 'url' => array('/incidencias/incidenciaPrioridad/admin'), 'access' => 'action_incidenciaPrioridad_admin', 'active_rules' => array('module' => 'incidencias', 'controller' => 'incidenciaPrioridad')),
                )),
            array('label' => '<i class="icon-calendar"></i>  Eventos', 'url' => '#', 'items' => array(
                    array('label' => 'Prioridad', 'url' => array('/eventos/eventoPrioridad/admin'), 'access' => 'action_eventoPrioridad_admin', 'active_rules' => array('module' => 'eventos', 'controller' => 'eventoPrioridad')),
                )),
            array('label' => '<i class="icon-phone"></i>  Llamadas', 'url' => '#', 'items' => array(
                    array('label' => 'Motivos', 'url' => array('/llamadas/llamadaMotivo/admin'), 'access' => 'action_llamadaMotivo_admin', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamadaMotivo')),
                    array('label' => 'Submotivos', 'url' => array('/llamadas/llamadaSubmotivo/admin'), 'access' => 'action_llamadaSubmotivo_admin', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamadaSubmotivo')),
                    array('label' => 'Subestados', 'url' => array('/llamadas/llamadaSubestado/admin'), 'access' => 'action_llamadaSubestado_admin', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamadaSubestado')),
                )),
            array('label' => '<i class="icon-folder-open"></i>  Historiales', 'url' => '#', 'items' => array(
                    array('label' => 'Llamadas Entrantes', 'url' => array('/llamadas/llamada/historialEntrantes'), 'access' => 'action_llamada_historialEntrantes', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamada', 'action' => 'historialEntrantes')),
                    array('label' => 'Llamadas Salientes', 'url' => array('/llamadas/llamada/historialSalientes'), 'access' => 'action_llamada_historialSalientes', 'active_rules' => array('module' => 'llamadas', 'controller' => 'llamada', 'action' => 'historialSalientes')),
                    array('label' => 'Sms', 'url' => array('/sms/sms/historial'), 'access' => 'action_sms_historial', 'active_rules' => array('module' => 'sms', 'controller' => 'sms')),
                    array('label' => 'Emails', 'url' => array('/mail/mail/historial'), 'access' => 'action_mail_historial', 'active_rules' => array('module' => 'mail', 'controller' => 'mail')),
                )),
            array('label' => '<i class="icon-time"></i>  Actividades', 'url' => array('/actividades/actividad/admin'), 'access' => 'action_actividad_admin', 'active_rules' => array('module' => 'actividades')),
            array('label' => '<i class="icon-trophy"></i>  Gamification', 'url' => array('/gamification/gamesLogro/admin'), 'access' => 'action_gamesLogro_admin', 'active_rules' => array('module' => 'gamification')),
        );

        return self::generateMenu($items);
    }

    /**
     * Function to create a menu with acces rules and active item
     * @param array $items items to build the menu
     * @return array the formated menu
     */
    private static function generateMenu($items) {
        $menu = array();

        foreach ($items as $k => $item) {
            $access = false;
            $menu_item = $item;

            // Check children access
            if (isset($item['items'])) {
                $menu_item['items'] = array();
                // Check childrens access
                foreach ($item['items'] as $j => $children) {
                    if ($access = Yii::app()->user->checkAccess($children['access'])) {
                        $menu_item['items'][$j] = $children;
                        if (isset($children['active_rules']) && self::getActive($children['active_rules'])) {
                            $menu_item['items'][$j]['active'] = true;
                            $menu_item['active'] = true;
                        }
                    }
                }
            } else {
                // Check item access
                if (isset($item['access'])) {
                    $access = Yii::app()->user->checkAccess($item['access']);
                } else {
                    $access = true;
                }
                // Check active
                if (isset($item['active_rules'])) {
                    $menu_item['active'] = self::getActive($item['active_rules']);
                }
            }

            // If acces to the item or any child add to the menu
            if ($access) {
                $menu[] = $menu_item;
            }
        }

        return $menu;
    }

    /**
     * Function to compare the menu active rules with the current url
     * @param array $active_rules the array of rules to compare
     * @return boolean true if the rules match the current url
     */
    private static function getActive($active_rules) {
        $current = false;

        if (self::$_controller) {
            if (is_array(current($active_rules))) {
                foreach ($active_rules as $rule) {
                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';

                    if (isset($rule['module']) && self::$_controller->module) {
                        if ($operator == "==")
                            $current = self::$_controller->module->id == $rule['module'];
                        if ($operator == "!=")
                            $current = self::$_controller->module->id != $rule['module'];
                    }
                    if (isset($rule['controller'])) {
                        if ($operator == "==")
                            $current = self::$_controller->id == $rule['controller'];
                        if ($operator == "!=")
                            $current = self::$_controller->id != $rule['controller'];
                    }
                    if (isset($rule['action'])) {
                        if ($operator == "==")
                            $current = self::$_controller->action->id == $rule['action'];
                        if ($operator == "!=")
                            $current = self::$_controller->action->id != $rule['action'];
                    }

                    if (!$current)
                        break;
                }
            } else {
                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';

                if (isset($active_rules['module']) && self::$_controller->module) {
                    if ($operator == "==")
                        $current = self::$_controller->module->id == $active_rules['module'];
                    if ($operator == "!=")
                        $current = self::$_controller->module->id != $active_rules['module'];
                }
                if (isset($active_rules['controller'])) {
                    if ($operator == "==")
                        $current = self::$_controller->id == $active_rules['controller'];
                    if ($operator == "!=")
                        $current = self::$_controller->id != $active_rules['controller'];
                }
                if (isset($active_rules['action'])) {
                    if ($operator == "==")
                        $current = self::$_controller->action->id == $active_rules['action'];
                    if ($operator == "!=")
                        $current = self::$_controller->action->id != $active_rules['action'];
                }
            }
        }
        return $current;
    }

}
