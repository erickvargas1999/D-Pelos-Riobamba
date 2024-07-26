<?php
    $link = mysqli_connect("localhost","id21078063_dpelos","Carajo12345.") or die
    (mysqli_connect_error($link));

    if($link)
    {
        mysqli_select_db($link,"id21078063_dpelos");
    }

?>