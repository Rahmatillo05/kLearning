<?php

use yii\helpers\Url; ?>

<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= Url::home() ?>" class="text-nowrap logo-img">
                <img src="<?= Url::base() ?>/images/logos/dark-logo.svg" width="180" alt=""/>
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
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::home() ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User Controls</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/user']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/wait-list']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">Wait list</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Course Controls</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/category']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-category-2"></i>
                        </span>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/course']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu">Courses</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/room']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-door"></i>
                        </span>
                        <span class="hide-menu">Rooms</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/group']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Groups</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Dev tools</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['gii/']) ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-tools"></i>
                </span>
                        <span class="hide-menu">Gii</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
