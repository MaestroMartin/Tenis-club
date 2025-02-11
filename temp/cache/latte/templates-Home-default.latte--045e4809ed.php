<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Home/default.latte */
final class Template_045e4809ed extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Home/default.latte';

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

		echo '
<div class="container">
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
';
		foreach ($reservations as $reservation) /* line 23 */ {
			echo '            <tr style="background-color:';
			echo LR\Filters::escapeHtmlQuotes($reservation->color) /* line 24 */;
			echo '">
                <div style="background-color:';
			echo LR\Filters::escapeHtmlQuotes($reservation->color) /* line 25 */;
			echo '">
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->id) /* line 26 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->user_id) /* line 27 */;
			echo '</td>
                    <td>Court ';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 28 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($reservation->date)) /* line 29 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 30 */;
			echo ':00</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->end_time) /* line 31 */;
			echo ':00</td>                        
                </div>
            </tr>
';

		}

		echo '    </table>
    <style>
        /* Obecné styly */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

p {
    text-align: center;
    color: #666;
}

/* Tabulka stylů */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.table th {
    background-color: #007BFF;
    color: white;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

/* Zajištění správného zobrazení dynamických barev */
.table tr div {
    padding: 10px;
    border-radius: 5px;
}

    </style>
        
    
</div>
';
	}
}
