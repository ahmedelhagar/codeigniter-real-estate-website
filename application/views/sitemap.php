<?php header('Content-type: text/xml'); ?>
<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc> 
        <priority>1.0</priority>
    </url> 
    <?php
    if($records){foreach($records as $url) { ?>
    <url>
        <loc>
        <?php echo base_url().'page/'.$url->id; ?>
        </loc>
        <priority>1</priority>
    </url>
    <?php }} ?>
</urlset>