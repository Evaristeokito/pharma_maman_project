<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../public/assets/user-img/<?php echo $resultat['img'] ?>"
           alt="AdminLTE Logo"
           width="100" height="100" alt="User Image"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PHARMA 3.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="/profil">
            <img src="../public/assets/user-img/<?php echo $resultat['img'] ?> " class="img-circle elevation-2" width="70" height="50" alt="User Image">
          </a>
        </div>
        <div class="info">
          <a href="/profil" class="d-block text-uppercase">
            <?php echo $resultat['nom'] ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               GFS DASHBOARD
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "open" ? "menu-open" : ""); ?>">
            <a href="#" class="nav-link <?php echo ($link == "open" ? "active" : ""); ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                 MEDICAMENTS
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/produit" class="nav-link <?php echo ($page == "produit" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Creation</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/product_available" class="nav-link <?php echo ($page == "produit-available" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Disponible</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/produit-minimal" class="nav-link <?php echo ($page == "produit-minimal" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Repture</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/expiration" class="nav-link <?php echo ($page == "expiration" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>expires</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listeproduit" class="nav-link <?php echo ($page == "listprod" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Liste</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "op" ? "menu-open" : "") ?>">
            <a href="#" class="nav-link <?php echo ($link == "op" ? "active" : "") ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                ventes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/vente" class="nav-link <?php echo ($page == "vente" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>vente</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/vente-liste" class="nav-link <?php echo ($page == "vente-liste" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Liste de vente</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "com" ? "menu-open" : "") ?>">
            <a href="#" class="nav-link <?php echo ($link == "com" ? "active" : "") ?>">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Mes commd
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/commande" class="nav-link <?php echo ($page == "commande" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Nouvelle</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mes-commandes" class="nav-link <?php echo ($page == "mes-commandes" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>commandes</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/facture" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span>Mes factures</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "openLiv" ? "menu-open" : "") ?>">
            <a href="#" class="nav-link <?php echo ($link == "openLiv" ? "active" : "") ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Livraisons
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/livraison" class="nav-link <?php echo ($page == "mesLivraison" ? "active" : "") ?>">
                  <i class="far fa-edit nav-icon"></i>
                  <span>Mes livraisons</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/fournisseur" class="nav-link <?php echo ($page == 'fournisseur'? 'active' : null); ?>">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <span>Mes fournisseurs</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "openOrd" ? "menu-open" : "") ?>">
            <a href="#" class="nav-link <?php echo ($link == "openOrd" ? "active" : "") ?>">
              <i class="nav-icon fas fa-prescription-bottle-alt"></i>
              <p>
                Ordonnances
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ordonnace" class="nav-link <?php echo ($page == "ordonnance" ? "active" : "") ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <span>Creation</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="/statistique" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>Statistique</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="/inventaire" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Inventaire</p>
              </a>
          </li>
          <li class="nav-item has-treeview <?php echo ($link == "openPam" ? "menu-open" : "") ?>">
            <a href="#" class="nav-link <?php echo ($link == "openPam" ? "active" : "") ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Parametres
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/famille" class="nav-link <?php echo ($page == "parametre" ? "active" : ""); ?>">
                    <i class="nav-icon far fa-edit"></i>
                      <span>famille</span>
                </a>
             </li>
             <li class="nav-item">
              <a href="/format" class="nav-link <?php echo ($page == "format" ? "active" : ""); ?>">
                <i class="nav-icon far fa-edit"></i>
                   <span>Format</span>
             </a>
            </li>
            <li class="nav-item">
              <a href="/client" class="nav-link <?php echo ($page == "client" ? "active" : ""); ?>">
                <i class="nav-icon fas fa-users"></i>
                   <span>Client</span>
             </a>
            </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/utilisateurs" class="nav-link <?php echo ($page == "utilisateur" ? "active" : ""); ?>">
                <i class="nav-icon far fa-user"></i>
                 <p>utilisateurs</p>
             </a>
          </li>
          <li class="nav-item">
              <a href="/deconnection" class="nav-link">
                <i class="nav-icon fas fa-power-off text-danger"></i>
              <span>Deconnection</span>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
