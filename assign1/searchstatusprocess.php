<!DOCTYPE html>
<html>
<head>
<style>
body{
    background-color: darkgrey;
}
h1{
    color: orange;
}
p{
    color: orange;
}
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>status posting system </title>
</head>
<body>
<h1>Status posting system</h1>
<?php
    if(isset($_GET["statuscode"])){
        $statuscode = $_GET["statuscode"];
        $connection = mysqli_connect("cmslamp14.aut.ac.nz", "prq2929", "");
        if(mysqli_connect_errno()){
            echo "connection error" . "<br>";
            exit();
        }
        $query = "SELECT * FROM posts
        WHERE statuscode = $statuscode";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "ID: " . $row["id"] . ", statuscode: " . $row["statuscode"] . ", status: " . $row["status"] . ", visibility: " . $row["share"] . ", likes allowed: " . $row["allowlikes"] . ", comments allowed: " . $row["allowcomments"] . "sharing allowed: " . $row["allowsharing"] . "<br>";
            }
        }
        else{
            echo "no results matched your search <br>";
        }
    }
    else{
        echo "no results found <br>";
    }
?>
<a href="http://prq2929.cmslamp14.aut.ac.nz/assign1/searchstatusform.html";>search other status<br></a>
<a href="http://prq2929.cmslamp14.aut.ac.nz/assign1/index.html";>return to home page<br></a>


</body>
</html>
<!--http://prq2929.cmslamp14.aut.ac.nz/assign1/searchstatusprocess.php-->
