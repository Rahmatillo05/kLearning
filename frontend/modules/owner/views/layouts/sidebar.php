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
                    <span class="hide-menu">Menu</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner']) ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Bosh menu</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Foydalanuvchilar</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/teacher']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">O'qituvchilar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/user']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">O'quvchilar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/user']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Meneger</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/user']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Ota-onalar</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">DTM</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/dtm/subject']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-math"></i>
                        </span>
                        <span class="hide-menu">Subjects</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/owner/dtm']) ?>" aria-expanded="false">
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
