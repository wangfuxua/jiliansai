<?php  

/**
 * Site URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('site_url')) {
	function site_url($uri = '') {
		return base_url(Yii::app()->homeUrl).'/'.ltrim($uri,'/');
	}
}

// ------------------------------------------------------------------------

/**
 * Base URL
 * 
 * Create a local URL based on your basepath.
 * Segments can be passed in as a string or an array, same as site_url
 * or a URL to a file can be passed in, e.g. to an image file.
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('base_url')) {
	function base_url($uri = '') {
		return Yii::app()->request->hostInfo.'/'.ltrim($uri,'/');
	}


}


/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */