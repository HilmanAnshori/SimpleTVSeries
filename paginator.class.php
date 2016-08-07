<?php
/**
 * PHP Pagination Class
 * @author admin@catchmyfame.com - http://www.catchmyfame.com
 * @version 3.0.0
 * @date February 6, 2014
 * @copyright (c) admin@catchmyfame.com (www.catchmyfame.com)
 * @license CC Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0) - http://creativecommons.org/licenses/by-sa/3.0/
*/
error_reporting(-1);
class Paginator{
	public $current_page;
	public $items_per_page;
	public $limit_end;
	public $limit_start;
	public $num_pages;
	public $total_items;
	protected $ipp_array;
	protected $limit;
	protected $mid_range;
	protected $querystring;
	protected $return;
	protected $get_ipp;

	public function __construct($total=0,$mid_range=7,$ipp_array=array(20),$paged,$curpage) {	
		$this->return = array();
		$this->total_items = (int) $total;
		if($this->total_items <= 0) exit("Unable to paginate: Invalid total value (must be an integer > 0)");
		$this->mid_range = (int) $mid_range; // midrange must be an odd int >= 1
		if($this->mid_range%2 == 0 Or $this->mid_range < 1) exit("Unable to paginate: Invalid mid_range value (must be an odd integer >= 1)");
		if(!is_array($ipp_array)) exit("Unable to paginate: Invalid ipp_array value");
		$this->ipp_array = $ipp_array;
		$this->items_per_page = (isset($_GET["ipp"])) ? $_GET["ipp"] : $this->ipp_array[0];
		$this->default_ipp = $this->ipp_array[0];
		if($this->items_per_page == "All") {
			$this->num_pages = 1;
		} else {
			if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->ipp_array[0];
			$this->num_pages = ceil($this->total_items/$this->items_per_page);
		}
		$this->current_page = $paged;
		if($this->num_pages > 10) {
			$this->return[] = ($this->current_page > 1 And $this->total_items >= 10) ? '<li><a href="'.$curpage.'/page/'.($this->current_page-1).'">Prev</a></li> ':'<li class="disabled"><a href="#">Prev</a></li>';
			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);
			if($this->start_range <= 0) {
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages) {
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);
			for($i=1;$i<=$this->num_pages;$i++) {
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return[] = '<li class="disabled"><a href="#">...</a></li>';
				// loop through all pages. if first, last, or in range, display
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range)) $this->return[] = ($i == $this->current_page And $this->items_per_page != "All") ? '<li class="disabled"><a href="#">'.$i.'</a></li> ':'<li><a title="Go to page '.$i.' of '.$this->num_pages.'" href="'.$curpage.'/page/'.$i.'">'.$i.'</a></li> ';
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return[] = '<li class="disabled"><a href="#">...</a></li>';
			}
			$this->return[] = (($this->current_page < $this->num_pages And $this->total_items >= 10) And ($this->items_per_page != "All") And $this->current_page > 0) ? '<li><a href="'.$curpage.'/page/'.($this->current_page+1).'">Next</a></li>':'<li class="disabled"><a href="#">Next</a></li>';
			
		} else	{
			for($i=1;$i<=$this->num_pages;$i++) {
				$this->return[] = ($i == $this->current_page) ? '<li class="disabled"><a href="#">'.$i.'</a></li>':'<li><a href="'.$curpage.'/page/'.$i.'">'.$i.'</a></li> ';
			}
		}
		// $this->return[] = str_replace("&","&amp;",$this->return);
		$this->limit_start = ($this->current_page <= 0) ? 0:($this->current_page-1) * $this->items_per_page;
		if($this->current_page <= 0) $this->items_per_page = 0;
		$this->limit_end = ($this->items_per_page == "All") ? (int) $this->total_items: (int) $this->items_per_page;
	}
	public function display_pages() {
		return $this->return;
	}
}