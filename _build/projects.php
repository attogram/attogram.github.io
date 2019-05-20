<?php
// Attogram Website Configuration

$projects = [
    'EightQueens' => [
        'name'    => 'Eight Queens',
        'about'   => 'Eight Queens chess game.'
                      . ' Can you place 8 queens on the board with none under attack?'
                      . ' A web game inspired by the dreaded programmers interview question.',
        'tech'    => 'Javascript, React, Chessboard.jsx',
        'home'    => 'https://github.com/attogram/EightQueens',
        'demo'    => 'https://fosiper.com/games/EightQueens/',
        'start'   => '2019',
    ],
    'games' => [
        'name'    => 'Games Website Builder',
        'about'   => 'Your own games website, filled with open source goodness!  Automated installation of a plethora of open source web games.  Fully customizable.',
        'tech'    => 'PHP 7, Git',
        'home'    => 'https://github.com/attogram/games',
        'demo'    => 'https://fosiper.com/games/',
        'start'   => '2016',
    ],
    'currency-exchange-rates' => [
        'name'    => 'Currency Exchange Rates',
        'about'   => 'Currency Exchange Rates Website with data from: The European Central Bank, The Swiss National Bank, The Bank of Israel, The Central Bank of the Russian Federation, and The Reserve Bank of Australia.',
        'tech'    => 'PHP 7, SQLite, Financial APIs',
        'home'    => 'https://github.com/attogram/currency-exchange-rates',
        'demo'    => 'https://getitdaily.com/rates/',
        'start'   => '2019',
    ],
    'body-mass-info-table' => [
        'name'    => 'Body Mass Info Table',
        'about'   => 'Multi-weight Body Mass Index (BMI) table based on your height, age and sex, with calculated Body Fat/Lean Percentage, Base Metabolic Rate (BMR) and Total Daily Energy Expenditure (TDEE) for various activity levels.',
        'tech'    => 'PHP 7',
        'home'    => 'https://github.com/attogram/body-mass-info-table',
        'demo'    => 'https://getitdaily.com/body-mass-info-table/',
        'start'   => '2019',
    ],
    'shared-media-tagger' => [
        'name'    => 'Shared Media Tagger',
        'about'   => 'Crowdsourced ratings website for freely licensed images and media from Wikimedia Commons.',
        'tech'    => 'PHP, SQLite, Wikimedia API',
        'home'    => 'https://github.com/attogram/shared-media-tagger',
        'demo'    => 'https://fosiper.com/cats/',
        'start'   => '2017',
    ],
    'shared-media-api' => [
        'name'    => 'Shared Media API',
        'about'   => 'MediaWiki Query API wrapper that easily gets Category and Media file information into simple PHP arrays. Fine-tuned for WikiMedia Commmons.',
        'tech'    => 'PHP, MediaWiki API',
        'home'    => 'https://github.com/attogram/shared-media-api',
        'start'   => '2017',
    ],
    'router' => [
        'name'    => 'Attogram Router',
        'about'   => 'Attogram Router for PHP 7 - small, flexible, and surprisingly powerful.',
        'tech'    => 'PHP 7',
        'home'    => 'https://github.com/attogram/router',
        'demo'    => 'https://getitdaily.com/attogram-router/',
        'start'   => '2017',
    ],
    'clean-repo-games' => [
        'name'    => 'Clean Repo: Games',
        'about'   => 'Clean Repo: Games - a collaborative project to find and remove hidden tracking codes, advertising, trojans and excessive promotional content from open source game repositories.',
        'home'    => 'https://github.com/attogram/clean-repo-games',
        'demo'    => 'https://attogram.github.io/clean-repo-games/',
        'start'   => '2019',
    ],
    'ote' => [
        'name'    => 'Open Translation Engine',
        'about'   => 'A collaborative translation dictionary manager for the open content web.',
        'tech'    => 'PHP, SQLite / MySQL',
        'home'    => 'https://github.com/attogram/ote',
        'demo'    => 'https://ote.2meta.com/',
        'start'   => '2001',
    ],
    'randomosity-tester' => [
        'name'    => 'Randomosity Tester',
        'about'   => 'Frequency distribution and timings for PHP rand(), mt_rand(), random_int(), and SQLite ORDER BY RANDOM()',
        'tech'    => 'PHP, SQLite',
        'home'    => 'https://github.com/attogram/randomosity-tester',
        'demo'    => 'http://fosiper.com/random/',
        'start'   => '2017',
    ],
    'DAMS' => [
        'name'    => 'Dictionary Additions Management Systems',
        'about'   => 'Open content translation dictionary files.',
        'home'    => 'https://github.com/attogram/DAMS',
        'start'   => '2016',
    ],
    'react-tidbits' => [
        'name'    => 'React Tidbits',
        'about'   => 'React component to show ever changing content.',
        'tech'    => 'Javascript, React',
        'home'    => 'https://github.com/attogram/react-tidbits',
        'demo'    => 'https://attogram.github.io/react-tidbits/',
        'start'   => '2019',
    ],
    'github' => [
        'name'    => 'Attogram on Github',
        'about'   => 'Our Git repository service provider.'
                   . ' Started with the migration of the Open Translation Engine SVN repository from SourceForge.',
        'home'    => 'https://github.com/attogram',
        'start'   => '2014',
    ],
    'patreon' => [
        'name'    => 'Attogram on Patreon',
        'about'   => 'Support future developments!',
        'home'    => 'https://www.patreon.com/attogram',
    ],
];

$notReadyForPrimeTimePlayers = [
    'database' => [],
    'message-storage' => [],
    'random-image' => [],
    'yamwat' => [],
    'domdoodler' => [],
];
