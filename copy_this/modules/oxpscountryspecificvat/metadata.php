<?php
/**
 *    This file is part of OXID Country Specific Vat module.
 *
 *    OXID Country Specific Vat module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID Country Specific Vat module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You can see GNU General Public License here <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   MOD_COUNTRYSPECIFICVAT
 * @copyright (C) OXID eSales AG 2003-2018
 * @version   Country Specific VAT module for OXID eShop EE, PE and CE since version 4.3.0_26948
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'                =>  'oxpscountryspecificvat',
    'title'             =>  'Country Specific VAT',
    'description'       =>  array(
        'de'            =>  'Für den grenzüberschreitenden Handel (Export) innerhalb der Europäischen Union muss eine Ausnahme anerkannt werden, um die Mehrwertsteuer nicht zu verwenden, wenn der Ladenbesitzer seine Geschäfte hat. In manchen Fällen müssen Sie die Steuer des Empfängerlandes verwenden, zum Beispiel wenn bestimmte Umsatzschwellen überschritten werden.',
        'en'            =>  'For cross-border trade (export) within the European Union, it is necessary to recognize an exception to not use the VAT where the shop owner has his business. In some cases you have to use the tax of the recipient country, for example when exceeding certain turnover thresholds.',
    ),
    'thumbnail'         =>  '',
    'version'           =>  '1.0.0',
    'author'            =>  'OXID eSales AG',
    'url'               =>  'http://www.oxid-esales.com',
    'email'             =>  'info@oxid-esales.com',
    'extend'            => array(
        'oxvatselector'              =>  'oxpscountryspecificvat/models/modvatselector'
    ),
);