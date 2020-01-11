<?php
declare(strict_types = 1);

namespace Attogram\Projects;

use Exception;

use function count;
use function file_get_contents;
use function file_put_contents;
use function htmlentities;
use function is_dir;
use function is_readable;
use function is_string;
use function realpath;
use function str_replace;
use function strlen;

class AttogramWebsite
{
    const VERSION = '4.0.1';

    const LOGO_SUBDIRECTORY = 'logos';
    const LOGO_WIDTH = 320;
    const LOGO_HEIGHT = 160;

    /** @var string */
    private $title;
    /** @var string */
    private $headline;
    /** @var string */
    private $buildDirectory;
    /** @var string */
    private $homeDirectory;
    /** @var string */
    private $logoDirectory;
    /** @var string */
    private $templatesDirectory;
    /** @var string */
    private $customDirectory;
    /** @var array */
    private $projects;
    /* @var string */
    private $menu;
    /* @var string */
    private $css;
    /* @var string */
    private $header;
    /* @var string */
    private $footer;

    /**
     * AttogramWebsite constructor.
     * @throws Exception
     */
    public function __construct()
    {
        global $argc;

        $this->title = 'Attogram Projects Website';
        $this->verbose("\n{$this->title} Builder v" . self::VERSION);
        if ($argc === 1) {
            $this->verbose('Usage: php build.php [options]');
            $this->verbose('Options:');
            $this->verbose('    update   - Update projects website index.html');

            return;
        }
        $this->initDirectories();
        $this->initProjectList();
        $this->initTemplates();
        $this->buildMenu();
        $this->buildIndex();
    }

    /**
     * @throws Exception
     */
    private function initDirectories()
    {
        $this->buildDirectory = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR;
        $this->verbose('BUILD: ' . $this->buildDirectory);
        if (!is_dir($this->buildDirectory)) {
            throw new Exception('BUILD DIRECTORY NOT FOUND: ' . $this->buildDirectory);
        }

        $this->templatesDirectory = $this->buildDirectory . 'templates' . DIRECTORY_SEPARATOR;
        $this->verbose('TEMPLATES: ' . $this->templatesDirectory);

        $this->customDirectory = $this->buildDirectory . 'custom' . DIRECTORY_SEPARATOR;
        $this->verbose('CUSTOM: ' . $this->customDirectory);

        $this->homeDirectory = realpath($this->buildDirectory . '..') . DIRECTORY_SEPARATOR;
        $this->verbose('HOME: ' . $this->homeDirectory);
        if (!is_dir($this->homeDirectory)) {
            throw new Exception('HOME DIRECTORY NOT FOUND: ' . $this->homeDirectory);
        }

        $this->logoDirectory = $this->homeDirectory . self::LOGO_SUBDIRECTORY . DIRECTORY_SEPARATOR;
        $this->verbose('LOGO: ' . $this->logoDirectory);
    }

    /**
     * @throws Exception
     */
    private function initProjectList()
    {
        global $projects, $title, $headline;

        $projectsFile = 'projects.php';
        $projectsConfigFile = is_readable($this->customDirectory . $projectsFile)
            ? $this->customDirectory . $projectsFile
            : $this->buildDirectory . $projectsFile;
        $this->verbose('PROJECTS CONFIG: ' . $projectsConfigFile);
        if (!is_readable($projectsConfigFile)) {
            throw new Exception('PROJECTS CONFIG NOT FOUND: ' . $projectsConfigFile);
        }
        /** @noinspection PhpIncludeInspection */
        require_once $projectsConfigFile;

        $this->projects = (!empty($projects) && is_array($projects))
            ? $projects
            : [];
        $this->title = (!empty($title) && is_string($title))
            ? $title
            : $this->title;
        $this->headline = (!empty($headline) && is_string($headline))
            ? $headline
            : $this->title;
        $this->verbose('PROJECTS COUNT: ' . count($this->projects));
        $this->verbose('PAGE TITLE: ' . $this->title);
        $this->verbose('PAGE HEADLINE: ' . htmlentities($this->headline));
    }

    private function initTemplates()
    {
        $cssFile = 'css.css';
        $this->css = is_readable($this->customDirectory . $cssFile)
            ? file_get_contents($this->customDirectory . $cssFile)
            : file_get_contents($this->templatesDirectory . $cssFile);

        $headerFile = 'header.html';
        $this->header = is_readable($this->customDirectory . $headerFile)
            ? file_get_contents($this->customDirectory . $headerFile)
            : file_get_contents($this->templatesDirectory . $headerFile);
        $this->header = str_replace('{{CSS}}', "<style>{$this->css}</style>", $this->header);
        $this->header = str_replace('{{TITLE}}', $this->title, $this->header);
        $this->header = str_replace('{{HEADLINE}}', $this->headline, $this->header);

        $footerFile = 'footer.html';
        $this->footer = is_readable($this->customDirectory . $footerFile)
            ? file_get_contents($this->customDirectory . $footerFile)
            : file_get_contents($this->templatesDirectory . $footerFile);
        $this->footer = str_replace('{{VERSION}}', 'v' . self::VERSION, $this->footer);
        $this->footer = str_replace(
            '{{LASTUPDATED}}',
            gmdate('Y-m-d H:i:s') . ' UTC',
            $this->footer
        );
    }

    private function buildMenu()
    {
        $this->menu = '<div class="list">';
        foreach ($this->projects as $projectIndex => $projects) {
            $this->menu .= $this->getProjectMenu($projectIndex, $projects);
        }
        $this->menu .= '</div>';
        $this->verbose('BUILT MENU: ' . strlen($this->menu) . ' characters');
    }

    /**
     * @param string $projectIndex
     * @param array $project
     * @return string
     */
    private function getProjectMenu(string $projectIndex, array $project): string
    {
        $name = !empty($project['name'])
            ? $project['name']
            : '?';

        $about = !empty($project['about'])
            ? $project['about']
            : '?';

        $tech = !empty($project['tech'])
            ? $project['tech']
            : '';

        $home = !empty($project['home'])
            ? $project['home']
            : '';

        $demo = !empty($project['demo'])
            ? $project['demo']
            : '';

        $logo = is_readable($this->logoDirectory . $projectIndex . '.png')
            ? $projectIndex . '.png'
            : 'project.png';

        $start = !empty($project['start'])
            ? $project['start']
            : '';

        $mainLink = $home ?? $demo ?? '.';


        return '<div class="project">'
            . '<a href="' . $mainLink . '">'
            . '<img src="' . self::LOGO_SUBDIRECTORY . '/' . $logo . '" width="' . self::LOGO_WIDTH
                . '" height="' . self::LOGO_HEIGHT . '" alt="' . $project['name'] . '">'
            . '</a>'
            . '<div class="name"><a href="' . $mainLink . '">' . $name . '</a></div>'
            . '<div class="about">' . $about . '</div>'
            . ($tech ? '<div class="tech">Tech: ' . $tech . '</div>' : '')
            . ($home ? '<div class="home"><a href="' . $home . '">' . $name . ' <b>Project</b></a></div>': '')
            . ($demo ? '<div class="demo"><a href="' . $demo . '">' . $name . ' <b>Demo</b></a></div>': '')
            . ($start ? '<div class="start">Founded: ' . $start . '</div>': '')
            . '</div>';
    }

    private function buildIndex()
    {
        $this->write(
            $this->homeDirectory . 'index.html',
            $this->header . $this->menu . $this->footer
        );
    }

    /**
     * @param string $filename
     * @param string $contents
     */
    private function write(string $filename, string $contents)
    {
        $this->verbose("WRITING $filename");
        $wrote = file_put_contents($filename, $contents);
        $this->verbose("WROTE $wrote CHARACTERS");
        if (!$wrote) {
            $this->verbose("ERROR WRITING TO $filename");
            $this->verbose("DUMPING:\n\n$contents\n\n");
        }
    }

    /**
     * @param string $message
     */
    private function verbose(string $message)
    {
        print $message . "\n";
    }
}
