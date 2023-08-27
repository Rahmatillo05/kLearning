<?php

use yii\helpers\Url; ?>

<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= Url::to(['/teacher']) ?>" class="text-nowrap logo-img">
                <img src="<?= Url::base() ?>/module/images/logos/dark-logo.svg" width="180" alt=""/>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Asosiy</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/pupil/']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Bosh menu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/pupil/my-group']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-book-2"></i>
                        </span>
                        <span class="hide-menu">O'quv guruhlarim</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/pupil/dtm/index']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-a-b"></i>
                        </span>
                        <span class="hide-menu">DTM Tests</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
