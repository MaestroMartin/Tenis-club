<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Sign/in.latte */
final class Template_f8c4348977 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Sign/in.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!-- Layout for SignPresenter: Login Form -->
';
		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
	}


	/** {block content} on line 2 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <div class="container mx-auto">
        <h1>Login</h1>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('logIn');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 5 */;

		echo '    </div>
    
';
	}
}
