<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-blue-500 underline"> <a href="/notes"> go back...</a></p>
            <p class="mt-5"><?= htmlspecialchars($note['body']) ?></p>

            <form class="mt-6" method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/footer.php') ?>
