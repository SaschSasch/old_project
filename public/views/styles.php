<!DOCTYPE html>
<html lang="en">

<? include('../parts/head.php'); ?>

<body>

    <? include('../parts/presentation.php'); ?>
    <? include('../parts/navbar.php'); ?>

    <!-- Page Title -->
    <div class="page-title-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <i class="fa fa-camera-retro fa-2x"></i>
                    <h1>Styles /
                        <p>Современные стили одежды</p>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Стили -->
    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <?
            include('../../api/config/connect.php');
            $result = mysqli_query($connection_link,"SELECT Nomenclature_Id, Name_ru, Description FROM Taxon") or die(mysqli_error);
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                echo '<a href="style.php?idstyle='.$row['Nomenclature_Id'].'">
                <div class="col-xs-12 col-sm-4 col-md-3 portfolio-masonry" ';
                if ($index % 4 === 0) echo 'style="clear: both;"';
                echo'>
                        <div class="portfolio-box web-design">
                            <div class="portfolio-box-container">
                                <!-- <img class="center-block" src="'.$row['photo'].'" alt="" data-at2x="'.$row['photo'].'"> -->
                                <div class="portfolio-box-text">
                                    <h3 style="text-transform: capitalize;">'.$row['Name_ru'].'</h3>
                                    <p class="description">'.$row['Description'].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                ';
                $index++;
            }
        ?>

            </div>
        </div>
    </div>

    <? include('../parts/scripts.php'); ?>

</body>

</html>