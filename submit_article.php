<?php
// Directory to save the uploaded files
$target_dir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];

    // Save markdown file
    $markdown_file = $target_dir . basename($_FILES["markdown"]["name"]);
    move_uploaded_file($_FILES["markdown"]["tmp_name"], $markdown_file);

    // Save display image
    $display_image = $target_dir . basename($_FILES["display_image"]["name"]);
    move_uploaded_file($_FILES["display_image"]["tmp_name"], $display_image);

    // Handle associated images
    $image_files = [];
    foreach ($_FILES['images']['name'] as $key => $name) {
        $image_file = $target_dir . basename($name);
        move_uploaded_file($_FILES['images']['tmp_name'][$key], $image_file);
        $image_files[] = $image_file;
    }

    // Log this submission for admin review
    $log_entry = [
        'title' => $title,
        'category' => $category,
        'markdown' => $markdown_file,
        'display_image' => $display_image,
        'images' => $image_files
    ];
    file_put_contents('pending_reviews.json', json_encode($log_entry) . PHP_EOL, FILE_APPEND);

    echo "Article submitted for review!";
}
?>
