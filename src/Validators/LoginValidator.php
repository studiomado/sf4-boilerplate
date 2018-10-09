<?php

namespace App\Validators;

use Sensorario\Resources\Tools\Validator;
use Symfony\Component\HttpFoundation\RequestStack;

class LoginValidator
{
    private $validator;

    private $request;

    public function __construct(
        Validator $validator,
        RequestStack $stack
    ) {
        $this->validator = $validator;
        $this->request = $stack->getCurrentRequest();
    }

    public function validate()
    {
        $this->validator->setData(
            $this->request->request->all()
        );

        $this->validator->setConstraints(array(
            'mandatory' => array(
                'username',
                'password',
            )
        ));

        return $this->validator->validate();
    }

    public function error()
    {
        return $this->validator->error();
    }
}
