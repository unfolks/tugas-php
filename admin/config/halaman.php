<?php 
    error_reporting(0);

    if($_GET['page']=='dashboard'){
        include 'halaman/dashboard/dashboard.php';
    }else if($_GET['page'] == 'news'){
        include 'halaman/news/news.php';
    }

?>