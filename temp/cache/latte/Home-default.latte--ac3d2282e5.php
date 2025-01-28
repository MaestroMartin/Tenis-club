<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/Home/default.latte */
final class Template_ac3d2282e5 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/Home/default.latte';

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

		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['reservation' => '22'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '    <div class="container">
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
                </tr>
            </thead>
            <tbody>
';
		foreach ($reservations as $reservation) /* line 22 */ {
			echo '                    <tr>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->id) /* line 24 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->user_id) /* line 25 */;
			echo '</td>
                        <td>Court ';
			echo LR\Filters::escapeHtmlText($reservation->court) /* line 26 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($reservation->date)) /* line 27 */;
			echo '</td>
                        <td>';
			echo LR\Filters::escapeHtmlText($reservation->time) /* line 28 */;
			echo ':00</td>
                    </tr>
';

		}

		echo '            </tbody>
        </table>
    </div>
';
	}
}
