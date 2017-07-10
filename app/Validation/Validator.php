<?php

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{

    protected $errors;

    /**
     * Validator
     *
     * @param $request
     * @param array $rules
     * @return $this
     */
    public function validate($request, array $rules)
    {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }

        }

        return $this;
    }

    /**
     * Is error
     * @return bool
     */
    public function failed(): bool
    {
        return !empty($this->errors);
    }

}