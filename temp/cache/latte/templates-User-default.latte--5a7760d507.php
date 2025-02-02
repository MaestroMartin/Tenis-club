<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/User/default.latte */
final class Template_5a7760d507 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/Presenters/templates/User/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '
<div class="container">
    <h1>User Management</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
';
		foreach ($users as $u) /* line 16 */ {
			echo '                <tr>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->id) /* line 18 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->username) /* line 19 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->email) /* line 20 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->role) /* line 21 */;
			echo '</td>
                    <td>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('edit', [$u->id])) /* line 23 */;
			echo '" class="btn btn-primary">Edit</a>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('delete!', [$u->id])) /* line 24 */;
			echo '" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
';

		}

		echo '        </tbody>
    </table>

    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:edit')) /* line 31 */;
		echo '" class="btn btn-success">Add New User</a>
</div>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['u' => '16'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
