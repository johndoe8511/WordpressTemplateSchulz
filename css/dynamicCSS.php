<?php
//$backgroundCSS = test();
header('Content-type: text/css');
//echo "TEST";
$backgroundCSS = testoo();
$backgroundCSS = "#FFEF72";
//$backgroundCSS = "#ffffff";
if(strpos($_SERVER['REQUEST_URI'], 'items') !== false)
        {
    
}
if(1==1)
{
    $backgroundCSS = "#ffffff";
}
else
{
    $backgroundCSS = "#FFEF72";
}
?>


html                
{ 
    background-color: <?=$backgroundCSS?> !important;
}
body                
{ 
    background-color: <?=$backgroundCSS?> !important;
}
#wrapper            { background-color: <?=$backgroundCSS?>;}
#contentWrapper     { background-color: <?=$backgroundCSS?>;}