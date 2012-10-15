country_specific_vat
====================

For cross-border trade (export) within the European Union, it is necessary to recognize an exception to not use the VAT where the shop owner has his business. In some cases you have to use the tax of the recipient country, for example when exceeding certain turnover thresholds.

Please use this module only in consultation with your accountant!

This module is distributed under open source license GPLv3 and comes without any warranty.

Installation:
=============
Open config.inc.php and define country VATs e.g.:


       $this->aCountryVat = array( "8f241f11096877ac0.98748826" => 1, // Vereinigte Staaten von Amerika
                                   "a7c40f632a0804ab5.18804076" => 2, // Vereinigtes Königreich
                                   "a7c40f6321c6f6109.43859248" => 3, // Schweiz
                                   "a7c40f6320aeb2ec2.72885259" => 4, // Österreich
                                   "a7c40f631fc920687.20179984" => 5, // Deutschland
                                 );

The country ID's can be found in "admin > Master Settings > Countries" (mouse over country name in country list) or OXID field in "oxcountry" table.

Go to "admin > Master Settings > Core Settings > System > Modules" and append modules with:

       oxvatselector => modvatselector

Login to shop with some user to see how country specific VAT is calculated.