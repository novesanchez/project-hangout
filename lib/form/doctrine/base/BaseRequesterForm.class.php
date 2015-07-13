<?php

/**
 * Requester form base class.
 *
 * @method Requester getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRequesterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'request_status_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RequestStatus'), 'add_empty' => true)),
      'member_id'         => new sfWidgetFormInputText(),
      'posting_id'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'request_status_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RequestStatus'), 'required' => false)),
      'member_id'         => new sfValidatorInteger(array('required' => false)),
      'posting_id'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requester[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requester';
  }

}
