<style>
    /* Added new styles to the nav menu elements to add flex layout. */
    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;

        display: flex;             
        align-items: center;        
        justify-content: space-between;
        flex-wrap: wrap;           
        gap: 10px;                 
    }

    nav li {
        display: flex;
        align-items: center;
    }

    .nav-logo {
        height: 50px;
        width: auto;
    }

    /* Align to column if window is below 700 pixels. */
    @media (max-width: 700px) {
        nav ul {
            flex-direction: column;
            align-items: flex-start;
        }

        nav a {
            font-size: 1.1rem;
            width: 100%;
        }
    }
</style>

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
        <li><a href="blog.php" class="<?= ($current_page === 'blog') ? 'current' : '' ?>">My Blog</a></li>
    </ul>
</nav>
