# Xero Un-tax (au.com.agileware.xerountax)

This is a [CiviCRM](https://civicrm.org) extension that fixes rounding discrepancies
between CiviCRM and [Xero](https://www.xero.com) invoices created by the
[CiviXero](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero) extension.

CiviXero normally pushes invoice line items to Xero as tax-exclusive amounts, with the
tax calculated separately by Xero for each line item. Because CiviCRM and Xero can round
that per-line tax calculation slightly differently, the tax total recorded in Xero can end
up a few cents different from the tax total recorded in CiviCRM. This extension removes
that discrepancy by converting each line item to a tax-inclusive amount, calculated from
the exact line total and tax amount already recorded in CiviCRM, before it is sent to Xero.

The extension is licensed [AGPL-3.0](LICENSE.txt).

## Usage

There is no user interface, settings page, or configuration to manage day-to-day. Once
installed and enabled, the extension works automatically in the background: whenever
CiviXero pushes an invoice to Xero, this extension intercepts the data via CiviXero's
`accountPushAlterMapped` hook and, for each line item that has a tax amount and quantity,
recalculates the `UnitAmount` as `(line_total + tax_amount) / qty` and switches the invoice
to `LineAmountTypes = Inclusive`. Non-invoice entities pushed by CiviXero are left
unchanged.

## Special configuration requirements

None. This extension has no settings page and requires no credentials of its own, it relies
entirely on the [CiviXero](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero) and
[AccountSync](https://github.com/eileenmcnaughton/nz.co.fuzion.accountsync) extensions
already being installed, enabled, and configured with a working Xero connection. Once those
are set up, simply enabling this extension is sufficient, invoices are then pushed to Xero
as tax inclusive rather than tax exclusive.

## Requirements

* PHP v5.6+
* [CiviCRM 5.51+](https://civicrm.org/download)
* [CiviXero extension](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
* [AccountSync extension](https://github.com/eileenmcnaughton/nz.co.fuzion.accountsync)

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin
Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.com.agileware.xerountax@https://github.com/agileware/au.com.agileware.xerountax/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git)
repo for this extension and install it with the command-line tool
[cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/agileware/au.com.agileware.xerountax.git
cv en xerountax
```

## About the Authors

This CiviCRM extension was developed by the team at [Agileware](https://agileware.com.au).

[Agileware](https://agileware.com.au) provide a range of CiviCRM services including:

  * CiviCRM migration
  * CiviCRM integration
  * CiviCRM extension development
  * CiviCRM support
  * CiviCRM hosting
  * CiviCRM remote training services

Support your Australian [CiviCRM](https://civicrm.org) developers, [contact Agileware](https://agileware.com.au/contact) today!

![Agileware](logo/agileware-logo.png)
