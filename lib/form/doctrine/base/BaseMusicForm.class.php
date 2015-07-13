<?php

/**
 * Music form base class.
 *
 * @method Music getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMusicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'artist_name' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'genre_id'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 150)),
      'artist_name' => new sfValidatorString(array('max_length' => 150)),
      'created_at'  => new sfValidatorDateTime(),
      'genre_id'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('music[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Music';
  }

}
