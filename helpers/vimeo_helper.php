<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sekati CodeIgniter Vimeo Helper Spark
 *
 * @package		Sekati
 * @author		Jason M Horwitz
 * @copyright	Copyright (c) 2012, Sekati LLC.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://sekati.com
 * @version		v1.0.3
 * @filesource
 *
 * @usage 		$autoload['helper'] = array('vimeo');
 *
 */

// ------------------------------------------------------------------------
// VIMEO HELPERS

/**
 * Get Vimeo Id
 *
 * @access	public
 * @param	string	Vimeo URL
 * @return	string	Vimeo ID | FALSE
 */
if ( ! function_exists('vimeo_id'))
{
	function vimeo_id( $url = '')
	{
		if ( $url === '' ) return FALSE;

		if (_isValidURL( $url ))
		{
			sscanf(parse_url($url, PHP_URL_PATH), '/%d', $vimeo_id);
		} 
		else 
		{
			$vimeo_id = $url;
		}
		return (_isValidID($vimeo_id,TRUE)) ? $vimeo_id : FALSE;
	}
}

/**
 * Get Vimeo API data
 *
 * @access	public
 * @param	string		Vimeo video url || id
 * @return	array 		array of useful simple API data.
 */
if ( ! function_exists('vimeo_data'))
{
	function vimeo_data( $url_id = '')
	{
		if ( $url_id == '' ) return FALSE;
		
		$id = ( ! _isValidURL( $url_id)) ? $url_id : vimeo_id( $url_id );
		$api_query = @file_get_contents("http://vimeo.com/api/v2/video/$id.php");
		return ($api_query === FALSE) ? FALSE : unserialize($api_query);
	}
}

/**
 * Get Vimeo embed
 *
 * @access	public
 * @param	string		Vimeo url || Vimeo id
 * @param 	number 		width
 * @param   number 		height
 * @param   boolean 	color
 * @param   boolean 	autoplay / default = FALSE
 * @return	string   	embebed code
 */

if ( ! function_exists('vimeo_embed'))
{
	function vimeo_embed( $url_id = '', $width = '', $height = '', $color = '', $title = FALSE, $autoplay = FALSE)
	{
		if ($url_id == '')
		{
			return FALSE;
		}
		if ( ! _isValidURL( $url_id ))
		{
			$id = $url_id;
		} 
		else 
		{
			$id = vimeo_id( $url_id );
		}

		$embed = '<iframe src="http://player.vimeo.com/video/'.$id.'?byline=0&amp;portrait=0&amp;';
		if ( $color != '' )
		{
			$embed .= 'color='.$color.'&amp;';
		}
		if ( $autoplay )
		{
			$embed .= 'autoplay=1';
		}
		$embed .= '" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
		return $embed;
	}
} 
 
 
/*** @private */


/**
 * Validate URL
 * This URL could have http or just www
 *
 * @access private
 * @param string 		Vimeo URL
 * @return preg_match
 */
if ( ! function_exists('_isValidURL'))
{
	function _isValidURL($url = '')
	{
		return preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/i', $url);
	}
}


/**
 * Validate Vimeo Video ID
 * Check if the id is valid or not
 *
 * @access private
 * @param string 		Vimeo ID
 * @return boolean
 */
if ( ! function_exists('_isValidID'))
{
	function _isValidID($id = '')
	{
		$headers = get_headers('http://vimeo.com/' . $id);
		return ( ! strpos($headers[0], '200')) ? FALSE : TRUE;
	}
} 
 
 
/* End of file vimeo_helper.php */