<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/User/add.latte */
final class Template_9ae11f9058 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/User/add.latte';

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

		echo '        <h1>Add New User</h1>
    ';
		$form = $this->global->formsStack[] = $this->global->uiControl['addForm'] /* line 3 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, []) /* line 3 */;
		echo '

        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('first_name', $this->global)->getControl() /* line 6 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('first_name', $this->global)->getLabel()) /* line 7 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('last_name', $this->global)->getControl() /* line 10 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('last_name', $this->global)->getLabel()) /* line 11 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getControl() /* line 14 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getLabel()) /* line 15 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl() /* line 18 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel()) /* line 19 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getControl() /* line 22 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getLabel()) /* line 23 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getControl() /* line 26 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getLabel()) /* line 27 */;
		echo '
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 30 */;

		echo '
    <style>

.container {
    margin-left: 270px; /* Odsazení kvůli sidebaru */
    max-width: 300px;
    margin-top: 50px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    }

    h1 {
        font-size: 24px;
        color: black;
        margin-bottom: 20px;
        text-align: center;
        margin-top: 50px;
    }

    form {
        width: 50%;
        margin: 0 auto;
        margin-top: 100px;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-top: 5px;
    }

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
        margin-top: 10px;
    }

    </style>

';
	}
}
