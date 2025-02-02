<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/Reservation/default.latte */
final class Template_b523e92d49 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/Reservation/default.latte';

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
    <h2>Make a Reservation</h2>
';
		if ($user->isallowed('Reservation', 'add')) /* line 24 */ {
			$ʟ_tmp = $this->global->uiControl->getComponent('reservationForm');
			if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
			$ʟ_tmp->render() /* line 25 */;

		}
		echo '    
    
</div>
';
	}
}
