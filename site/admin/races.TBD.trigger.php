<?php
    require_once("functions.php");
    if (intval($this->rec) < 1) 
    {
        return False;
    }
    $res = $this->myQuery("SELECT count(*) as n FROM users WHERE engaged = '".$this->rec."';");
    $row = $this->sql_fetch_pdo();
    if (intval($row['n']) > 0) 
    {
        echo "<div class=\"adminwarnbox\">";
        echo "<h3>There are still players engaged in this race.</h3>";
        htmlQuery("select idusers, username, boatname, class, engaged, from_unixtime(lastchange) as lastchange from users where engaged = '".$this->rec."';");
        echo "<h3>Delete abort</h3>";
        echo "</div>";
        return False;
    } 
    else
    {
        return True;
    }
?>
