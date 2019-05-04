<?php
/**
 * A Template. Represent a folder, with template html files, images, css, and js
 * Resides in web/static/templates folder
 * A template must have html files with name matching PAGE_TYPES constant
 */

namespace app\models;


/**
 * Class Template
 * @package app\models
 * @property string name
 */
class Template
{
    public static $TEMPLATE_FOLDER = '/var/www/fac/web/static/templates/';//relative to current project site directory

    const DEFAULT_TEMPLATE = 'flattheme';
    const PAGE_TYPES = ['index', '404', 'about'];
    public $path = '';

    public function __construct($name = self::DEFAULT_TEMPLATE)
    {
        $this->name = $name;
        $this->path = self::$TEMPLATE_FOLDER . "$name/";
    }

    /**
     * Get html of a page in the template
     */
    public function getHtml($page_type): string
    {
        $cwd = getcwd();
        chdir($this->path);
        $html = @file_get_contents("$page_type.html");//exception throw
        chdir($cwd);
        return $html;
    }
}