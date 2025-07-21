<?php

return [
    'feeds' => [
    'main' => [
        'items' => [\App\Models\Blog::class, 'getFeedItems'], // <-- ini penting!
        'url' => '/feed', // atau bisa juga '/rss' tergantung rute yang kamu mau
        'title' => 'Blog Feed',
        'description' => 'Kumpulan artikel terbaru dari blog.',
        'language' => 'id-ID',
        'image' => '', // optional
        'format' => 'atom', // atau 'rss' kalau mau
        'view' => 'feed::atom',
        'type' => '',
        'contentType' => '',
    ],
],

];
