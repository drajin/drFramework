<?php

namespace app\models;


abstract class Model
{
    public function loadData($data)
    {
        foreach($data as $key => $value){
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
//    public const RULE_REQUIRED = 'required'; ZURA 2
//    public const RULE_EMAIL = 'email';
//    public const RULE_MIN = 'min';
//    public const RULE_MAX = 'max';
//    public const RULE_MATCH = 'match';
//    public array $errors = [];
//
//    public function loadData($data)
//    {
//        foreach($data as $key => $value){
//            if(property_exists($this, $key)) {
//                $this->{$key} = $value;
//            }
//        }
//    }
//
//    abstract public function rules();
//
//    public function validate()
//    {
//        foreach ($this->rules() as $attribute => $rules) {
//            $value = $this->{$attribute};
//            foreach ($rules as $rule) {
//                $ruleName = $rule;
//                if(!is_string($ruleName)) {
//                    $ruleName = $rule[0];
//                }
//                if($ruleName === self::RULE_REQUIRED && !$value) {
//                    $this->addError($attribute, self::RULE_REQUIRED);
//                }
//                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
//                    $this->addError($attribute, self::RULE_EMAIL);
//                }
//            }
//
//        }
//        return empty($this->errors);
//
//    }
//
//    public function addError(string $attribute, string $rule)
//    {
//        $message = $this->errorMsg()[$rule] ?? '';
//        $this->errors[$attribute][] = $message;
//    }
//
//    public function errorMsg()
//    {
//        return [
//                self::RULE_REQUIRED => 'This field is required.',
//                self::RULE_EMAIL => 'This must be valid E-mail address.',
//                self::RULE_MIN => 'Min length of this field must be {min}',
//                self::RULE_MAX => 'Max length of this field must be {max}',
//                self::RULE_MATCH => 'The password must match'
//            ];
//    }


}