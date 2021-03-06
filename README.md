# Xero Un-tax

Remove tax details from line items sent via CiviXero, so Xero can figure it out
avoiding rounding issues.

The extension is licensed [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.6+
* [CiviCRM 5.x](https://civicrm.org/download)
* [CiviXero extension](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
* [AccountSync extension](https://github.com/eileenmcnaughton/nz.co.fuzion.accountsync)

## Installation (Web UI)

[Download the extension](https://github.com/agileware/au.com.agileware.xerountax/archive/master.zip),
and extract into your custom extensions directory, then enable via the
Extensions admin page (normally via Administer » System Settings » Extensions)

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
git clone https://github.com/agileware/au.com.agileware.xerotax.git
cv en xerotax
```

## Usage

After Civixero has been set up, just enable this extension.  Invoices are now pushed tax inclusive.

About the Authors
-----------------

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