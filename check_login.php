<?php

    function check_login($sql, $conn, $login)
    {

        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res))
        {
            if ($row[login] == $login){
                return (0);
            }
        }
        return (1);
    }