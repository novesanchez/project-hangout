<?php

/**
 * Postings form base class.
 *
 * @method Postings getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostingsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'member_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'gender_type'     => new sfWidgetFormInputText(),
      'date_to_hangout' => new sfWidgetFormInputText(),
      'num_ppl'         => new sfWidgetFormInputText(),
      'posting_enddt'   => new sfWidgetFormInputText(),
      'age_range_1'     => new sfWidgetFormInputText(),
      'age_range_2'     => new sfWidgetFormInputText(),
      'starttime'       => new sfWidgetFormInputText(),
      'endtime'         => new sfWidgetFormInputText(),
      'posting_title'   => new sfWidgetFormInputText(),
      'posting_desc'    => new sfWidgetFormTextarea(),
      'date_created'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'gender_type'     => new sfValidatorString(array('max_length' => 1)),
      'date_to_hangout' => new sfValidatorString(array('max_length' => 100)),
      'num_ppl'         => new sfValidatorInteger(),
      'posting_enddt'   => new sfValidatorString(array('max_length' => 100)),
      'age_range_1'     => new sfValidatorInteger(),
      'age_range_2'     => new sfValidatorInteger(),
      'starttime'       => new sfValidatorString(array('max_length' => 20)),
      'endtime'         => new sfValidatorString(array('max_length' => 20)),
      'posting_title'   => new sfValidatorString(array('max_length' => 100)),
      'posting_desc'    => new sfValidatorString(array('max_length' => 300)),
      'date_created'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('postings[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Postings';
  }

}
