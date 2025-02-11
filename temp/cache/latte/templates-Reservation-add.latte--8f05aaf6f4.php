<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Reservation/add.latte */
final class Template_8f05aaf6f4 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Reservation/add.latte';

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

		echo '    <h2>Make a Reservation</h2>
';
		if ($user->isallowed('reservation', 'add')) /* line 3 */ {
			$ʟ_tmp = $this->global->uiControl->getComponent('reservationForm');
			if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
			$ʟ_tmp->render() /* line 4 */;

			echo '            <p>if you get back on add Reservation please change your time or court, please look on reservation, and then choose your Reservation. thank you  </p>
';
		}
		echo '    <style>
    h2 {
        text-align: center;
        color: #4CAF50;
        font-size: 24px;
        margin-bottom: 20px;
    }

/* Styl pro formulář */
    form {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Styl pro inputy a selecty */
    input, select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

/* Styl pro tlačítka */
    button, input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    p {
    font-size: 16px;
    color: #333;
    line-height: 1.5;s
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border-left: 15px solid #007BFF;
    border-radius: 4px;
    margin-left: 400px;
    margin-right:250px;
    
}

    button:hover, input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
';
	}
}
