    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">BACKOFFICE BOOK HUNTER</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">DASHBOARD</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">GESTION DES LIVRES</li>
                            <li><a href="books">Liste des livres</a></li>
                            <li><a href="books/add">Ajouter un livres</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">GESTION DES AUTEURS</li>
                            <li><a href="authors">Liste des auteurs</a></li>
                            <li><a href="authors/add">Ajouter un auteurs</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">GESTION DES CATÉGORIES</li>
                            <li><a href="categories">Liste des catégories</a></li>
                            <li><a href="categories/add">Ajouter une catégorie</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">GESTION DES TAGS</li>
                            <li><a href="tags">Liste des tags</a></li>
                            <li><a href="tags/add">Ajouter un tag</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">GESTION DES UTILISATEURS</li>
                            <li><a href="users">Liste des utilisateurs</a></li>
                            <li><a href="users/add">Ajouter un utilisateur</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="users/logout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>