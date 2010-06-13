<?php
class FrontController {
    public $uri;
    public $pages = array(
        '' => array('title' => 'Produkter', 'inMenu' => TRUE, 'url' => '', 'file' => 'produkter.php'),
        'forhandlere' => array('title' => 'Forhandlere', 'inMenu' => TRUE, 'url' => 'forhandlere', 'file' => 'forhandlere.php'),
        'firmaet' => array('title' => 'Firmaet', 'inMenu' => TRUE, 'url' => 'firmaet', 'file' => 'firmaet.php'),
        'kontakt' => array('title' => 'Kontakt', 'inMenu' => TRUE, 'url' => 'kontakt', 'file' => 'kontakt.php'),
        '404' => array('title' => 'Kontakt', 'inMenu' => FALSE, 'url' => '404', 'file' => '404.php'),
    );
    public $page = array();
    public static function _() {
        return new FrontController();
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