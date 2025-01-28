<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /mnt/c/Users/pelma/desktop/Tenis-club/app/UI/@layout.latte */
final class Template_db48dc5be1 extends Latte\Runtime\Template
{
	public const Source = '/mnt/c/Users/pelma/desktop/Tenis-club/app/UI/@layout.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title> Dashboard Sidebar Menu and Dark-Light Mode</title>
   
    <link rel="stylesheet" href="/static/css/style.css">
    <link href=\'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css\' rel=\'stylesheet\'>
    
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="#" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Martin Pelisek</span>
                    <span class="profession">Python Developer</span>
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
                        <a href="#">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bar-chart icon"></i>
                            <span class="text nav-text">My programs</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bxs-contact icon"></i>
                            <span class="text nav-text">Contact</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="login">
                            <i class="bx bx-log-in icon"></i>
                            <span class="text nav-text">Log in </span>
                            <link rel="stylesheet" href="login.html">
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-paper-plane icon"></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>    
                </ul>
            </div>
            <div class="bottom-content">
                <li class=" ">
                    <a href="#">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Log out</span>
                    </a>
				</li>
            </div>
        </div>
    </nav>
    <script src="/static/js/script.js"></script>
</body>

';
	}
}
