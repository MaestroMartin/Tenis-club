<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/@layout.latte */
final class Template_0148d52b32 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/FrontModul/presenters/templates/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tennis Club</title>
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */;
		echo '/static/css/style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    
    <!-- Sidebar -->
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="#" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Martin Pelisek</span>
                    <span class="profession">Web Developer</span>
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class="bx bx-search icon"></i>
                    <input type="search" placeholder="search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:default')) /* line 33 */;
		echo '">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('reservation:default')) /* line 39 */;
		echo '">
                            <i class="bx bx-bar-chart icon"></i>
                            <span class="text nav-text">reservation</span>
                        </a>
                    </li>
';
		if ($user->isLoggedIn()) /* line 44 */ {
			echo '                        <li class="nav-link">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:default')) /* line 46 */;
			echo '" class="ajax">
                                <i class="bx bx-user icon"></i>
                                <span class="text nav-text">User</span>
                            </a>
                        </li>
';
		}
		if ($user->isLoggedIn()) /* line 52 */ {
			echo '                        <li class="nav-link">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 54 */;
			echo '" class="ajax">
                                <i class="bx bx-log-out icon"></i>
                                <span class="text nav-text">Log out</span>
                            </a>
                        </li>
';
		} else /* line 59 */ {
			echo '                        <li class="nav-link">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:in')) /* line 61 */;
			echo '" class="ajax">
                                <i class="bx bx-log-in icon"></i>
                                <span class="text nav-text">Sign in</span>
                            </a>                            
                        </li>
';
		}
		echo '                </ul>
            </div>
        </div>
    </nav>
    <main>
';
		$this->renderBlock('content', [], 'html') /* line 72 */;
		echo '    </main>
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 74 */;
		echo '</body>
</html>
';
	}


	/** {block scripts} on line 74 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '    <script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
';
	}
}
