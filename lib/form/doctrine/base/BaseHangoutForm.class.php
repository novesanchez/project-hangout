<?php

/**
 * Hangout form base class.
 *
 * @method Hangout getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHangoutForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'topic'             => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormInputText(),
      'location'          => new sfWidgetFormInputText(),
      'objective'         => new sfWidgetFormInputText(),
      'start_time'        => new sfWidgetFormDateTime(),
      'end_time'          => new sfWidgetFormDateTime(),
      'date'              => new sfWidgetFormDate(),
      'number_of_people'  => new sfWidgetFormInputText(),
      'gender_request'    => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'member_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'policy_id'         => new sfWidgetFormInputText(),
      'hangout_status_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HangoutStatus'), 'add_empty' => false)),
      'end_date'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'topic'             => new sfValidatorString(array('max_length' => 150)),
      'description'       => new sfValidatorString(array('max_length' => 150)),
      'location'          => new sfValidatorString(array('max_length' => 150)),
      'objective'         => new sfValidatorString(array('max_length' => 150)),
      'start_time'        => new sfValidatorDateTime(),
      'end_time'          => new sfValidatorDateTime(),
      'date'              => new sfValidatorDate(),
      'number_of_people'  => new sfValidatorInteger(),
      'gender_request'    => new sfValidatorString(array('max_length' => 1)),
      'created_at'        => new sfValidatorDateTime(),
      'member_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'policy_id'         => new sfValidatorInteger(),
      'hangout_status_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HangoutStatus'))),
      'end_date'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('hangout[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hangout';
  }

}
