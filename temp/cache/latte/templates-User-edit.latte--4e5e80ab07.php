<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/edit.latte */
final class Template_4e5e80ab07 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/edit.latte';

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

		echo '<div class="container">
   <h1>';
		echo LR\Filters::escapeHtmlText($editedUser) /* line 3 */;
		echo 'Edit User: ';
		echo LR\Filters::escapeHtmlText($editedUser->username) /* line 3 */;
		echo '</h1>

';
		if (isset($editedUser)) /* line 5 */ {
			echo '        ';
			$form = $this->global->formsStack[] = $this->global->uiControl['addForm'] /* line 6 */;
			Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, []) /* line 6 */;
			echo '
            <div class="form-group">
                ';
			echo Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getControl() /* line 8 */;
			echo '
                ';
			echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getLabel()) /* line 9 */;
			echo '
            </div>
            <div class="form-group">
                ';
			echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl() /* line 12 */;
			echo '
                ';
			echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel()) /* line 13 */;
			echo '
            </div>
            <div class="form-group">
                ';
			echo Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getControl() /* line 16 */;
			echo '
                ';
			echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getLabel()) /* line 17 */;
			echo '
            </div>
            <div class="form-group">
                ';
			echo Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getControl() /* line 20 */;
			echo '
                ';
			echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('role', $this->global)->getLabel()) /* line 21 */;
			echo '
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        ';
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 24 */;

			echo "\n";
		}
		echo '</div>
<style>
.container {
    margin-left: 270px; /* Odsazení kvůli sidebaru */
    max-width: 500px;
    margin-top: 50px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Nadpis */
h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Formulář */
form {
    width: 100%;
}

/* Formulářové skupiny */
.form-group {
    margin-bottom: 15px;
    text-align: left;
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
    margin-top: 10px;
}
</style>
';
	}
}
