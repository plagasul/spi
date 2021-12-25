<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $site->title() . ' | ' . $page->title()->upper() ?></title>
        <meta name="description" content="...">
        <?= css('assets/css/build/build.css') ?>
        <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
        />
    </head>
    <body class="<?= $page->template() ?>" data-baseurl="<?= $site->url() ?>">