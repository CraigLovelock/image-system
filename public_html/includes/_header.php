<header>
    <div class="header-container">
        <a href="/" class="brand-section">Dose Of Stance</a>
        <nav class="main-nav">
            <ul>
                <a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/" ? 'active' : '') ?>">
                	<li>Home</li>
                </a>
                <a href="/top" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/top" ? 'active' : '') ?>">
                	<li>Top Voted</li>
                </a>
                <a href="/top" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/submit" ? 'active' : '') ?>">
                	<li>Submit Image</li>
                </a>
                <a href="/top" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/contact" ? 'active' : '') ?>">
                	<li>Contact</li>
                </a>
            </ul>
        </nav>
</header>