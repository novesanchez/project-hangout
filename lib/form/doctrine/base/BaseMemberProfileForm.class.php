<?php

/**
 * MemberProfile form base class.
 *
 * @method MemberProfile getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMemberProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'member_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'profile_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'value'             => new sfWidgetFormInputText(),
      'profile_choice_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfileChoice'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'profile_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'value'             => new sfValidatorString(array('max_length' => 200)),
      'profile_choice_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfileChoice'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberProfile';
  }

}
