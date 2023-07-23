<?php

use yii\helpers\Url;
?>
<footer class="ftco-footer ftco-no-pt">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Biz haqimizda</h2>
                    <p>
                        Agar siz shifokor bo'lmoqchi bo'lsangiz albatta biologiya, kimyo fanlarini yaxshi bilishingiz kerak.
                        Xo'sh, bu bilim va ko'nikmalarni qayerda o'rganish mumkin deysizmi? Albatta Kelajak Academyda!
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <li class="ftco-animate">
                            <a href="https://t.me/kelajakacademy"><span class="fab fa-telegram"></span></a>
                        </li>
                        <!-- <li class="ftco-animate">
                            <a href="#"><span class="fab fa-facebook"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="#"><span class="fab fa-instagram"></span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Asosiy bo'limlarimiz</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= Url::to(['/main/about']) ?>" class="py-2 d-block">Biz haqimizda</a></li>
                        <li><a href="<?= Url::to(['/course/index']) ?>" class="py-2 d-block">Kurslar</a></li>
                        <li><a href="<?= Url::to(['/teachers/index']) ?>" class="py-2 d-block">O'qituvchilar</a></li>
                        <li><a href="<?= Url::to(['/main/contact']) ?>" class="py-2 d-block">Fikringiz</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Savollaringiz bormi?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon fa fa-map-marker"></span><span class="text">Farg‘ona viloyati, Yozyovon tumani, Yozyovon shahar pasyolkasi</span>
                            </li>
                            <li>
                                <a href="tel:+998996912230"><span class="icon fa fa-phone"></span><span class="text">+998 99 691 22 30</span></a>
                            </li>
                            <li>
                                <a href="mailto:aaa_22_30@mail.ru"><span class="icon fa fa-paper-plane"></span><span class="text">aaa_22_30@mail.ru</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This website is made with
                    <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://t.me/dreamteamcorp" target="_blank">Dream Team Corp</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>