<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                            <div class="col-span-full">
                                <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                                <div class="mt-2">
                                    <textarea placeholder="Write a few sentences about Note..." id="note" name="note" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required><?= $_POST['note']?? "" ?></textarea>
                                    <?php if(isset($error['body'])): ?>
                                        <p class="text-red-700 text-xs mt-2"><?= $error['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </div>
    </main>
<?php require base_path('views/partials/footer.php') ?>