<?php $page = substr(
        $_SERVER["SCRIPT_NAME"],
        strrpos($_SERVER["SCRIPT_NAME"], "/") + 1
    ); ?>


<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Chelsea FC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link <?= $page == "index.php"
                                            ? "active"
                                            : "" ?>" href="index">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <?php if ($_SESSION["auth_role"] == "2") : ?>

                        <a class="nav-link <?= $page ==
                                                "users.php"
                                                ? "active"
                                                : "" ?>" href="users">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Registered Users
                        </a>
                    <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "category_add.php" ||
                                                        $page == "category_view.php" ||
                                                        $page == "category_edit.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page ==
                                                "category_add.php" ||
                                                $page == "category_view.php" ||
                                                $page == "category_edit.php"
                                                ? "show"
                                                : "" ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "category_add.php"
                                                    ? "active"
                                                    : "" ?>" href="category_add">Add Category</a>
                            <a class="nav-link <?= $page ==
                                                    "category_view.php" ||
                                                    $page == "category_edit.php"
                                                    ? "active"
                                                    : "" ?>" href="category_view">View Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "post_add.php" ||
                                                        $page == "post_view.php" ||
                                                        $page == "post_edit.php" ||
                                                        $page == "post_history.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Posts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page == "post_add.php" ||
                                                $page == "post_view.php" ||
                                                $page == "post_edit.php" ||
                                                $page == "post_history.php"
                                                ? "show"
                                                : "" ?>" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "post_add.php"
                                                    ? "active"
                                                    : "" ?>" href="post_add">Add Posts</a>
                            <a class="nav-link <?= $page ==
                                                    "post_view.php" ||
                                                    $page == "post_edit.php" ||
                                                    $page == "post_history.php"
                                                    ? "active"
                                                    : "" ?>" href="post_view">View Posts</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "player_category_add.php" ||
                                                        $page == "player_category.php" ||
                                                        $page == "player_category_edit.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Player Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page ==
                                                "player_category_add.php" ||
                                                $page == "player_category.php" ||
                                                $page == "player_category_edit.php"
                                                ? "show"
                                                : "" ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "player_category_add.php"
                                                    ? "active"
                                                    : "" ?>" href="player_category_add">Add Player Category</a>
                            <a class="nav-link <?= $page ==
                                                    "player_category.php" ||
                                                    $page == "player_category_edit.php"
                                                    ? "active"
                                                    : "" ?>" href="player_category">View Player Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed <?= $page ==
                                                        "player_add.php" ||
                                                        $page == "player.php" ||
                                                        $page == "player_edit.php" ||
                                                        $page == "player_history.php"
                                                        ? "active"
                                                        : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Players
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?= $page == "player_add.php" ||
                                                $page == "player.php" ||
                                                $page == "player_edit.php" ||
                                                $page == "player_history.php"
                                                ? "show"
                                                : "" ?>" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= $page ==
                                                    "player_add.php"
                                                    ? "active"
                                                    : "" ?>" href="player_add">Add Players</a>
                            <a class="nav-link <?= $page ==
                                                    "player.php" ||
                                                    $page == "player_edit.php" ||
                                                    $page == "player_history.php"
                                                    ? "active"
                                                    : "" ?>" href="player">View Players</a>
                        </nav>
                    </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:
                                      <?php if (isset($_SESSION["auth_user"])): 
                                        $fullname = $_SESSION["auth_user"]["fname"].' '. $_SESSION["auth_user"]["lname"]
                                        ?> 

                   <a href="../logout.php"><?php echo $fullname; ?></a>
                   <?php else:?>
                    hello
                   <?php endif; ?>
</div>
                        Chelsea Admin Dashboard
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
