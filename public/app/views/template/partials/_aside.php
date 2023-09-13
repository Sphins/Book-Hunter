<aside class="w-full md:w-1/4 p-3">
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <h2 class="font-bold text-lg mb-4">Categories</h2>
        <?php include_once '../app/views/categories/_index.php'; ?>
    </div>
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mt-4">
        <h2 class="font-bold text-lg mb-4">Tags</h2>
        <div class="tag-cloud">
            <?php include_once '../app/views/tags/_index.php'; ?>
        </div>
    </div>
</aside>