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
                            <li class="cd-nav__sub-item"><button class="btn btn-primary button2" name="to_index" style="font-size:14;">Log out</button></li>
                        </ul>
                    </form>
                </li>
            </ul>
        </header>

        <main class="cd-main-content" style="width: 100%;">
            <nav class="cd-side-nav js-cd-side-nav">
                <ul class="cd-side__list js-cd-side__list">
                    <li class="cd-side__label" style="font-size:26"><span>MANPOWER REQUEST FORM MENU</span></li>
                    <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                        <a href="">REPORTS</a>

                        <ul class="cd-side__sub-list">

                            <form action="" method="POST">
                                <li class="cd-side__btn"><BUTTON class="btn" name="viewdatabase" style="font-size:14px; width:150px;height:50px">Presently Deployed</button></li>
                            </form>

                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>
                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>
                        </ul>
                    </li>

                    <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                        <ul class="cd-side__sub-list">
                            <form action="" method="POST">
                                <li class="cd-side__btn"><BUTTON class="btn" name="summarygender" style="font-size:14; width:150px;height:50px">Gender</button></li>
                            </form>
                            <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalgender">+ Gender</button></li>

                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>
                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>
                        </ul>
                    </li>

                </ul>

                <ul class="cd-side__list js-cd-side__list">
                    <form action="" method="POST">
                        <li class="cd-side__label"><span>MRF ACTION</span></li>

                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#mrfform"><i class="bi bi-ui-checks icon" style="margin-right: .5rem;"></i> MRF Form</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" onclick="location.href = '../mrf/mrf_list.php'"><i class="bi bi-file-plus icon" style="margin-right: .5rem !important"></i> MRF List</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_LOA"><i class="bi bi-person-lines-fill icon" style="margin-right: .5rem !important"></i> LOA</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_xletter"><i class="bi bi-envelope icon" style="margin-right: .5rem !important"></i> Excuse Letter</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalter"><i class="bi bi-terminal-x icon" style="margin-right: .5rem !important"></i> Terminate</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalres"><i class="bi bi-person-x icon" style="margin-right: .5rem !important"></i> Resign</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_retrench"><i class="bi bi-person-dash icon" style="margin-right: .5rem !important"></i> Retrench</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_float"><i class="bi bi-person-up icon" style="margin-right: .5rem !important"></i> Float</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalewb"><i class="bi bi-layer-forward icon" style="margin-right: .5rem !important"></i> Forward to EWB</button></li>
                    </form>
                </ul>
            </nav>