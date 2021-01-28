
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $site_set;
?>
            </main>

            <footer class="footer">
                <div class="container">
                    <div class="footer-content">
                        <div class="footer-logo-block">
                            <div class="footer__logo">
                                <a href="/" class="footer__link">
                                    <img src="<?= $site_set->site_logo ?>" alt="logo" class="footer__img">
                                </a>
                            </div>

                            <div class="footer-mail">
                                <span>По всем вопросам пишите нам: <a href='mailto:<?= $site_set->site_email ?>'><?= $site_set->site_email ?></a></span>
                            </div>

                            <div class="footer-icon">
                                <ul class="footer-icon__list">

                                    <?php if($site_set->soc_vk != ""): ?>
                                        <li class="footer-icon__item">
                                            <a href="<?= $site_set->soc_vk ?>" class="footer-icon__link soc_vk"></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($site_set->soc_tel != ""): ?>
                                        <li class="footer-icon__item">
                                            <a href="<?= $site_set->soc_tel ?>" class="footer-icon__link soc_tel"></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($site_set->soc_insta != ""): ?>
                                        <li class="footer-icon__item">
                                            <a href="<?= $site_set->soc_insta ?>" class="footer-icon__link soc_insta"></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($site_set->soc_yt != ""): ?>
                                        <li class="footer-icon__item">
                                            <a href="<?= $site_set->soc_yt ?>" class="footer-icon__link soc_yt"></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($site_set->soc_tt != ""): ?>
                                        <li class="footer-icon__item">
                                            <a href="<?= $site_set->soc_tt ?>" class="footer-icon__link soc_tt"></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-nav-block">
                            <ul class="foot-list">
                                <li class="foot-item">
                                    <a href="/catalog" class="foot-link">Каталог товаров</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Рецепты</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Статьи</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Новости</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Доставка и оплата</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Накопительные скидки</a>
                                </li>
                                <li class="foot-item">
                                    <a href="javascript:void(0);" class="foot-link">Помощь</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-contact-block">
                            <a href="tel:<?= str_replace([" ", "-", "(", ")"], "", $site_set->site_phone) ?>" class="big-number"><?= $site_set->site_phone ?></a>
                            <p>Обработка и сбор заказов: пн-вс: с 10-00  до 21-00</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="footer-prava">
                        <div class="footer-prava-block">
                            <span>© <?= date('Y', time()) ?> «Milovarpro.ru»</span>
                        </div>

                        <div class="footer-prava-block">
                            <a href="https://smsc.ru/" class="footer-prava-link" target="_blank">Наш SMS-провайдер</a>
                        </div>

                        <div class="footer-prava-block">
                            <a href="/privacy-policy" class="footer-prava-link">Политика конфиденциальности</a>
                        </div>

                        <div class="footer-prava-block">
                            <a href="https://german-web.org/" class="footer-prava-link">Разработка сайта <span>German Web</span></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>