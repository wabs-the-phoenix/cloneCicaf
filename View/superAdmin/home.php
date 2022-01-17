<div id="nav-bar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left">
            <span class="sr-only">Basculer la sideBar</span>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </button>
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-bank"></i>
                    Stereo Compte
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav" style>
                <li class="light-blue">
                    <span id="dateNow">
                        <span id="dateDay"></span>
                        <span id="dateTime"></span>
                    </span>
                </li>
                <li class="light-blue dropdown-modal">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-user"></i> <?= $user->getNom() ?>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close" style>
                        <li>
                            <a href="/Update">
                                <i class="ace-icon fa fa-user"></i>
                                Profil
                            </a>
                            
                        </li>
                        <li>
                            <a href="/quit">
                                <i class="ace-icon fa fa-power-off"></i>
                                Deconnexion
                            </a>
                            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs"></div>
            <div class="page-content">
                <div class="page-header">
                    <h1>Accueil</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Voir les statistiques relatives aux entreprises
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="space-6">
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Entreprises crées</div>
                                <div class="panel-body">
                                        <div class="pad-4">
                                          <div class="fa fa-download text-primary fa-2x"></div>
                                          <span id="numberEntreCreated" class="statistique-value text-primary pad-left-10"></span>
                                          <div>
                                            <em class="bold">
                                                Toutes les entreprise actives
                                            </em>
                                          </div>
                                        </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">Entreprises Actives</div>
                                <div class="panel-body">
                                      <div class="pad-4">
                                        <div class="fa fa-toggle-on text-success fa-2x"></div>
                                        <span id="numberEntreActive" class="statistique-value text-success"></span>
                                        <div>
                                          <em class="bold">
                                              Toutes les entreprise actives
                                          </em>
                                        </div>
                                      </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading">Entreprises Bloquées</div>
                                <div class="panel-body">
                                      <div class="pad-4">
                                        <div class="fa fa-toggle-off text-danger fa-2x"></div>
                                        <span id="numberEntreBlocked" class="statistique-value text-danger"></span>
                                        <div>
                                          <em class="bold">
                                              Toutes les entreprise actives
                                          </em>
                                        </div>
                                      </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div id="pieEntreprises">
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>