<?php
/**
 * Class SampleTest
 *
 * @package Wp_Szechenyi2020_Infoblokk
 */

/**
 * Sample test case.
 */
class IntegrationTest extends WP_UnitTestCase {
    public function test_plugin_requirements() {
        $this->assertTrue( defined( 'WP_SZECHENYI2020_INFOBLOKK_VERSION' ) );
    }
}
