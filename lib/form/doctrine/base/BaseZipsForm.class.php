<?php

/**
 * Zips form base class.
 *
 * @method Zips getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZipsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'zip_code'           => new sfWidgetFormInputText(),
      'state_abbreviation' => new sfWidgetFormInputText(),
      'latitude'           => new sfWidgetFormInputText(),
      'longitude'          => new sfWidgetFormInputText(),
      'city'               => new sfWidgetFormInputText(),
      'state'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'zip_code'           => new sfValidatorInteger(),
      'state_abbreviation' => new sfValidatorString(array('max_length' => 5)),
      'latitude'           => new sfValidatorNumber(),
      'longitude'          => new sfValidatorNumber(),
      'city'               => new sfValidatorString(array('max_length' => 100)),
      'state'              => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('zips[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zips';
  }

}
