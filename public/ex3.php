<?php


include "../EntityManager.php";

$em = new EntityManager('localhost', 'app', 'root', '');
$user = $em->getUserRepository()->findOneById(1);
?>

<h1><?php echo $user->assembleDisplayName();?></h1>
<lu>
    <?php foreach($user->getPosts() as $post): ?>
            <li><?php echo $post->getTitle(); ?></li>
    <?php endforeach; ?>
</ul>