<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 */
class Pagination {

	var $base_url		= '';		// 基础路径
	var $total_rows		= '';		// 所有分页的总条数
	var $per_page		= 20;		// 每页显示的最大数量
	var $now_page		= 1;		// 当前页面
	var $click			= '';		// 点击脚本
	var $page_num		= 7;		// 显示多少个分页

	var $uri_segment	= 3;		// 第几个参数是翻页传参
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array()) {
		if (count($params) > 0) {
			$this->initialize($params);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array()) {
		if (count($params) > 0) {
			foreach ($params as $key => $val) {
				if (isset($this->$key)) {
					$this->$key = $val;
				}
			}
		}
	}

	function buildHTML() {
		$base_url = trim($this->base_url, '/');
		$total_page = ceil($this->total_rows/$this->per_page);
		$now_page = $this->now_page;
		$page_num = $this->page_num;
		$page_num = $total_page<$page_num ? $total_page : $page_num;
		$click = $this->click;

		$html = "";
		$html .= "<div class='pagination pagination-centered'><ul>";
		if ($total_page>1 && $now_page>1) {
			$prev_page = $now_page - 1;
			$html .= "<li><a href='{$base_url}/p/1' class='page_item'>首页</a></li>";
			$html .= "<li><a href='{$base_url}/p/{$prev_page}' class='page_item'>上一页</a></li>";
		}

		$diff = floor($page_num/2);
		$min = $now_page - $diff;
		$min = $min<=0 ? 1 : $min;
		$max = $min + $page_num;
		if ($total_page<$max) {
			$max = $total_page+1;
			$min = $max - $page_num;
		}

		for ($i=$min; $i<$max; $i++) {
			if ($i == $now_page) {
				$html .= "<li class='disabled'><span class='page_item'>{$i}</span></li>";
				continue;
			}
			$html .= "<li><a href='{$base_url}/p/{$i}' class='page_item'>{$i}</a></li>";
		}


		if ($total_page>1 && $now_page<$total_page) {
			$next_page = $now_page + 1;
			$html .= "<li><a href='{$base_url}/p/{$next_page}' class='page_item'>下一页</a></li>";
			$html .= "<li><a href='{$base_url}/p/{$total_page}' class='page_item'>尾页</a></li>";				
		}
		$html .= "</ul></div>";

		return $html;
	}

	function createPage() {
		return $this->buildHTML();
		// return $page;
	}

}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */