<?php session_start(); ?>

<?php require "nav.php" ?>

<main class="loggedIn user_search">
    <section>
        <h1>Results for: <?php if (isset($_GET['userssearchresults']) && ($_GET['userssearchresults'] !== "")) {
                                require_once '../Classes/user_classes.php';
                                echo $_GET['userssearchresults'];
                                $chefs = User::searchChefs($_GET['userssearchresults']);
                            } else echo "no query given!"; ?></h1>
    </section>

    <section class="results">

        <?php for($i = 0; $i < 8; $i++): ?>

        <?php

            if (empty($chefs) || $_GET['userssearchresults'] === "") {
                echo "No records found!";
            } else {

                foreach ($chefs as $chef) {
            ?>

        <a class="results--item" href="other_user.php?username=<?php echo $chef->getUsername(); ?>">
            <div class="user_img">
                <?php
                $userId = $chef->getId();
                $jpegFilePath = "../uploads/{$userId}.jpg";
                $pngFilePath = "../uploads/{$userId}.png";

                if (file_exists($jpegFilePath)) {
                    echo "<img src='{$jpegFilePath}'>";
                } elseif (file_exists($pngFilePath)) {
                    echo "<img src='{$pngFilePath}'>";
                } else {
                    echo "<img src='../uploads/default_user.png'>";
                }
                ?>
            </div>
            <span>
                <?php echo $chef->getUsername(); ?>
            </span>
        </a>
        <?php
                }
            }
            ?>
        <?php endfor; ?>

    </section>
</main>