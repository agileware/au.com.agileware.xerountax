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
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function xerountax_civicrm_install() {
  _xerountax_civix_civicrm_install();
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
 * Implements hook_civicrm_accountPushAlterMapped().
 */
function xerountax_civicrm_accountPushAlterMapped($entity, &$data, &$save, &$params) {
  // Only need to alter invoices
  if ($entity == 'invoice') {
    $params['LineAmountTypes'] = 'Inclusive';
    // Loop through line items, adding tax to amount where applicable
    $i = 0;
    foreach($data['line_items'] as &$line_item) {
      if(!empty($line_item['tax_amount']) && !empty($line_item['qty'])) {
        $incl_amount = ($line_item['line_total'] + $line_item['tax_amount']) / $line_item['qty'];
        $params['LineItems']['LineItem'][$i]['UnitAmount'] = round($incl_amount, 2);
      }
      $i++;
    }
  }
}
