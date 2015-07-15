<?php

/**
 * GridFieldDetailFormExtraButtons
 * 
 * Adds 2 more buttons to a gridfield save and close, and save 
 * 
 * @author Robert Clarkson rob@robertclarkson.net
 */

class GridFieldDetailFormExtraButtons extends GridFieldDetailForm_ItemRequest {
	private static $allowed_actions = array(
		'edit',
		'view',
		'ItemEditForm',
		'SaveAndClose',
		'SaveAndAdd'
	);
	public function ItemEditForm() {
		$form = parent::ItemEditForm();
		$action = 'Save';
		if (!$this->record->ID) {
			$action = 'Create';
		}
		$form->Actions()->push(
			FormAction::create('SaveAndClose', $action.' & Close')
		);
		$form->Actions()->push(
			FormAction::create('SaveAndAdd', $action.' & Add Another')
		);
		return $form;

	}

	public function SaveAndClose($data, $form) {
		$controller = $this->getToplevelController();
		$this->doSave($data, $form);
		return $controller->redirect($this->getBackLink());
	}

	public function SaveAndAdd($data, $form) {
		$controller = $this->getToplevelController();
		$this->doSave($data, $form);
		return $controller->redirect(Controller::join_links($this->gridField->Link('item'), 'new'));
	}


}
