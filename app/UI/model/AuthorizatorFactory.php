<?php

declare (strict_types=1);


namespace App\UI\Model;

use App\UI\Model\Entity\CommentResource;
use Nette\StaticClass;
use Nette\Security\Permission;
use App\UI\Model\Entity\Role;

class AuthorizatorFactory
{
    
    
    public static function create(): Permission
    {
    $acl = new Permission;

    // Přidání rolí
    $acl->addRole('guest');
    $acl->addRole('member', 'guest');
    $acl->addRole('admin', 'member');

    // Přidání zdrojů (resources)
    $acl->addResource('front'); // view, logout, register
    $acl->addResource('admin'); // view, logout
    $acl->addResource('reservation'); // Přidán zdroj reservation
    $acl->addResource('guest'); // view, login
    $acl->addResource('member'); // view, add

    // Pravidla přístupu
    $acl->deny('guest');
    $acl->allow('guest', 'front', 'view');
    $acl->allow('guest', 'reservation', 'view'); // Povolení přístupu k reservation
    $acl->allow('member', 'guest', 'login');
    $acl->allow('member', 'reservation', 'add');
    $acl->allow('member', 'member', 'add');

    return $acl;
    }
        

}