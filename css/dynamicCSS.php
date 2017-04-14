<?php
header('Content-type: text/css');
if(strpos($_SERVER['HTTP_REFERER'], '/allgemeine-wirtschaftslehre/') !== false)
{
    $backgroundCSS = "#FFFFE0";//lightyellow
}
else if(strpos($_SERVER['HTTP_REFERER'], '/arbeits-und-wirtschafts-sozialrecht/') !== false)
{
    $backgroundCSS = "#BCED91";//lightcyan
}
else if(strpos($_SERVER['HTTP_REFERER'], '/ausbildereignungspruefung/') !== false)
{
    $backgroundCSS = "#D3D3D3"; //lightgray
}
else if(strpos($_SERVER['HTTP_REFERER'], '/banklehre/') !== false)
{
    $backgroundCSS = "#BCED91";//lightcyan
}
else if(strpos($_SERVER['HTTP_REFERER'], '/betriebswirtschaftslehre/') !== false)
{
    $backgroundCSS = "#d0e2ec";//hellblau
}
else if(strpos($_SERVER['HTTP_REFERER'], '/bueroberufe/') !== false)
{
    $backgroundCSS = "#EBE5B0";//chamois
}
else if(strpos($_SERVER['HTTP_REFERER'], '/einfaches-und-kaufmaennisches-rechnen-ohne-rechnungswesen/') !== false)
{
    $backgroundCSS = "#ffb260";//madarine
}
else if(strpos($_SERVER['HTTP_REFERER'], '/existenzgruendung/') !== false)
{
    $backgroundCSS = "#ffc3ab";//lachs
}
else if(strpos($_SERVER['HTTP_REFERER'], '/finanzwirtschaft/') !== false)
{
    $backgroundCSS = "#d0e2ec";//hellblau
}
else if(strpos($_SERVER['HTTP_REFERER'], '/material-logistik-lagerwesen/') !== false)
{
    $backgroundCSS = "#f6deb2";//sand
}
else if(strpos($_SERVER['HTTP_REFERER'], '/personalwesen-wirtschaft/') !== false)
{
    $backgroundCSS = "#8faac5";//blue
}
else if(strpos($_SERVER['HTTP_REFERER'], '/rechnungswesen-bilanzierung-und-mehr/') !== false)
{
    $backgroundCSS = "#f3f380";//yellow
}
else if(strpos($_SERVER['HTTP_REFERER'], '/rechnungswesen-buchfuehrung/') !== false)
{
    $backgroundCSS = "#96cb49";//maigrün
}
else if(strpos($_SERVER['HTTP_REFERER'], '/rechnungswesen-controlling/') !== false)
{
    $backgroundCSS = "#f6deb2";//sand
}
else if(strpos($_SERVER['HTTP_REFERER'], '/rechnungswesen-kosten-und-leistungsrechnen/') !== false)
{
    $backgroundCSS = "#c8de9e";//lindgrün
}
else if(strpos($_SERVER['HTTP_REFERER'], '/spezielle-wirtschaftslehre/') !== false)
{
    $backgroundCSS = "#ffb260";//madarine
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-abgabenordnung/') !== false)
{
    $backgroundCSS = "#EBE5B0";//chamois
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-allgemeines/') !== false)
{
    $backgroundCSS = "#8faac5";//blue
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-berufsausbildung/') !== false)
{
    $backgroundCSS = "#ffc3ab";//lachs
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-einkommensteuer/') !== false)
{
    $backgroundCSS = "#f6f3be";//vanille
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-gesetzestexte/') !== false)
{
    $backgroundCSS = "#d0e2ec";//hellblau
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-gewerbe-und-koerperschaftssteuer/') !== false)
{
    $backgroundCSS = "#f3f380";//yellow
}
else if(strpos($_SERVER['HTTP_REFERER'], '/steuerlehre-umsatzsteuer/') !== false)
{
    $backgroundCSS = "#BCED91";//lightcyan
}
else if(strpos($_SERVER['HTTP_REFERER'], '/unternehmensbetreuung-und-management/') !== false)
{
    $backgroundCSS = "#BCED91";//lightcyan
}
else if(strpos($_SERVER['HTTP_REFERER'], '/volkswirtschaftslehre/') !== false)
{
    $backgroundCSS = "#d0e2ec";//hellblau
}
else if(strpos($_SERVER['HTTP_REFERER'], '/vermietung-verpachtung-wohnungs-und-immobilienwirtschaft/') !== false)
{
    $backgroundCSS = "#ffb260";//madarine
}
else
{
    $backgroundCSS = "#D3D3D3"; //lightgray
    /*$backgroundCSS = "#fff"; //lightgray*/
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