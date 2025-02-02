<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/default.latte */
final class Template_a34cb33039 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/Admin/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<div class="container">
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
		foreach ($reservations as $reservation) /* line 17 */ {
			echo '                <tr>
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
                    <td>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteReservation!', [$reservation->id])) /* line 25 */;
			echo '" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
';

		}

		echo '        </tbody>
    </table>

    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
';
		foreach ($users as $u) /* line 43 */ {
			echo '                <tr>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->id) /* line 45 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->username) /* line 46 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->role) /* line 47 */;
			echo '</td>
                    <td>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteUser!', [$u->id])) /* line 49 */;
			echo '" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
';

		}

		echo '        </tbody>
    </table>

    <h2>Settings</h2>
    <div>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('settingsForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 58 */;

		echo '    </div>
</div>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['reservation' => '17', 'u' => '43'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
