<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul class="mb-6">
                <?php foreach ($notes as $note): ?>
                    <li>
                        <a class="text-blue-500 hover:underline" href="/note?id=<?= $note['id'] ?>"> <?= htmlspecialchars($note['body']) ?></a>

                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="notes/create" class="mt-6">
                <button> Create Note </button>
            </a>
        </div>
    </main>
<?php require('partials/footer.php') ?>