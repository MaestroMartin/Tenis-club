<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/default.latte */
final class Template_496d218b13 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/Desktop/Tenis-club/app/UI/FrontModul/presenters/templates/User/default.latte';

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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['u' => '18'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '<div class="container">
    <h1>User Management</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
';
		if ($user->isInRole('admin')) /* line 12 */ {
			echo '                    <th>Actions</th>
';
		}
		echo '            </tr>
        </thead>
        <tbody>
';
		foreach ($users as $u) /* line 18 */ {
			echo '                <tr>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->id) /* line 20 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->username) /* line 21 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->email) /* line 22 */;
			echo '</td>
                    <td>';
			echo LR\Filters::escapeHtmlText($u->role) /* line 23 */;
			echo '</td>
                    <td>
';
			if ($user->isInRole('admin')) /* line 25 */ {
				echo '                        <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('edit', [$u->id])) /* line 26 */;
				echo '" class="btn btn-primary">Edit</a>
';
			}
			echo "\n";
			if ($user->isInRole('admin')) /* line 29 */ {
				echo '                        <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('delete!', [$u->id])) /* line 30 */;
				echo '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\');">
                            Delete
                        </a>
                        
';
			}
			echo '                    
                    </td>
                </tr>
';

		}

		echo '        </tbody>
    </table>
';
		if ($user->isInRole('admin')) /* line 41 */ {
			echo '        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:add')) /* line 42 */;
			echo '">ad new User</a>
';
		}
		echo '    <style>
   .container {
        margin-left: 270px; 
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
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
