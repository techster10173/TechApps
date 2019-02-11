<?php
$dir = "posts";
$files = scandir($dir);
$postNames = array();
foreach ($files as $i => $name) {
    if (strpos($name, ".php")) {
        $name = str_replace(".php", "", $name);
        $postNames[] = $name;
    }
}
?>

<?php foreach ($postNames as $i => $post) { ?>
    <a href="?post=<?php echo $post; ?>"><?php echo $post; ?></a>
    <br>
<?php } ?>
