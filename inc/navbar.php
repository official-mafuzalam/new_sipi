<nav class="navbar sticky-top bg-body-tertiary" style="background-color: thistle">
    <div class="container-fluid">
        <div class="navbar-brand fs-6">

            <?php

            echo "User no: " . "<strong>" . $session_user_id . "</strong>";
            echo "  Name:" . " <strong>" . $session_user_name . "</strong>";

            ?>

        </div>
        <div class="d-flex" role="search">
            <a class="text-decoration-none" href="../logout.php">
                <i class="fs-5 bi-box-arrow-right"></i>
                <strong class="fs-6">Logout</strong>
            </a>
        </div>
    </div>
</nav>