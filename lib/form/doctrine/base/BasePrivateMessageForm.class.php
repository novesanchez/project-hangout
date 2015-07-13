<?php

/**
 * PrivateMessage form base class.
 *
 * @method PrivateMessage getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrivateMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'subject'   => new sfWidgetFormInputText(),
      'message'   => new sfWidgetFormTextarea(),
      'date'      => new sfWidgetFormDateTime(),
      'sender_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'subject'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'message'   => new sfValidatorString(array('required' => false)),
      'date'      => new sfValidatorDateTime(),
      'sender_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('private_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PrivateMessage';
  }

}
