<nav>
    <ul>
        <li>
            <a href="index.php" class="<?= ($current_page === 'index') ? 'current' : '' ?>">
                <img src="images/FishIm.png" alt="Website Logo" class="nav-logo">
            </a>
        </li>
        <li><a href="my_vacation.php" class="<?= ($current_page === 'vacation') ? 'current' : '' ?>">My Dream Vacation</a></li>
        <li><a href="my_artistic_self.php" class="<?= ($current_page === 'art') ? 'current' : '' ?>">My Art</a></li>
        <li><a href="marketplace.php" class="<?= ($current_page === 'marketplace') ? 'current' : '' ?>">Marketplace</a></li>
        <li><a href="calculators.php" class="<?= ($current_page === 'calculators') ? 'current' : '' ?>">Calculators</a></li>
        <li><a href="my_form.php" class="<?= ($current_page === 'form') ? 'current' : '' ?>">Superhero Quiz</a></li>
        <li><a href="login.php" class="<?= ($current_page === 'login') ? 'current' : '' ?>">To-Do List</a></li>
    </ul>
</nav>
