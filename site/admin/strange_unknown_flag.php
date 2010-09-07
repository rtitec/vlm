<?php
    $PAGETITLE = "Strange case : Boat with unknown flag";
    include ("htmlstart.php");
    include_once ("functions.php");
        
    if (get_cgi_var("action") == "go" and get_cgi_var('confirm') == "on" ) {
        wrapper_mysql_db_query_writer("UPDATE users SET country='000' WHERE country NOT IN (SELECT DISTINCT idflags FROM flags)");
        insertAdminChangelog(Array("operation" => "Update users with unknown flag"));
        echo "<h3>Done, following results should be empty.</h3>";
    }
    htmlQuery("SELECT idusers, username, boatname, class, country, from_unixtime(lastchange) AS lastchange FROM users WHERE country NOT IN (SELECT DISTINCT idflags FROM flags)");
?>
        <form action="#" method="post">
            <input type="hidden" name="action" value="go" />
            <input type="checkbox" name="confirm">
            <input type="submit" value="Clean it ?" />
        </form>
<?php
    include ("htmlend.php");
?>
