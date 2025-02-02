<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Reservation/default.latte */
final class Template_f9968a3229 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Reservation/default.latte';

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

		echo '<!-- Layout for ReservationPresenter: Reservation List -->
';
		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['reservation' => '14'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 2 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="container">
    <h1>Reservations</h1>
    <table>
        <thead>
            <tr>
                <th>Court</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
';
		foreach ($reservations as $reservation) /* line 14 */ {
			echo '                <tr>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 16 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->date) /* line 17 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 18 */;
			echo ':00</td>
                </tr>
';

		}

		echo '        </tbody>
    </table>
    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('reservation:add')) /* line 23 */;
		echo '">Make a reservation</a>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .container {
            background-color: white; /* Ochrání sidebar před změnou */
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }

    </style>
    
</div>
';
	}
}
