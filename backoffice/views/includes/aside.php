<aside id="layoutSidenav_nav">
    <nav class="ocn-sidenav accordion ocn-sidenav-dark" id="sidenavAccordion">
        <div class="ocn-sidenav-menu">
            <div class="nav">
                <div class="ocn-sidenav-menu-heading">
                    Core
                </div>
                <a href="dashboard" class="nav-link">
                    <div class="ocn-nav-link-icon">
                        <svg class="svg-inline--fa fa-tachometer-alt fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tachometer-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm0 64c14.71 0 26.58 10.13 30.32 23.65-1.11 2.26-2.64 4.23-3.45 6.67l-9.22 27.67c-5.13 3.49-10.97 6.01-17.64 6.01-17.67 0-32-14.33-32-32S270.33 96 288 96zM96 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm48-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm246.77-72.41l-61.33 184C343.13 347.33 352 364.54 352 384c0 11.72-3.38 22.55-8.88 32H232.88c-5.5-9.45-8.88-20.28-8.88-32 0-33.94 26.5-61.43 59.9-63.59l61.34-184.01c4.17-12.56 17.73-19.45 30.36-15.17 12.57 4.19 19.35 17.79 15.17 30.36zm14.66 57.2l15.52-46.55c3.47-1.29 7.13-2.23 11.05-2.23 17.67 0 32 14.33 32 32s-14.33 32-32 32c-11.38-.01-20.89-6.28-26.57-15.22zM480 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path>
                        </svg><!-- <i class="fas fa-tachometer-alt"></i> -->
                    </div>
                    Dashboard
                </a>

                <div class="ocn-sidenav-menu-heading">
                    Interface
                </div>

                <?php if($_SESSION['permission'] >= 1){ ?>
                    <a class="nav-link" role="button" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <div class="ocn-nav-link-icon">
                            <svg class="svg-inline--fa fa-columns fa-w-16" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="columns" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64V160h160v256zm224 0H288V160h160v256z">
                                </path>
                            </svg>
                        </div>    
                        Équipe
                        <div class="ocn-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down fa-w-10"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                </path>
                            </svg><!-- <i class="fas fa-angle-down"></i> -->
                        </div>
                    </a>

                    <div class="collapse" id="multiCollapseExample1">
                        <nav class="ocn-sidenav-menu-nested nav">
                            <a class="nav-link" href="addadmin">Géstion de l'équipe</a>
                            <a class="nav-link" href="#">Light Sidenav</a>
                        </nav>
                    </div>
                <?php } ?>

            </div>
        </div>
    </nav>
</aside>