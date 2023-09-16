<?php session_start(); ?>

<?php require "nav.php" ?>

<main class="loggedIn">
    <section>
        <h1>Results for: <?php if (isset($_GET['userssearchresults']) && ($_GET['userssearchresults'] !== "")) {
                                require_once '../Classes/user_classes.php';
                                echo $_GET['userssearchresults'];
                                $chefs = User::searchChefs($_GET['userssearchresults']);
                            } else echo "no query given!"; ?></h1>
    </section>

    <section class="results">

        <div class="recipes_list">
            <?php

            if (empty($chefs) || $_GET['userssearchresults'] === "") {
                echo "No records found!";
            } else {

                foreach ($chefs as $chef) {
            ?>

          <a href="user.php?username=<?php echo $chef->getUsername(); ?>">
            <div class="popular_chefs--item">
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
                <?php echo $chef->getUsername(); ?>
            </div>
          </a>
            <?php
                }
            }
            ?>

        </div>

    </section>
</main>