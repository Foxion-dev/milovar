<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Milovar");
$APPLICATION->SetPageProperty("BODY_CLASS", "p-404");
?>

<section class="page404_content_block">
    <div class="container">
        <div class="page404_content">
            <h1>4 <img src="/local/templates/milovar/images/404/404zerrow.png" alt="0"> 4</h1>
            <p>Вы находитесь здесь, потому что ввели адрес страницы,<br>
                которая уже не существует или была перемещена по другому адресу.</p>
            <a href="/" class="goto-home">На главную</a>
        </div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>