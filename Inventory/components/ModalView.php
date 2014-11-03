<?php
/**
 * Created by PhpStorm.
 * User: n8036039
 * Date: 10/27/14
 * Time: 11:47 PM
 */

class ModalView {

	public function note_model($content){
		return '<!-- Modal -->
<div class="modal fade" id="note_modal" tabindex="-1" role="dialog" aria-labelledby="note_modal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="note_modal_Label">New Note</h4>
      </div>
      <div class="modal-body">
        '.$content.'
      </div>
    </div>
  </div>
</div>';
	}

	public function networkHardware_model($content){
		return '<!-- Modal -->
<div class="modal fade" id="networkHardware_modal" tabindex="-1" role="dialog" aria-labelledby="networkHardware_modal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="networkHardware_modal_Label">Network Connection</h4>
      </div>
      <div class="modal-body">
        '.$content.'
      </div>
    </div>
  </div>
</div>';
	}

	public function application_model($content){
		return '<!-- Modal -->
<div class="modal fade" id="application_modal" tabindex="-1" role="dialog" aria-labelledby="application_modal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="application_modal_Label">Applications</h4>
      </div>
      <div class="modal-body">
        '.$content.'
      </div>
    </div>
  </div>
</div>';
	}

	public function fix_model($content){
		return '<!-- Modal -->
<div class="modal fade" id="fix_modal" tabindex="-1" role="dialog" aria-labelledby="fix_modal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="fix_modal_Label">Fix</h4>
      </div>
      <div class="modal-body">
        '.$content.'
      </div>
    </div>
  </div>
</div>';
	}

	public function vulnerability_model($content){
		return '<!-- Modal -->
<div class="modal fade" id="vulnerability_modal" tabindex="-1" role="dialog" aria-labelledby="vulnerability_modal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="vulnerability_modal_Label">Vulnerability</h4>
      </div>
      <div class="modal-body">
        '.$content.'
      </div>
    </div>
  </div>
</div>';
	}

} 