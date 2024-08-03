<?php
$apiKey = 'YOUR_GOOGLE_API_KEY';
$placeId = 'ChIJQXLJVB6GNIQRfJWgbuwneVI';

function getReviews($apiKey, $placeId) {
    $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$placeId&key=$apiKey";
    $response = file_get_contents($url);
    $json = json_decode($response, true);

    return $json['result']['reviews'];
}

$reviews = getReviews($apiKey, $placeId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Reviews</title>
    <style>
        .review { border-bottom: 1px solid #ccc; padding: 10px 0; }
        .review:last-child { border-bottom: none; }
        .review-author { font-weight: bold; }
        .review-text { margin: 5px 0; }
        .review-rating { color: #f39c12; }
    </style>
</head>
<body>
    <h1>Google Reviews</h1>
    <?php foreach($reviews as $review): ?>
        <div class="review">
            <div class="review-author"><?= $review['author_name'] ?></div>
            <div class="review-rating"><?= str_repeat('★', $review['rating']) ?></div>
            <div class="review-text"><?= $review['text'] ?></div>
        </div>
    <?php endforeach; ?>
</body>
</html>
