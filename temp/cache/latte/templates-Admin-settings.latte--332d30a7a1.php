<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/settings.latte */
final class Template_332d30a7a1 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/settings.latte';

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

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		echo '
<style>
    .settings-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .settings-box {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    .settings-title {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
';
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <h2 class="settings-title">Settings</h2>
    <div class="settings-container">
        <div class="settings-box">
';
		$ʟ_tmp = $this->global->uiControl->getComponent('settingsForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 5 */;

		echo '        </div>
    </div>
    <style>
    .settings-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .settings-box {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    .settings-title {
        text-align: center;
        margin-bottom: 20px;
    }
</style>

';
	}
}
