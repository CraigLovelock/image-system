<header>
    <div class="header-container">
        <a href="/" class="brand-section">
            <span>DoseOfStance</span>
        </a>
        <input type="checkbox" id="menu_collapse_icon" class="menu_collapse_icon">
        <label for="menu_collapse_icon" class="menu_collapse_icon_label">
        Menu
            <!--<div class="menu_bars">
                <div class="menu_bar"></div>
                <div class="menu_bar"></div>
                <div class="menu_bar"></div>
            </div>-->
        </label>
        <nav class="main-nav">
            <ul>
                <a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/" ? 'active' : '') ?>">
                	<li>Home / Top Voted</li>
                </a>
                <a href="/find" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/find" ? 'active' : '') ?>">
                	<li>Find</li>
                </a>
                <a href="mailto:hello@doseofstance.com" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/submit" ? 'active' : '') ?>">
                	<li>Submit Image</li>
                </a>
                <a href="mailto:hello@doseofstance.com" class="<?php echo ($_SERVER['REQUEST_URI'] ==="/contact" ? 'active' : '') ?>">
                	<li>Contact</li>
                </a>
            </ul>
        </nav>
</header>