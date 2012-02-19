<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

class JOJO_Plugin_Jojo_blogicons extends JOJO_Plugin
{
    function articleAfterBody()
    {
        /* only show blog icons if the option is enabled */
        if (Jojo::getOption('enableblogicons') == 'no') return '';

        global $smarty;
        $url          = urlencode(_SITEURL.'/'._SITEURI.'/');
        @$jojo_article = $smarty->get_template_vars('jojo_article');
        $title        = rawurlencode($jojo_article['ar_title']);

        /* The HTML code for each of the different blog icons available */
        $available = array();
        //$available['digg'] = '<script type="text/javascript">digg_bgcolor = \'#ff9900\';digg_skin = \'compact\';digg_window = \'new\';</script><script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>';
        $available['digg']        = '<a href="http://digg.com/submit?phase=2&amp;url='.$url.'" title="Digg" rel="nofollow"><img src="images/digg.gif" alt="Digg" /></a>';
        $available['stumbleupon'] = '<a href="http://www.stumbleupon.com/submit?url='.$url.'&amp;title='.$title.'" title="StumbleUpon" rel="nofollow"><img src="images/stumbleit.gif" alt="StumbleUpon" /></a>';
        $available['delicious']   = '<a href="http://del.icio.us/post?url='.$url.'&amp;title='.$title.'" title="del.icio.us" rel="nofollow"><img src="images/delicious.gif" alt="del.icio.us" /></a>';
        $available['technorati']  = '<a href="http://technorati.com/cosmos/search.html?url='.$url.'" title="technorati" rel="nofollow"><img src="images/technorati.gif" alt="technorati" /></a>';
        $available['blinklist']   = '<a href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;url='.$url.'&amp;Title='.$title.'" title="blinklist" rel="nofollow"><img src="images/blinklist.gif" alt="blinklist" /></a>';
        $available['furl']        = '<a href="http://furl.net/storeIt.jsp?t='.$title.'&amp;u='.$url.'" title="furl" rel="nofollow"><img src="images/furl.gif" alt="furl" /></a>';
        $available['reddit']      = '<a href="http://reddit.com/submit?url='.$url.'&amp;title='.$title.'" title="reddit" rel="nofollow"><img src="images/reddit.gif" alt="reddit" /></a>';
        $available['sphinn']      = '<a href="http://www.sphinn.com/submit.php?url='.$url.'&amp;title='.$title.'" title="sphinn" rel="nofollow"><img src="images/sphinn.gif" alt="sphinn" /></a>';


        /* Read user preferences to see what icons we are including */
        $show = Jojo::getOption('blogicons');
        if (empty($show)) {
            /* no preference = default = show all */
            $icons = $available;
        } else {
            /* only show selected icons */
            $icons     = array();
            $available = explode(',', $available);
            foreach ($available as $icon) {
                $icon         = trim($icon);
                $icons[$icon] = $available[$icon];
            }
        }

        return '<div class="blogicons">' . implode(' ', $icons) . '</div>';
    }
}