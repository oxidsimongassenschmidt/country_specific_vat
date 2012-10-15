<?php
/**
 * @link      http://www.oxid-esales.com
 * @package   tests
 * @copyright (c) OXID eSales AG 2003-2010
 * @version   SVN: $Id: oxvatselectorTest.php 26841 2010-03-25 13:58:15Z arvydas $
 */

require_once realpath( "." ).'/unit/OxidTestCase.php';

if ( !class_exists( "modvatselector_parent" ) ) {
    class modVatSelector_parent extends oxVatSelector
    {
    }
}

/**
 * modVatSelector tests
 */
class Unit_Core_modVatSelectorTest extends OxidTestCase
{
    /**
     * modVatSelector::getUserVat() test case
     *
     * @return null
     */
    public function testGetUserVat()
    {
        $aCountryVat = array( "8f241f11096877ac0.98748826" => 1, // Vereinigte Staaten von Amerika
                              "a7c40f632a0804ab5.18804076" => 2, // Vereinigtes Königreich
                              "a7c40f6321c6f6109.43859248" => 3, // Schweiz
                              "a7c40f6320aeb2ec2.72885259" => 4, // Österreich
                              "a7c40f631fc920687.20179984" => 5, // Deutschland
                            );

        oxConfig::getInstance()->setConfigParam( "aCountryVat", $aCountryVat );

        $oUser1 = $this->getMock( "oxUser", array( "getActiveCountry" ) );
        $oUser1->expects( $this->any() )->method( 'getActiveCountry' )->will( $this->returnValue( "a7c40f631fc920687.20179984" ) );

        $oUser2 = $this->getMock( "oxUser", array( "getActiveCountry" ) );
        $oUser2->expects( $this->any() )->method( 'getActiveCountry' )->will( $this->returnValue( null ) );

        $oSelector = $this->getMock( "modVatSelector", array( "_getForeignCountryUserVat", "_getVatCountry" ) );
        $oSelector->expects( $this->any() )->method( '_getForeignCountryUserVat' )->will( $this->returnValue( false ) );
        $oSelector->expects( $this->any() )->method( '_getVatCountry' )->will( $this->returnValue( "a7c40f6320aeb2ec2.72885259" ) );

        $this->assertEquals( 5, $oSelector->getUserVat( $oUser1 ) );
        $this->assertEquals( 4, $oSelector->getUserVat( $oUser2 ) );
    }
}