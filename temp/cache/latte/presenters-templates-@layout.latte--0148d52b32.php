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
            <i class="bx bx-chevron-right toggle"></i>
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
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:default')) /* line 34 */;
		echo '">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('reservation:default')) /* line 40 */;
		echo '">
                            <i class="bx bx-bar-chart icon"></i>
                            <span class="text nav-text">reservation</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="">
                            <i class="bx bxs-contact icon"></i>
                            <span class="text nav-text">Contact</span>
                        </a>
                    </li>
';
		if ($user->isAllowed('front', 'logout')) /* line 51 */ {
			echo '			            <li class="nav-link">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 53 */;
			echo '"class="ajax">Odhlásit</a>
                        </li>
';
		} else /* line 55 */ {
			echo '			            <li class="nav-link">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:in')) /* line 57 */;
			echo '"class="ajax">Přihlásit</a>
                        </li>
';
		}
		echo '                </ul>
            </div>
        </div>
    </nav>
    <main>
';
		$this->renderBlock('content', [], 'html') /* line 65 */;
		echo '    </main>
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 67 */;
		echo '</body>
</html>
';
	}


	/** {block scripts} on line 67 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '    <script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
';
	}
}
