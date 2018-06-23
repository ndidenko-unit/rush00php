<?php

    function str_db($sql, $conn)
    {
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        return ($row);
    }