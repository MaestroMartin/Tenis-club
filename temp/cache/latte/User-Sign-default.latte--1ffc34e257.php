<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/User/Sign/default.latte */
final class Template_1ffc34e257 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/User/Sign/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!-- Layout for SignPresenter: Login Form -->
<div class="container" >
    <h1>Login</h1>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('form');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 4 */;

		echo '    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;  /* Horizontální centrování */
            align-items: center;      /* Vertikální centrování */
            background-color: #f8f9fa; /* Světlé pozadí */
        }

        .container {
            display: flex;
            flex-direction: column; /* Uspořádání prvků pod sebe */
            align-items: center; /* Centrovat obsah horizontálně */
            justify-content: center; /* Centrovat obsah vertikálně */
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Přizpůsob velikost */
            text-align: center;
    	    }
    </style>
</div>';
	}
}
