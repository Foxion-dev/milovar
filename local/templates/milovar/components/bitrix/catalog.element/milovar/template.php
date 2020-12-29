<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//echo "<pre>",var_dump(),"</pre>";
?>

<div class="block-gallery-product">
    <div class="left-gallery">
        <div class="product-slider">
            <a class="prod-light-box" data-fancybox="gallery" rel="group" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </a>
            <a class="prod-light-box" data-fancybox="gallery" rel="group" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </a>
            <a class="prod-light-box" data-fancybox="gallery" rel="group" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </a>
            <a class="prod-light-box" data-fancybox="gallery" rel="group" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </a>
            <a class="prod-light-box" data-fancybox="gallery" rel="group" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </a>
        </div>

        <div class="product-slider-mini">
            <div class="slide-item">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </div>
            <div class="slide-item">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </div>
            <div class="slide-item">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </div>
            <div class="slide-item">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </div>
            <div class="slide-item">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="slide-item-img" alt="<?= $arResult["NAME"] ?>">
            </div>
        </div>
    </div>
    <div class="right-info">
        <div class="navigation-btn">
            <? if(isset($arResult['link_tovar']['prev'])): ?>
                <a class="prev-prod" href="<?= $arResult['link_tovar']['prev'] ?>">< Пред.</a>
            <? endif; ?>

            <? if(isset($arResult['link_tovar']['next'])): ?>
                <a class="next-prod" href="<?= $arResult['link_tovar']['next'] ?>">След. ></a>
            <? endif; ?>
        </div>

        <h3><?= $arResult["NAME"] ?></h3>
        <div class="specifications">
            <h6>Внешний вид: <span class="line-dotted"></span> <span>прозрачное твердое вещество</span></h6>
            <h6>Ионный характер: <span class="line-dotted"></span> <span>анионный</span></h6>
            <h6>Массовая доля воды: <span class="line-dotted"></span> <span>18 — 22 %</span></h6>
            <h6>рН: ( 2 % раствор): <span class="line-dotted"></span> <span>9,5 — 10.5</span></h6>
            <h6>Температура плавления: <span class="line-dotted"></span> <span>65-70°С</span></h6>
            <h6>Температура застывания: <span class="line-dotted"></span> <span>50-55°С</span></h6>
            <h6>Производитель: <span class="line-dotted"></span> <span>Россия</span></h6>
            <h6>Срок годности: <span class="line-dotted"></span> <span>24 месяца</span></h6>
            <h6>Lorem: <span class="line-dotted"></span> <span>Россия</span></h6>
            <h6>Lorem: <span class="line-dotted"></span> <span>24 месяца</span></h6>
        </div>

        <div class="fasov-colvo">
            <span class="fasov" >Фасовка:</span>

        </div>
        <div class="buy-price">
            <span class="price">4 490.00р</span>
            <div class="colvo">
                <button class="quan-minus">&ndash;</button>
                <input  class="quan-num" type="number" min="1" max="10" value="1">
                <button class="quan-plus">+</button>
            </div>
            <a href="#" class="into-basket">В корзину</a>
        </div>
    </div>
</div>

<div class="info-product-content">
    <h3>Описание товара</h3>
    <p>Мыльная основа Brilliant SLS Free предназначена для изготовления мыла ручной работы методом горячего плавления. Представляет собой однородную прозрачную массу без содержания Лаурил Сульфат Натрия и посторонних примесей. Мыльная основа brilliant (бриллиант) это идеальный выбор для тех, кто только начинает изучать мыло ручной работы. Несмотря на низкую стоимость, по качеству она сравнима
        с зарубежными аналогами. Основной ее особенностью является то, что она застывает чуть дольше других. А значит, у вас будет больше времени на введение добавок и заливку в форму Обладает высокой способностью пенообразования, нежно очищает кожу даря приятные ощущения, при этом
        не пересушивая ее. Отлично принимает масла и парфюмерные композиции. Сроки годности товаров, представленных на нашем сайте, начинаются от трех месяцев. Точную информацию о сроке годности отдельных товаров вы можете уточнить по электронной почте hello@milovarpro.ru, по телефону 8-800-301-5207 или в онлайн-чате. В случае, если вам пришел товар с меньшим сроком годности, напишите нам на электронную почту мы заменим его или вернем деньги.</p>

    <h3>Рекомендации для начинающих мыловаров:</h3>
    <ul>
        <li>Нарезайте мыльную основу кубиками со стороной примерно 0,5 -1 см.</li>
        <li>Первый раз мыло лучше плавить на водяной бане, а не в микроволновке – так оно плавится равномернее и нет шансов, что основа «убежит»</li>
        <li>Для придания мылу запаха можно добавить ароматизатор или отдушку. Вы можете добавить до 25 капель на 100 грамм мыла, в зависимости от того, какой по интенсивности запах хотите получить. Учтите, что после застывания мыло будет пахнуть чуть слабее.</li>
        <li>Окрашивать мыло можно любыми красителями, представленными в нашем ассортименте. Но имейте в виду, что пищевые красители могут со временем мигрировать при заливке многослойного мыла (один цвет будет перетекать в другой)</li>
        <li>Все отзывы о мыльной основе brilliant sls free – положительные. Она подходит для любого мыла ручной работы. Исключение составляет лишь мыло с вплавлениями – по прозрачности эта основа немного проигрывает английской и немецкой.</li>
        <li>Если Вы заливаете многослойное мыло, не забывайте каждый предыдущий слой «процарапывать» и сбрызгивать спиртом</li>
        <li>Для первых экспериментов лучше воспользоваться силиконовыми формами – из них легче достать готовое мыло</li>
        <li>Если сразу после заливки на поверхности мыла есть пузырьки – сбрызните их этиловым или муравьиным спиртом</li>
        <li>Наконец, не забудьте упаковать готовое мыло в пленку  – в противном случае оно со временем усохнет, на поверхности могут образоваться капельки воды и запах частично улетучится.</li>
        <li>ВНИМАНИЕ: С учетом усушки вес мыльной основы может колебаться от 940 до 1000 грамм</li>
    </ul>

    <h3>Дополнительная информация</h3>
    <ul>
        <li><a href="#">Экспертное заключение.jpg</a></li>
        <li><a href="#">Свид-во о гос.регистрации.jpg</a></li>
    </ul>

    <div class="grey-block">
        <p>Прозрачная мыльная основа «Brilliant SLS Free» производства Россия. Вы можете купить мыльную основу добавив товар
            в корзину, либо по бесплатному номеру: 8-(800)-350-20-57.</p>
        <p class="grey-label">Товар в наличии, доставка по Санкт-Петербургу, Москве и в другие регионы России</p>
    </div>


</div>