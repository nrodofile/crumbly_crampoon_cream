<?php
/**
 * Created by PhpStorm.
 * User: n8036039
 * Date: 10/27/14
 * Time: 11:47 PM
 */

class PanelContainerView {

	public function display($title, $content){
		return '
			<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">'.$title.'</div>
				<div class="panel-body">'
					.$content.
				'</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>';
	}

} 