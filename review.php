<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.html"); // Redirect to login page
    exit();
}

// Read the pending reviews file
$pending_reviews = file('pending_reviews.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $index = $_POST['index'];

    if ($action === 'approve') {
        $approved_article = json_decode($pending_reviews[$index], true);
        
        // Move markdown to _posts
        rename($approved_article['markdown'], '_posts/' . basename($approved_article['markdown']));
        
        // Move display image to assets/images
        rename($approved_article['display_image'], 'assets/images/' . basename($approved_article['display_image']));

        // Move associated images (if any)
        foreach ($approved_article['images'] as $image) {
            rename($image, 'assets/images/' . basename($image));
        }
        
        // Remove approved article from pending list
        unset($pending_reviews[$index]);
        file_put_contents('pending_reviews.json', implode(PHP_EOL, $pending_reviews));
    } elseif ($action === 'reject') {
        // Remove rejected article from pending list
        unset($pending_reviews[$index]);
        file_put_contents('pending_reviews.json', implode(PHP_EOL, $pending_reviews));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Submissions | AI Insights Blog</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header>
        <h1>AI Insights Blog - Review Submissions</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="blog.html">Blog</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
        </nav>
    </header>

    <div class="container">
        <h2>Pending Articles</h2>
        <ul>
            <?php foreach ($pending_reviews as $index => $review): 
                $article = json_decode($review, true);
            ?>
            <li>
                <strong>Title:</strong> <?= $article['title']; ?> <br>
                <strong>Category:</strong> <?= $article['category']; ?> <br>
                <strong>Markdown File:</strong> <?= $article['markdown']; ?> <br>
                <form method="POST" action="review.php">
                    <input type="hidden" name="index" value="<?= $index; ?>">
                    <button type="submit" name="action" value="approve">Approve</button>
                    <button type="submit" name="action" value="reject">Reject</button>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <footer>
        <p>&copy; 2024 AI Insights Blog. All Rights Reserved.</p>
    </footer>
</body>
</html>
