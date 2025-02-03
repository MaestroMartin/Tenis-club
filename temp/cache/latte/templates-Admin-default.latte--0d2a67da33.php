<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/Admin/default.latte */
final class Template_0d2a67da33 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/Admin/default.latte';

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
			foreach (array_intersect_key(['reservation' => '18'], $this->params) as $ʟ_v => $ʟ_l) {
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
            <tbody>
';
		foreach ($reservations as $reservation) /* line 18 */ {
			echo '                    <tr>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->id) /* line 20 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->user_id) /* line 21 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 22 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->date) /* line 23 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 24 */;
			echo ':00</td>
                        <td>
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteReservation!', [$reservation->id])) /* line 26 */;
			echo '" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
';

		}

		echo '            </tbody>
        </table>
        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('admin:add')) /* line 32 */;
		echo '" class="btn btn-success">Add New User</a>
        
    </div>
';
	}
}
