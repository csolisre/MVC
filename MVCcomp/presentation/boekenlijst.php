<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE HTML>
<!-- presentation/boekenlijst.php -->
<html>
    <head>
        <meta charset=utf-8>
        <title>Boeken</title>
        <style>
            table { border-collapse: collapse; }
            td, th { border: 1px solid black; padding: 3px; }
            th { background-color: #ddd; }
        </style>
    </head>
    <body>
        <h1>Boekenlijst</h1>
        <table>
            <tr>
                <th>Titel</th>
                <th>Genre</th>
                <th>Delete Link</th>
            </tr>
            <?php
            foreach ($boekenLijst as $boek) {
                ?>
                <tr>
                    <td>
                        <?php print($boek->getTitel()); ?>
                    </td>
                    <td>
                        <?php print($boek->getGenre()->getGenreNaam());
                        ?>
                    </td>
                    <td>
                        <a href="verwijderboek.php?id=<?php print $boek->getId(); ?>">delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html> 

