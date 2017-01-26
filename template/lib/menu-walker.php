<?php

class Primary_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 2, $args = [], $id = 0)
    {
        if (array_search('menu-item-has-children', $item->classes)) {
            $output .= sprintf( "\n<li class='menu__dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s</a>\n", (array_search('current-menu-item', $item->classes) || array_search('current-page-parent', $item->classes)) ? 'active' : '', $item->url, $item->title);
        } else {
            $output .= sprintf("\n<li %s><a href='%s'>%s</a>\n", (array_search('current-menu-item', $item->classes)) ? ' class="active"' : '', $item->url, $item->title);
        }
    }

    function start_lvl(&$output, $depth=2,$args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu__dropdown-menu\" role=\"menu\">\n";
    }
}

class Top_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 2, $args = [], $id = 0)
    {
        if (array_search('menu-item-has-children', $item->classes)) {
            $output .= sprintf("\n<li class='menu__dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s</a>\n", (array_search('current-menu-item', $item->classes) || array_search('current-page-parent', $item->classes)) ? 'active' : '', $item->url, $item->title);
        } else {
            $output .= sprintf("\n<li %s><a href='%s'>%s</a>\n", (array_search('current-menu-item', $item->classes)) ? ' class="active"' : '', $item->url, $item->title);
        }
    }

    function start_lvl(&$output, $depth=2,$args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu__dropdown-menu\" role=\"menu\">\n";
    }
}
