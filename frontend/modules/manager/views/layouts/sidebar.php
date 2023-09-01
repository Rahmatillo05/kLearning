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
                    <span class="hide-menu">Bosh Sahifa</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/manager']) ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Bosh page</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User Controls</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/manager/user']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">O'quvchilar</span>
                    </a>
                    
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="<?= Url::to(['/manager/app/notification']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Qabulga yozilganlar</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Payment CONTROLS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= Url::to(['/manager/payment/']) ?>" aria-expanded="false">
                        <span>
                          <i class="ti ti-moneybag"></i>
                        </span>
                        <span class="hide-menu">Payments</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
