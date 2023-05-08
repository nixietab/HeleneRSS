<!DOCTYPE html>
<html>
<head>
    <title>HeleneRSS</title>
    <style>
        body {
            background-color: black;
            font-family: Arial;
        }

        .feed-item {
        text-align: left;
        background-color: black;
        color: #c5c8c6;
        font-family: arial,helvetica,sans-serif;
        font-size: 10pt;
        margin-left: 0;
        margin-right: 0;
        margin-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
        }

        .feed-item h3 {
            color: #865DFF;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .feed-item h3:hover {
            color: #E384FF;
            transition-duration: 0.5s;
        }

        .feed-item a {
            color: #E384FF;
            font-weight: bold;
            text-decoration: none;
        }

        .feed-item a:hover {
            text-decoration: underline;
        }

        .feed-item p {
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <?php
    // Array of RSS Feed URLs
    $rss_urls = array(
        "RssURL1",
        "RssURL2",
        "RssURL3"
    );

    // Set the number of feed items to display
    $num_items = 0;

    // Loop through RSS feeds
    foreach ($rss_urls as $rss_url) {
        // Get RSS feed content
        $rss_content = file_get_contents($rss_url);

        // Parse RSS feed XML
        $rss = new SimpleXMLElement($rss_content);

        // Loop through RSS feed items
        foreach ($rss->channel->item as $item) {
            // Display feed item title, link, and description
            echo '<div class="feed-item">';
            echo '<a href="' . $item->link . '"><h3>' . $item->title . '</h3></a>';
            echo '<p>' . $item->description . '</p>';
            echo '</div>';
            
            // Exit loop after displaying the desired number of items
            if (--$num_items == 0) {
                break 2;
            }
        }
    }
    ?>
</body>
</html>
