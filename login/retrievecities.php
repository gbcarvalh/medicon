<?php

    $id = $_POST['id'];

    include_once "../common.php";
    include_once "../db.php";

    $query = "SELECT * FROM town WHERE state = ?";
    $stm = $db->prepare($query);
    $stm->bindParam(1, $id);

    if ($stm->execute()) {

        while ($row = $stm->fetch()) {
            $id = $row['id'];
            $name = $row['name'];

            print "<option value='$id'>$name</option>";
        }

    } else {
        print '<p>Erro ao listar cidades!</p>';
    }
?>
