<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInputText(),
      'order_number'          => new sfWidgetFormInputText(),
      'profile_input_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfileInputType'), 'add_empty' => false)),
      'has_custom_style'      => new sfWidgetFormInputText(),
      'placement_id'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 150)),
      'order_number'          => new sfValidatorInteger(),
      'profile_input_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfileInputType'))),
      'has_custom_style'      => new sfValidatorInteger(array('required' => false)),
      'placement_id'          => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
