<!-- Fixed navbar -->
<nav class="bg-gray-700 fixed top-0 w-full z-50 text-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Navbar Header -->
            <div class="flex items-center">
                <a href="" class="text-white font-bold text-xl hover:text-gray-300 no-underline hover:no-underline">BACKOFFICE BOOK HUNTER</a>
            </div>

            <!-- Navbar Links -->
            <div class="flex">
                <a href="#" class="text-gray-300 hover:text-white px-3 py-2 no-underline hover:no-underline">DASHBOARD</a>
                <!-- Dropdown Menu -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-gray-300 hover:text-white px-3 py-2 no-underline hover:no-underline">
                        GESTION <span x-show="!open" class="text-white">&#9662;</span><span x-show="open" class="text-white">&#9652;</span>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-64 bg-gray-700 rounded-lg shadow-lg py-2 z-10">
                        <p class="px-4 py-2 text-gray-400 no-underline hover:no-underline">GESTION DES LIVRES</p>
                        <a href="books" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Liste des livres</a>
                        <a href="books/add" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Ajouter un livre</a>
                        <hr class="border-t border-gray-600 my-2">
                        <p class="px-4 py-2 text-gray-400 no-underline hover:no-underline">GESTION DES AUTEURS</p>
                        <a href="authors" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Liste des auteurs</a>
                        <a href="authors/add" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Ajouter un auteur</a>
                        <hr class="border-t border-gray-600 my-2">
                        <p class="px-4 py-2 text-gray-400 no-underline hover:no-underline">GESTION DES CATÉGORIES</p>
                        <a href="categories" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Liste des catégories</a>
                        <a href="categories/add" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Ajouter une catégorie</a>
                        <hr class="border-t border-gray-600 my-2">
                        <p class="px-4 py-2 text-gray-400 no-underline hover:no-underline">GESTION DES TAGS</p>
                        <a href="tags" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Liste des tags</a>
                        <a href="tags/add" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Ajouter un tag</a>
                        <hr class="border-t border-gray-600 my-2">
                        <p class="px-4 py-2 text-gray-400 no-underline hover:no-underline">GESTION DES UTILISATEURS</p>
                        <a href="users" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Liste des utilisateurs</a>
                        <a href="users/add" class="block px-4 py-2 text-gray-300 hover:text-white no-underline hover:no-underline">Ajouter un utilisateur</a>
                    </div>
                </div>
                <a href="users/logout" class="text-gray-300 hover:text-red-700 px-3 py-2 ml-4 no-underline hover:no-underline">Logout</a>
            </div>
        </div>
    </div>
</nav>