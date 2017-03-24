<?php

/**
 * Builder Design Pattern.
 */

/**
 * Class AbstractPageBuilder
 */
abstract class AbstractPageBuilder
{
    /**
     * @return mixed
     */
    abstract function getPage();
}

/**
 * Class AbstractPageDirector
 */
abstract class AbstractPageDirector
{
    /**
     * AbstractPageDirector constructor.
     * @param AbstractPageBuilder $builder_in
     */
    abstract function __construct(AbstractPageBuilder $builder_in);

    /**
     * To Build Page.
     * @return mixed
     */
    abstract function buildPage();

    /**
     * To Get Page.
     * @return mixed
     */
    abstract function getPage();
}

/**
 * Class HTMLPage
 */
class HTMLPage
{
    /**
     * Overall Page.
     * @var null
     */
    private $page = NULL;

    /**
     * Page Title.
     * @var null
     */
    private $page_title = NULL;

    /**
     * Page Heading.
     * @var null
     */
    private $page_heading = NULL;

    /**
     * Page Text.
     * @var null
     */
    private $page_text = NULL;

    /**
     * HTMLPage constructor.
     */
    function __construct()
    {
    }

    /**
     * To Display Page.
     * @return null
     */
    function showPage()
    {
        return $this->page;
    }

    /**
     * To Set Page Title.
     * @param $title_in
     */
    function setTitle($title_in)
    {
        $this->page_title = $title_in;
    }

    /**
     * To Set Page Heading.
     * @param $heading_in
     */
    function setHeading($heading_in)
    {
        $this->page_heading = $heading_in;
    }

    /**
     * To Set Text.
     * @param $text_in
     */
    function setText($text_in)
    {
        $this->page_text .= $text_in;
    }

    /**
     * To Format Page for Display.
     */
    function formatPage()
    {
        // Update to Global Object.
        // Assign HTML data for Build Page.
        $this->page = '<html>';
        $this->page .= '<head><title>' . $this->page_title . '</title></head>';
        $this->page .= '<body>';
        $this->page .= '<h1>' . $this->page_heading . '</h1>';
        $this->page .= $this->page_text;
        $this->page .= '</body>';
        $this->page .= '</html>';
    }
}

/**
 * Class HTMLPageBuilder
 */
class HTMLPageBuilder extends AbstractPageBuilder
{
    /**
     * Page Variable.
     * @var HTMLPage|null
     */
    private $page = NULL;

    /**
     * HTMLPageBuilder constructor.
     */
    function __construct()
    {
        $this->page = new HTMLPage();
    }

    /**
     * To Set Page Title.
     * @param $title_in
     */
    function setTitle($title_in)
    {
        $this->page->setTitle($title_in);
    }

    /**
     * To Set Page Heading.
     * @param $heading_in
     */
    function setHeading($heading_in)
    {
        $this->page->setHeading($heading_in);
    }

    /**
     * To Set Page Text.
     * @param $text_in
     */
    function setText($text_in)
    {
        $this->page->setText($text_in);
    }

    /**
     * To Format Page.
     */
    function formatPage()
    {
        $this->page->formatPage();
    }

    /**
     * To Return Page.
     * @return HTMLPage|null
     */
    function getPage()
    {
        return $this->page;
    }
}

/**
 * Class HTMLPageDirector
 */
class HTMLPageDirector extends AbstractPageDirector
{
    /**
     * @var AbstractPageBuilder|null
     */
    private $builder = NULL;

    /**
     * HTMLPageDirector constructor.
     * @param AbstractPageBuilder $builder_in
     */
    public function __construct(AbstractPageBuilder $builder_in)
    {
        $this->builder = $builder_in;
    }

    /**
     * To Form the Building Page.
     */
    public function buildPage()
    {
        // Assigning template segment datas.
        $this->builder->setTitle('Testing the HTMLPage');
        $this->builder->setHeading('Testing the HTMLPage');
        $this->builder->setText('Testing, testing, testing!');
        $this->builder->setText('Testing, testing, testing, or!');
        $this->builder->setText('Testing, testing, testing, more!');
        $this->builder->formatPage();
    }

    /**
     * To Return Page.
     * @return mixed
     */
    public function getPage()
    {
         // Init Building Page.
        return $this->builder->getPage();
    }
}

// Init Builder.
$pageBuilder = new HTMLPageBuilder();
// Init Page Director Instance.
$pageDirector = new HTMLPageDirector($pageBuilder);
// To Init Building page.
$pageDirector->buildPage();
// To Get Page.
$page = $pageDirector->GetPage();
// To Populate Page.
echo $page->showPage();
