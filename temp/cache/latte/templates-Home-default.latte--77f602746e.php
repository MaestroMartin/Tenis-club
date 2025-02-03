<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Home/default.latte */
final class Template_77f602746e extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Home/default.latte';

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

		echo '<!-- Layout for HomePresenter: Welcome Page -->

';
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo "\n";
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['reservation' => '23'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="container">
    <h1>Welcome to Tennis Club</h1>
    <p>Manage your court reservations easily with our system.</p>
</div>

<div class="container">
    <h1>Court Reservations Overview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Reservation ID</th>
            <th>User ID</th>
            <th>Court</th>
            <th>Date</th>
            <th>Time</th>
            <th>End Time</th>
        </tr>
    </thead>
    <tbody class="table-body">
';
		foreach ($reservations as $reservation) /* line 23 */ {
			echo '            <tr>
                <td>';
			echo LR\Filters::escapeHtmlText($reservation->id) /* line 25 */;
			echo '</td>
                <td>';
			echo LR\Filters::escapeHtmlText($reservation->user_id) /* line 26 */;
			echo '</td>
                <td>Court ';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 27 */;
			echo '</td>
                <td>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($reservation->date)) /* line 28 */;
			echo '</td>
                <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 29 */;
			echo ':00</td>
                <td>';
			echo LR\Filters::escapeHtmlText($reservation->end_time) /* line 30 */;
			echo ':00</td>

            </tr>
';

		}

		echo '    </tbody>
    </table>
        
    <style>
    /* Celá stránka – vertikální a horizontální centrování */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrovat vše horizontálně */
            justify-content: center; /* Centrovat vertikálně */
            background-color: #f8f9fa;
        }

/* Centrované kontejnery */
        .container {
            text-align: center;
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
             margin-bottom: 20px;
        }

/* Tabulka – vycentrování a styl */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto; /* Centrovat tabulku */
}

/* Hlavička tabulky */
.table th {
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: center;
}

/* Řádky tabulky */
.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

/* Zebra efekt pro lepší čitelnost */
.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Přidání efektu při přejetí myší */
.table tbody tr:hover {
    background-color: #ddd;
    transition: 0.3s;
}
.junior { background-color: #4CAF50; } /* Zelená */
.senior { background-color: #2196F3; } /* Modrá */
.vip { background-color: #FFD700; } /* Zlatá */
.standard { background-color: #FF5722; } /* Oranžová */

    </style>
</div>
';
	}
}
