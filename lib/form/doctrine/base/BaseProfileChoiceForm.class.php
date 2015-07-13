<?php

/**
 * ProfileChoice form base class.
 *
 * @method ProfileChoice getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileChoiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'choice_name'  => new sfWidgetFormInputText(),
      'order_number' => new sfWidgetFormInputText(),
      'profile_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'choice_name'  => new sfValidatorString(array('max_length' => 45)),
      'order_number' => new sfValidatorInteger(),
      'profile_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
    ));

    $this->widgetSchema->setNameFormat('profile_choice[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfileChoice';
  }

}
