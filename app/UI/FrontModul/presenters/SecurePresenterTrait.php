<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Presenters;

use App\UI\Model\AuthorizatorFactory;
use Nette\Security\User;

Trait SecurePresenterTrait
{
    /**
     * @inject
     * 
     */
    public User $user;
   /**  public function __construct(
    *    protected User $user,
     *   
   * ){}
    */
    
    public function startup(): void
    {
        parent::startup();
    $acl = AuthorizatorFactory::create();
   // $acl->addResource('reservation');

    $roles = $this->user->getRoles();
    $isAllowed = false;
    foreach ($roles as $role) {
        if ($acl->isAllowed($role, 'reservation', 'view')) {
            $isAllowed = true;
            break;  
        }
    }
    if (!$isAllowed) {
        $this->flashMessage('Access denied.', 'error');
        $this->redirect('Sign:in');
        }
    }
}