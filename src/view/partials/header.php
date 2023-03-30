<header class="header">
    <div class="flex">

        <nav class="navbar">
            <a href="/" class="logo">PCL</a>

            <!-- ======================= desktop header ================-->
            <div class="desktop-header">
                <div>
                    <a href="/a-propos"><i class="material-symbols-outlined">chat</i> <span>Messages</span></a>
                    <a href="#"><i class="material-symbols-outlined">notifications_active</i> <span>Mes recherches</span> </a>
                    <a href="#"><i class="material-symbols-outlined">favorite</i> <span>Favoris</span></a>
                </div>
                <div>
                    <div>
                        <button type="button"><i class="material-icons-sharp">add</i></button>
                    </div>
                    <div>
                        <form action="#">
                            <label for="search"><button type="submit"><i class="icon-magnifier"></i></button></label>
                            <input type="text" name="search" id="search" placeholder="Rechercher">
                        </form>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="/logout" id="user-btn"><i class="material-symbols-outlined">logout</i> <span>Se déconnecter</span></a>
                        <?php else : ?>
                        <button type="button">Connexion</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div>
                <i id="search-btn" class="icon-magnifier"></i>
                <i id="menu-btn" class="fa-solid fa-bars"></i>
            </div>


            <div class="profile">
                <div class="profile-img">
                    <img src="<?= publicFolder("images/fox.png") ?>" alt="profile">
                </div>
                <div class="profile-name">
                    <a href="#"><span>John Doe</span></a> 
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
        </nav>
    </div>
    <!-- ======================= mobile header ================-->
    <div class="small-header">
        <form action="#">
            <label for="search"><button type="submit"><i class="icon-magnifier"></i></button></label>
            <input type="text" name="search" id="search" placeholder="Rechercher">
        </form>
        <div>
            <a href="#"><i class="material-symbols-outlined">chat</i> <span>Messages</span></a>
            <a href="#"><i class="material-symbols-outlined">notifications_active</i> <span>Mes recherches</span> </a>
            <a href="#"><i class="material-symbols-outlined">favorite</i> <span>Favoris</span></a>
        </div>
        <div>
            <div>
                <button type="button">Ajouter une annonce</button>
                <button type="button">Connexion</button>
            </div>
        </div>
    </div>
</header>