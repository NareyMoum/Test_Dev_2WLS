<?php


// src/Validator/Constraints/ContainsUserValidator.php

namespace App\Validator\Constraints;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;


class ContainsUserValidator extends ConstraintValidator
{
    public $messageFormat = 'birthDate: birth date is not correct please put this format dd/mm/yyyy';
    public $messageAge = 'age: Age must be bigger then {{ age }}';
    public $mode = 'strict'; // If the constraint has configuration options, define them as public properties


    public  $repository ;

 public function  __construct(UserRepository $repository)
 {

     $this->repository = $repository;
 }

    public function validate($value, Constraint $constraint)
    {

        if (null === $value || '' === $value) {
            return;
        }

           $date  = \DateTime::createFromFormat('d/m/Y', $value->getBirthDate());

        // check date format
           if(!$date)
           {
              $this->context->buildViolation($this->messageFormat)
                ->setParameter('{{ string }}', $value->getBirthDate())
                 ->atPath('birthDate')
                 ->addViolation();

              return;
           }



     // check age validation
        $today = new \DateTime();
        $age = $today->diff($date);
        $ageYear = $age->y;


         if($value->getCountry() == 'morocco')
        {

            if($ageYear < 16)
            {
                $this->context->buildViolation($this->messageAge)
                    ->setParameter('{{ string }}', 16)
                    ->atPath('birthDate')
                    ->addViolation();
                return;
            }


        }else
        {
            if($ageYear < 16)
            {
                $this->context->buildViolation($this->messageAge)
                    ->setParameter('{{ age }}', 18)
                    ->atPath('birthDate')
                    ->addViolation();

                return;
            }
        }

         // check age average acceptance


       $countRows =  $this->repository->createQueryBuilder('user')
            ->select('count(user.id)')
            ->getQuery()
            ->getSingleScalarResult();

         if($countRows>10)
         {

//             $avgAge =  $this->repository->createQueryBuilder('user')
//                 ->select('AVG(unix_timestamp((CURRENT_DATE()) - unix_timestamp(user.birthDate)) ')
//                 ->getQuery()
//                 ->getSingleScalarResult();

         }

     }
}