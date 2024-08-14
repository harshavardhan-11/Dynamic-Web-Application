<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-blue-500 underline"> <a href="/notes"> go back...</a></p>
            <p class="mt-5"><?= $note['body'] ?></p>
        </div>
    </main>
<?php require('partials/footer.php') ?>