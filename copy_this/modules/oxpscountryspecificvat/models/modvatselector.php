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
 * Country specific vat calculation module
 */
class modVatSelector extends modVatSelector_parent
{
    /**
     * get Country specific VAT for user
     *
     * @param oxUser $oUser        given user object
     * @param bool   $blCacheReset reset cache
     *
     * @throws oxObjectException if wrong country
     * @return double | false
     */
    public function getUserVat( oxUser $oUser, $blCacheReset = false )
    {
        /**
         * - Vat config via config.inc.php
         *
             $this->aCountryVat = array( "8f241f11096877ac0.98748826" => 1, // Vereinigte Staaten von Amerika
                                         "a7c40f632a0804ab5.18804076" => 2, // Vereinigtes Königreich
                                         "a7c40f6321c6f6109.43859248" => 3, // Schweiz
                                         "a7c40f6320aeb2ec2.72885259" => 4, // Österreich
                                         "a7c40f631fc920687.20179984" => 5, // Deutschland
                                       );

         * - Vat is selected by delivery country
         *
         *   oxUser::getActiveCountry() / oxVatSelector::_getVatCountry( $oUser )
         *
         * - Compatible with version 4.3.x and higher
         * - Logic like in previous shop version
         */

        // user/country vat
        if ( ( $dVat = parent::getUserVat( $oUser, $blCacheReset ) ) === false ) {
            if ( $oUser && ( $aCountry2Vat = $this->getConfig()->getConfigParam( "aCountryVat" ) ) ) {
                if ( ( $sUserCountry = $oUser->getActiveCountry() ) === null ) {
                    $sUserCountry = $this->_getVatCountry( $oUser );
                }
                if ( isset( $aCountry2Vat[$sUserCountry] ) ) {
                    $dVat = $aCountry2Vat[$sUserCountry];
                }
            }
        }

        return $dVat;
    }
}