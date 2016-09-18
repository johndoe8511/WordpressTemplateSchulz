/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * change dropdown link background color when child is active
 */
$(function()
{
    //menu-item-Fachgebiete is the post_name property of the worpress post menu item 
    //changed in wordpress database table wp_posts column post_name
    if($("#menu-item-Fachgebiete li.active").length)
    {
        $('#NavLink_Fachgebiete').css({"background-color":"#23527c"});
    }
    else
    {
        $('#NavLink_Fachgebiete').css({"background-color":"##337ab7"});
    }
});