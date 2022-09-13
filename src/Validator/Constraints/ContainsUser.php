<?php


// src/Validator/Constraints/ContainsUser.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsUser extends Constraint
{
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or numbers.';
}

