<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Интернет-магазин товаров для мыловарения, изготовления мыла ручной работы. У нас вы можете купить все для мыловарения с доставкой в Москве, Санкт-Петербурге и других регионах России.");
$APPLICATION->SetPageProperty("title", "Интернет-магазин мыловарения – Купить товары для мыла ручной работы в домашних условиях");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная");

$APPLICATION->SetPageProperty("BODY_CLASS", "home");

?>

<section class="head-content-block">
    <div class="container">
        <div class="head-title-block">
            <h1>Всё для <strong>мыловарения <br>и косметики</strong> ручной работы</h1>
            <a href="#" class="goto-catalog">Перейти в каталог</a>
        </div>
    </div>
</section>

<section class="home-catalog">
    <div class="container">
        <h2>Каталог продукции</h2>
        <div class="home-catalog-content">
            <div class="content-top">
                <a href="#" class="content-top-left">
                    <h5>Скидки</h5>
                    <p>Самые приятные цены в нашем каталоге</p>
                    <img src="/local/templates/milovar/images/home/catalog-sale.png" alt="sale">
                </a>
                <a href="#" class="content-top-right">
                    <h5>Новинки</h5>
                    <p>Самые приятные цены в нашем каталоге</p>
                    <img src="/local/templates/milovar/images/home/catalog-new.png" alt="new">
                </a>
            </div>
            <div class="content-bottom">
                <a href="#" class="content-bottom-item">
                    <h6>Масла</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item1.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Праздники</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item2.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Мыльная основа</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item3.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Масла</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item1.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Мыльная основа</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item3.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Масла</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item1.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Праздники</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item2.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Мыльная основа</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item3.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Масла</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item1.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Праздники</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item2.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Мыльная основа</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item3.png" alt="item">
                </a>
                <a href="#" class="content-bottom-item">
                    <h6>Масла</h6>
                    <img src="/local/templates/milovar/images/home/catalog-image-item1.png" alt="item">
                </a>
            </div>
            <a href="#" class="goto-catalog">Смотреть весь каталог</a>
        </div>
    </div>
</section>

<section class="home-about">
    <div class="container">
        <div class="about-content">
            <div class="about-content-left">
                <h2>О нашем магазине</h2>
                <p>На нашем сайте вы найдете не только все для мыловарения,
                    но и полезные статьи и рецепты, узнаете много интересного про составляющие мыла: эфирные и базовые масла, отдушки, различные добавки. Мы расскажем, как превратить обычную мыльную основу, беззапаха и цвета, в потрясающий подарок, в маленькое произведение искусства.<br><br>

                    Люди, которые следят за состоянием своего тела, особенно оценят мыловарение и изготовление косметики в домашних условиях.
                    Ведь вы можете добавлять не только перламутры, отдушки
                    и разнообразные пигменты, но и полезные составляющие,
                    оказывающие благотворное влияние на состояние кожи
                    волоси ногтей.</p>
            </div>
            <div class="about-content-right">
                <img src="/local/templates/milovar/images/home/about-image.png" alt="surprise-box">
            </div>
        </div>
    </div>
</section>

<section class="home-news">
    <div class="container">
        <h2>Новости</h2>

        <div class="home-news-content">
            <div class="news-content-item">
                <a href="#">
                    <img src="/local/templates/milovar/images/home/news-image.png" alt="news">
                    <span class="datanews">18.08.2020</span>
                    <h5>Вышел уже 21 выпуск марафона</h5>
                </a>
            </div>
            <div class="news-content-item">
                <a href="#">
                    <img src="/local/templates/milovar/images/home/news-image.png" alt="news">
                    <span class="datanews">18.08.2020</span>
                    <h5>Новый рецепт - Свеча из вощины</h5>
                </a>
            </div>
            <div class="news-content-item">
                <a href="#">
                    <img src="/local/templates/milovar/images/home/news-image.png" alt="news">
                    <span class="datanews">18.08.2020</span>
                    <h5>О нашем магазине</h5>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="home-masterclass">
    <div class="container">
        <div class="master-class-content">
            <h2>Наш мастер-класс</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation </p>
            <a href="#" class="goto-mc">Записаться</a>
        </div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>