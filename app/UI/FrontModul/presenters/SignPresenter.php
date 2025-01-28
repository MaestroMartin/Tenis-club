<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Presenters;


use App\UI\FrontModul\Presenters\SecurePresenterTrait;
use App\UI\Model\SignPresenter as ModelSignPresenter;
use App\UI\User\Sign\ControlFactory;
use App\UI\User\Sign\Control;


class SignPresenter extends ModelSignPresenter
{
    use SecurePresenterTrait;
    private string $storeRequestId = '';

    public function __construct(
        private ControlFactory $LogInControlFactory,
    )
    {
        parent::__construct();

    }

    public function createComponentLogIn(): Control
    {
        return $this->LogInControlFactory->create( function () {
            $this->redirect('Reservation:Default');
        });
    }
    public function actionIn(string $storeRequestId = '')
    {
        $this->storeRequestId = $storeRequestId ;
        if (!$storeRequestId) {
            $this->flashMessage('storeRequestId nebylo předáno nebo je prázdné.', 'error');
        }
        
    }

  
    
    public function actionOut()
    {
        $this->user->logout(true);
        $this->flashMessage('Odhlášení proběhlo úspěšně', 'success');
        $this->redirect('Home:');
    }
   
}