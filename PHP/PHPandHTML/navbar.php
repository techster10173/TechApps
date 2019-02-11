<?php
$links = array(
    'Home' => 'http://sandboxcodes.com',
    'A post' => '?post=post1'
);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="color: white;">
    <a class="navbar-brand" href="">Grandhe News</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($links as $name => $link) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $link; ?>"><?php echo $name; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
