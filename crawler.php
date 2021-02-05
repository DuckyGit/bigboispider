<?php
include_once('simple_html_dom.php');
$html = new simple_html_dom();
if(isset($_POST['crawl'])){
    $crawl = $_POST['target'];
    $find = "http://";
    if(strpos($crawl,$find)!==false){
    $html->load_file($crawl);
    foreach($html->find('a') as $link)
    {
        if(strpos($link,"$crawl")!==false){
            echo "<p class='links'>".$link->href."</p>";
        }
        else if(strpos($link,"http://")!==false || strpos($link,"https://")!==false){
            echo "<p class='links'>".$link->href."</p>";
        }
        else{
            echo "<p class='links'>"."$crawl/".$link->href."</p>";
        }
    }
    }
    else{
        echo "Invalid URL";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>BigBoiSpider</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<form method="post" action="crawler.php">
<p style="text-align:center;"><input type="text" name="target" class="input" /></p>
<p style="text-align:center;"><input type="submit" name="crawl" class="button" value="Release the spider!" /></p>
</form>
</body>
</html>
