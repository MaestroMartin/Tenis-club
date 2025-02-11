<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/add.latte */
final class Template_c2752bafca extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/add.latte';

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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '2'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		foreach ($flashes as $flash) /* line 2 */ {
			echo '        <div class="alert alert-';
			echo LR\Filters::escapeHtmlAttr($flash->type) /* line 3 */;
			echo '">
            ';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 4 */;
			echo '
        </div>
';

		}

		echo '    <h1>Add New User</h1>
    ';
		$form = $this->global->formsStack[] = $this->global->uiControl['addForm'] /* line 8 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, []) /* line 8 */;
		echo '

        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('first_name', $this->global)->getControl() /* line 11 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('first_name', $this->global)->getLabel()) /* line 12 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('last_name', $this->global)->getControl() /* line 15 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('last_name', $this->global)->getLabel()) /* line 16 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getControl() /* line 19 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getLabel()) /* line 20 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl() /* line 23 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel()) /* line 24 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getControl() /* line 27 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getLabel()) /* line 28 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getControl() /* line 31 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getLabel()) /* line 32 */;
		echo '
        </div>
        <div class="form-group">
            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('color', $this->global)->getControl() /* line 35 */;
		echo '
            ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('color', $this->global)->getLabel()) /* line 36 */;
		echo '
            <small>When you choose for member/admin Color please push enter</small>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 40 */;

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
