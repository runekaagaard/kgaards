<?php
class FrontController {
    public $uri;
    public $pages = array(
        '' => array('title' => 'Produkter', 'inMenu' => TRUE, 'url' => '', 'file' => 'produkter.php'),
        'forhandlere' => array('title' => 'Forhandlere', 'inMenu' => TRUE, 'url' => 'forhandlere', 'file' => 'forhandlere.php'),
        'firmaet' => array('title' => 'Firmaet', 'inMenu' => TRUE, 'url' => 'firmaet', 'file' => 'firmaet.php'),
        'kontakt' => array('title' => 'Kontakt', 'inMenu' => TRUE, 'url' => 'kontakt', 'file' => 'kontakt.php'),
        '404' => array('title' => 'Kontakt', 'inMenu' => FALSE, 'url' => '404', 'file' => '404.php'),
        'produkter/boxy-pendel' => array('title' => 'Body pendel', 'inMenu' => FALSE, 'url' => FALSE, 'file' => 'produkt.php', 'image' => 'produktblad_boxy_pendel.jpg'),
        'produkter/boxy-color-sticks' => array('title' => 'Boxy color sticks', 'inMenu' => FALSE, 'url' => FALSE, 'file' => 'produkt.php', 'image' => 'produktblad_boxy_color_sticks.jpg'),
        'produkter/lampeophaeng' => array('title' => 'Point lampeophæng', 'inMenu' => FALSE, 'url' => FALSE, 'file' => 'produkt.php', 'image' => 'produktblad_lampeophaeng.jpg'),
    );
    public $page = array();
    public static function _() {
        static $fc = NULL;
        if (empty($fc)) $fc = new FrontController();
        return $fc;
    }
    function parseRequest() {
        $this->parseUri();
        $pageContent = $this->getPageContent();
        $menu = $this->getMenu();
        ob_start();
        require (KG_PATH . '/pages/index.php');
        return ob_get_clean();
    }

    function parseUri() {
        $this->uri = trim(preg_replace('[^a-z0-9-/]', "", $_SERVER['REQUEST_URI'])
            , '/');
        $this->page = !isset($this->pages[$this->uri])
            ? $this->pages['404']
            : $this->pages[$this->uri];
    }

    function getPageContent() {
        $page = KG_PATH . '/pages/404.php';
        $pageToCheck = KG_PATH . "/pages/{$this->page['file']}";
        if (file_exists($pageToCheck)) $page = $pageToCheck;
        ob_start();
        require ($page);
        return ob_get_clean();
    }

    function getMenu() {
        ob_start(); ?>
        <ul id="menu">
            <?foreach($this->pages as $uri => $page):?>
                <?if(!$page['inMenu']) continue?>
                <li class="menuItem<?=$uri == $this->uri ? ' active' : ''?>">
                    <a href="<?=!empty($page['url']) ? $page['url'] : "/$uri"?>">
                        <?=$page['title']?>
                    </a>
                </li>
            <?endforeach?>
        </ul>
        <? return ob_get_clean();
    }
}