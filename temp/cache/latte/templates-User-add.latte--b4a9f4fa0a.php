<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/add.latte */
final class Template_b4a9f4fa0a extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/add.latte';

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
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    ';
		$form = $this->global->formsStack[] = $this->global->uiControl['addForm'] /* line 2 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, []) /* line 2 */;
		echo '

        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getControl() /* line 5 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getLabel()) /* line 6 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl() /* line 9 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel()) /* line 10 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getControl() /* line 13 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getLabel()) /* line 14 */;
		echo '
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 17 */;

		echo '
    <style>

/* Hlavní kontejner - centrování vedle sidebaru */
.form-container {
    display: center;
    justify-content: center;
    align-items: center;
    height: 150vh; /* Celková výška */
    margin-right: 600; /* Posun kvůli sidebaru */
}

/* Styl formuláře */
form {
    width: 400px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Inputy a selecty */
input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Labely */
label {
    display: block;
    font-weight: bold;
    margin-top: 5px;
}

/* Tlačítko */
.btn-success {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

    </style>

';
	}
}
