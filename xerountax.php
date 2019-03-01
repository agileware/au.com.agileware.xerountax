<?php

require_once 'xerountax.civix.php';
use CRM_Xerountax_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function xerountax_civicrm_config(&$config) {
  _xerountax_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function xerountax_civicrm_xmlMenu(&$files) {
  _xerountax_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function xerountax_civicrm_install() {
  _xerountax_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function xerountax_civicrm_postInstall() {
  _xerountax_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function xerountax_civicrm_uninstall() {
  _xerountax_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function xerountax_civicrm_enable() {
  _xerountax_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function xerountax_civicrm_disable() {
  _xerountax_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function xerountax_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _xerountax_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function xerountax_civicrm_managed(&$entities) {
  _xerountax_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function xerountax_civicrm_caseTypes(&$caseTypes) {
  _xerountax_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function xerountax_civicrm_angularModules(&$angularModules) {
  _xerountax_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function xerountax_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _xerountax_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function xerountax_civicrm_entityTypes(&$entityTypes) {
  _xerountax_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_accountPushAlterMapped().
 */
function xerountax_civicrm_accountPushAlterMapped($entity, &$data, &$save, &$params) {
  // Only need to alter invoices
  if ($entity == 'invoice') {
    $params['LineAmountTypes'] = 'Inclusive';
    // Loop through line items, adding tax to amount where applicable
    $i = 0;
    foreach($data['line_items'] as &$line_item) {
      if(!empty($line_item['tax_amount'])) {
        $incl_amount = ($line_item['line_total'] + $line_item['tax_amount']) / $line_item['qty'];
        $params['LineItems']['LineItem'][$i]['UnitAmount'] = round($incl_amount, 2);
      }
      $i++;
    }
  }
}
