/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//fade back to top button in and out
jQuery(document).ready(function() 
{
    var offset = 250;
    var duration = 1000;

    jQuery(window).scroll(function() 
    {
        if (jQuery(this).scrollTop() > offset) 
        {
            jQuery('.back-to-top').fadeIn(duration);
        } 
        else 
        {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) 
    {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
                 
