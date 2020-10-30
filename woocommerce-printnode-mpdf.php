<?php
/**
 * Plugin Name: WooCommerce PrintNode mPDF engine
 * Plugin URI: https://github.com/DavidAnderson684/woocommerce-printnode-mpdf
 * GitHub Plugin URI: https://github.com/DavidAnderson684/woocommerce-printnode-mpdf
 * Description: Use the mPDF engine for producing PDF files
 * Version: 1.0.1
 * Author: David Anderson
 * Author URI: https://www.simbahosting.co.uk/s3/shop/
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: woocommerce-printorders
 */

if (!defined('ABSPATH')) die('No direct access.');

class WooCommerce_Simba_PrintOrders_MPDF {

	// Internal identifier
	const ID = 'printnode';
	
	/**
	 * Plugin constructor
	 */
	public function __construct() {
		add_filter('woocommerce_printorders_'.$this::ID.'_html_to_pdf_result', array($this, 'html_to_pdf_result'), 10, 3);
		add_filter('woocommerce_printorders_'.$this::ID.'_internal_options_mpdf_notice', array($this, 'internal_options_mpdf_notice'));
	}

	/**
	 * Output visual information in the settings
	 */
	public function internal_options_mpdf_notice() {
		return __('The PDF will be created by the mPDF engine (the associated plugin is installed and active).', 'woocommerce-printorders').'</br>';
	}
	
	/**
	 * Provide PDF output
	 *
	 * @param Boolean|String $result - a PDF stream, or false if not doing anything
	 * @param String		 $html - input
	 * @param Array			 $options
	 *
	 * @return Boolean|String - filtered output
	 */
	public function html_to_pdf_result($result, $html, $options) {
	
		// If something else already got in, then pass it through
		if (false !== $result) return $result;
	
		require_once __DIR__ . '/vendor/autoload.php';

		// "Warning: mPDF will clean up old temporary files in the temporary directory. Choose a path dedicated to mPDF only." (https://github.com/mpdf/mpdf)
		$temp_dir = sys_get_temp_dir().'/mpdf-tmp-'.md5(site_url());
		
		$mpdf_options = apply_filters('woocommerce_printorders_'.$this::ID.'_mpdf_options', array(
			'mode'				=> 'utf-8', 
			'format'			=> [ round($options['paper_width'] / 2.83464567), round($options['paper_height'] / 2.83464567) ],
			'tempDir'			=> $temp_dir,
			'debug'				=> true,
			'useSubstitutions'	=> file_exists(__DIR__ . '/vendor/mpdf/mpdf/ttfonts/FreeSans.ttf'),
		));

		error_clear_last();
		$mpdf = new \Mpdf\Mpdf($mpdf_options);
		$mpdf->WriteHTML($html);

		return $mpdf->Output(null, \Mpdf\Output\Destination::STRING_RETURN);
	}
}

new WooCommerce_Simba_PrintOrders_MPDF();
