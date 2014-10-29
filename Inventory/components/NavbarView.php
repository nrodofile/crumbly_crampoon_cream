<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */

class NavbarView {

	private $menu_items;

	function __construct($menu_items = null) {
		if(empty($menu_items)){
			$this->menu_items = array(
				"Network" => "index_network.php",
				"Hardware" => "index_hardware.php",
				"Software" => array(
					"Software" => "index_software.php",
					"Applications" => "#applications",
					"Operating Systems" => "#operatingsystems"
				),
				"Vulnerabilities" => "index_vulnerability.php",
				"Fix" => "index_fix.php",
			);
		} else {
			$this->menu_items = $menu_items;
		}
	}

	private function process_dropdown($item, $items, $selected = null){
		$navbar = '
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$item.'<span class="caret"></span></a>';


		$navbar .= '<ul class="dropdown-menu" role="menu">';

		foreach($items as $item => $link){
			$navbar .= "<li><a href=\"$link\">$item</a></li>";
		}

		$navbar .= '
				</ul>
			</li>';
		return $navbar;
	}

	private function process_items($selected){
		$navbar = '';
		foreach($this->menu_items as $item => $link){
			if (is_array($link)){
				$navbar .= $this->process_dropdown($item, $link, $selected);

			} elseif ($item == $selected){
				$navbar .= "<li class=\"active\"><a href=\"$link\">$item</a></li>";

			} else {
				$navbar .= "<li><a href=\"$link\">$item</a></li>";
			}
		}
		return $navbar;
	}

	public function show($selected){
		$navbar = '
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

			<a class="navbar-brand" href="#">Network Inventory</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">';

		$navbar .= $this->process_items($selected);
		$navbar .=
			'
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Login</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
		';
		return $navbar;

	}
} 