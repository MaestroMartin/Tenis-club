<?php

declare (strict_types=1);

namespace App\Core;

use Nette\Application\UI\Form;


class FormFactory
{
    public function __construct(
        
    ){}


    public function create():Form
    {
        $form = new Form();

        $form->getElementPrototype()
        ->setAttribute('class','ajax')
        ->setAttribute('novalidate','novalidate');

        return $form;

    }
}