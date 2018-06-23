<?php

    function check_pass($sql, $conn, $password, $login)
    {
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res))
        {
            if ($row[login] == $login && $row[password] == $password){
                return (1);}
        }
        return (0);
    }