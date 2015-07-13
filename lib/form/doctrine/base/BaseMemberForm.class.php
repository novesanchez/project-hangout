<?php

/**
 * Member form base class.
 *
 * @method Member getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMemberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'username'           => new sfWidgetFormInputText(),
      'password'           => new sfWidgetFormInputText(),
      'nick_name'          => new sfWidgetFormInputText(),
      'country'            => new sfWidgetFormInputText(),
      'state'              => new sfWidgetFormInputText(),
      'city'               => new sfWidgetFormInputText(),
      'email'              => new sfWidgetFormInputText(),
      'age'                => new sfWidgetFormInputText(),
      'zip_code'           => new sfWidgetFormInputText(),
      'gender'             => new sfWidgetFormInputText(),
      'birthday'           => new sfWidgetFormDate(),
      'profile_picture_id' => new sfWidgetFormInputText(),
      'is_published'       => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputText(),
      'profile_id'         => new sfWidgetFormInputText(),
      'confirmation_code'  => new sfWidgetFormTextarea(),
      'confirmed_date'     => new sfWidgetFormDateTime(),
      'num_confirm'        => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'           => new sfValidatorString(array('max_length' => 50)),
      'password'           => new sfValidatorString(array('max_length' => 200)),
      'nick_name'          => new sfValidatorString(array('max_length' => 50)),
      'country'            => new sfValidatorString(array('max_length' => 200)),
      'state'              => new sfValidatorString(array('max_length' => 150)),
      'city'               => new sfValidatorString(array('max_length' => 200)),
      'email'              => new sfValidatorString(array('max_length' => 100)),
      'age'                => new sfValidatorInteger(),
      'zip_code'           => new sfValidatorInteger(),
      'gender'             => new sfValidatorString(array('max_length' => 1)),
      'birthday'           => new sfValidatorDate(),
      'profile_picture_id' => new sfValidatorInteger(),
      'is_published'       => new sfValidatorInteger(),
      'status'             => new sfValidatorInteger(array('required' => false)),
      'profile_id'         => new sfValidatorString(array('max_length' => 200)),
      'confirmation_code'  => new sfValidatorString(),
      'confirmed_date'     => new sfValidatorDateTime(),
      'num_confirm'        => new sfValidatorInteger(),
      'created_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('member[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Member';
  }

}
