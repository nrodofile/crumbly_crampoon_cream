<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */

abstract class View {
	abstract public function input_form();
	abstract public function output_form();
	abstract public function select();
	abstract public function multi_select();
} 