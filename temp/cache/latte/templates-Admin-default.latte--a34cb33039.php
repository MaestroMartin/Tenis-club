<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/default.latte */
final class Template_a34cb33039 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/default.latte';

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
		echo '    ';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['reservation' => '17'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '    <div class="container">
        <h1>Admin Dashboard</h1>

        <h2>Reservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>User ID</th>
                    <th>Court</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
';
		foreach ($reservations as $reservation) /* line 17 */ {
			echo '                <tr style="background-color:';
			echo LR\Filters::escapeHtmlQuotes($reservation->color) /* line 18 */;
			echo '">
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->id) /* line 19 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->user_id) /* line 20 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 21 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->date) /* line 22 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 23 */;
			echo ':00</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($reservation->end_time) /* line 24 */;
			echo ':00</td>
                    <td>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteReservation!', [$reservation->id])) /* line 26 */;
			echo '" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
';

		}

		echo '        </table>

        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('admin:settings')) /* line 32 */;
		echo '" class="btn btn-primary">Settings</a>
        
        
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        
        .container {
            margin-left: 270px; /* Odsazení pro sidebar */
            padding: 20px;
            width: calc(100% - 270px);
        }
        h1, h2 {
            color: #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</div>
';
	}
}
