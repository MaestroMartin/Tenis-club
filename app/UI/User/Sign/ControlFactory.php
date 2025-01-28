<?php

declare(strict_types=1);

namespace App\UI\User\Sign;


interface ControlFactory 
{

    public function create(callable $onSuccess): Control;
    
}