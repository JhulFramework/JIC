<?php namespace _modules\user\activities\_self\settings\email ;

class Form_Unverified_Email extends \Jhul\Components\Application\Html\Form\EditDBEntity
{

      protected function fieldDefinitions()
      {
            return [
                  'code' => [ 'type' => 'alnum' ],
            ];
      }

      public function validate()
      {
            if( parent::validate() )
            {
                  if( $this->entity()->P('E')->verify( $this->code ) )
                  {
                        return TRUE;
                  }

                  $this->addError( 'Email', 'ERROR_WRONG_CODE' );
            }

            return FALSE;
      }
}
