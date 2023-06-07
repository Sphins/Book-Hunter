<aside class="w-full md:w-1/4 p-3">
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <h2 class="font-bold text-lg mb-4">Categories</h2>
        <?php include_once '../app/views/categories/_index.php'; ?>
    </div>
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mt-4">
        <h2 class="font-bold text-lg mb-4">Tags</h2>
        <div class="tag-cloud">
            <a class="text-gray-300 hover:text-white text-sm" href="#">Action</a>
            <a class="text-gray-300 hover:text-white text-md" href="#">Comédie</a>
            <a class="text-gray-300 hover:text-white text-lg" href="#">Drame</a>
            <a class="text-gray-300 hover:text-white text-xl" href="#">Science-fiction</a>
        </div>
    </div>
</aside>