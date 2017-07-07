<?php
/**
 * @link https://github.com/himiklab/yii2-sitemap-module
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @var array $urls
 */
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$this->title = 'Sitemap'
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
            <?php foreach ($category as $cat): ?>
        <url>
            <loc><?= yii\helpers\Url::to('category/' . $cat->slug, true) ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>


        </url>
    <?php endforeach; ?>
    <?php foreach ($post as $value): ?>
        <url>
            <loc><?= yii\helpers\Url::to($value->slug, true) ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>


        </url>
    <?php endforeach; ?>
</urlset>
