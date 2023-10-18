<style>
     .form-check-input {
            border: 1px solid black;
        }
</style>

<header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
        <a href="../mrf/index.php" class="cd-logo"><img src="../assets/img/pcnlogo1.png" alt="Logo"></a>
    </div>
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>

    <ul class="cd-nav__list js-cd-nav__list">
        <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
            <a href="">
                <img src="../assets/img/cd-avatar.svg" alt="avatar">
                <span>Account</span>
            </a>
            <form action="" method="POST">
                <ul class="cd-nav__sub-list">
                    <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>
                    <li class="cd-nav__sub-item"><a href="../logout.php" class="btn btn-primary">Logout</a></li>
                </ul>
            </form>
        </li>
    </ul>
</header>

<main class="cd-main-content" style="width: 100%;">
    <nav class="cd-side-nav js-cd-side-nav">

        <ul class="cd-side__list js-cd-side__list">
            <form action="" method="POST">
                <li class="cd-side__label"><span>MRF ACTION</span></li>

                <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#mrfform"><i class="bi bi-ui-checks icon" style="margin-right: .5rem;"></i> MRF Form</button></li>
                <li class="cd-side__btn"><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST"><button type="button" class="btn" onclick="location.href = '../mrf/mrf_list.php'"><i class="bi bi-file-plus icon" style="margin-right: .5rem !important"></i> MRF List</button></form></li>
            </form>
        </ul>
    </nav>



