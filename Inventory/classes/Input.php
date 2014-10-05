<?php
/**
 * User: Nicholas Rodofile
 */

date_default_timezone_set('UTC');

class Text {
    var $length;
    var $value;
    var $name;
    var $id;
    var $placeholder;
    var $min;
    var $max;
    var $attributes;

    function __construct(	$name = null,
                             $id = null,
                             $placeholder = null,
                             $length = null,
                             $min = null,
                             $max = null,
                             $attributes = null,
                             $value = null	){

        $this->length = $length;
        $this->value = $value;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->min = $min;
        $this->max = $max;
        $this->attributes = $attributes;

    }

    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }
        return
            "<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<input type=\"Text\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>
				</div>
			</div>";
    }

    function toString(){
        echo $this->value;
    }

}

class Integer extends Text{
    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }
        return "<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<input type=\"number\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>
				</div>
			</div>";
    }
}

class Password extends Text{
    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }
        return "<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<input type=\"password\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>
				</div>
			</div>";
    }
}

class TextArea extends Text{
    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }
        return "
			<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<textarea class=\"form-control\" rows=\"3\" name=\"$this->name\" placeholder =\"$this->placeholder\" maxlength=\"$this->max\" class=\"form-control\" $this->attributes>$this->value</textarea>
				</div>
			</div>";
    }
}

class Bool extends Text{
    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }

        $checked = $this->value > 0 ? 'checked' : '';
        return
            "<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<input type=\"checkbox\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"1\" class=\"form-control\" $this->attributes $checked>
				</div>
			</div>";
    }

    function inputSimple($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }

        return
            "<div class=\"checkbox\">
  				<div class=\"col-md-1\">
					<input type=\"checkbox\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>
				</div>
			</div>";
    }
}

class Hidden extends Text{
    function input($attributes = NULL){
        if (!empty($attributes)){
            $this->$attributes .= $attributes;
        }
        return "<input type=\"Hidden\" name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>";
    }
}

class Select extends Text{
	function input($attributes = NULL){
		if (!empty($attributes)){
			$this->$attributes .= $attributes;
		}
		return
			"<div class=\"form-group\">
				<label for=\"$this->name\" class=\"col-sm-2 control-label\">$this->placeholder</label>
				<div class=\"col-sm-10\">
					<select name=\"$this->name\" placeholder =\"$this->placeholder\" value=\"$this->value\" class=\"form-control\" $this->attributes>
					</select>
				</div>
			</div>";
	}
}
