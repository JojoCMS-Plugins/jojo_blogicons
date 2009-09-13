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

/* adds the blog icons after the body of the article */
Jojo::addHook('articleAfterBody', 'articleAfterBody', 'jojo_blogicons');

/* enable or disable blog icons */
$_options[] = array(
    'id'          => 'enableblogicons',
    'category'    => 'Articles',
    'label'       => 'Enable Blog icons',
    'description' => 'Enable / disable the display of blog icons.',
    'type'        => 'radio',
    'default'     => 'yes',
    'options'     => 'yes,no',
    'plugin'      => 'jojo_blogicons'
);

/* an option for listing your choice of blog icons */
$_options[] = array(
    'id'          => 'blogicons',
    'category'    => 'Articles',
    'label'       => 'Blog icons',
    'description' => 'A comma separated list of blog icons to show (in the order you want them to show). Available icons are digg, stumbleupon, delicious, technorati, blinklist, furl, reddit, sphinn or leave blank to show all.',
    'type'        => 'textarea',
    'default'     => '',
    'options'     => '',
    'plugin'      => 'jojo_blogicons'
);