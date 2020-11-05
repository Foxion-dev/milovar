<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");
?>


<section class="milovar-catalog">
<div class="container">
	<div class="milivar-catalog-title">
        <h1><?$APPLICATION->ShowTitle(false);?></h1>
        <span class="milivar-catalog-title-colvo">(0)</span>

		<div class="view-catalog">
			<div class="view-catalog__title">
				 Вид каталога
			</div>

			<div class="sort-view">
                <a href="javascript:void(0);" class="sort-view__link sort-view__link-tab is-select"></a>
                <a href="javascript:void(0);" class="sort-view__link sort-view__link-pli"></a>
                <a href="javascript:void(0);" class="sort-view__link sort-view__link-gor"></a>
			</div>
		</div>
	</div>

	<div class="catalog-full">
		<div class="catalog-category">
			<div class="catalog-category__title">
				<h2 class="catalog-category__title-text">Категории</h2>


			</div>
		</div>


		<div class="catalog-right">
			<div class="catalog-right-title-category">
 <a class="filter new" href="#">Новинки</a> <a class="filter stock" href="#">В наличии</a>
				<div class="new-select">
					<select name="contry" id="country">
						<option value="">Страна-производитель (3)</option>
						<option value="">Россия</option>
						<option value="">Малайзия</option>
						<option value="">Германия</option>
						<option value="">Бельгия</option>
						<option value="">Франция</option>
					</select>
				</div>
				<div class="new-select">
					<select name="dobavki" id="dobavki">
						<option value="">Добавки</option>
						<option value="">Фрукты</option>
						<option value="">Лимон</option>
						<option value="">Алоэ</option>
					</select>
				</div>
				<div class="new-select">
					<select name="apoitment" id="apoitment">
						<option value="">Назначение</option>
						<option value="">Руки</option>
						<option value="">Ноги</option>
						<option value="">Тело</option>
					</select>
				</div>
				<div class="new-select">
					<select name="manufacturer" id="manufacturer">
						<option value="">Производитель</option>
						<option value="">Россия</option>
						<option value="">Малайзия</option>
						<option value="">Германия</option>
						<option value="">Бельгия</option>
						<option value="">Франция</option>
					</select>
				</div>
			</div>
			<div class="catalog-right-title-result">
				<p class="results">
					 Найдено 78 товаров по фильтрам: Новинки, Англия, Россия, Италия
				</p>
 <a class="btn-clear" href="#">Сбросить фильтры</a>
			</div>
			<div class="categ catalog-right-items">
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
				<div class="cat_item-content-item page_cat">
					<div class="cat_item-top-content page_cat">
						<div class="like">
						</div>
 <a href="card-tovar.html"> <img alt="bestseller" src="assets/images/home/hits-image.png"> </a> <span class="metka">New</span>
					</div>
					<div class="cat_item-bottom-content page_cat">
 <a href="card-tovar.html">
						<h5>Lorem ipsum dolor sit consectetur adipisicing elit consectetur adipisicing elit </h5>
 </a>
						<div class="bottom-func">
 <span class="fasov">Фасовка:</span>
							<select class="fas-select">
								<option>10гр. — 1 540 Р (2 540 Р)</option>
								<option>20гр. — 1 540 Р (2 540 Р)</option>
								<option>30гр. — 1 540 Р (2 540 Р)</option>
							</select>
							<div class="colvo">
 <button class="quan-minus">–</button> <input class="quan-num" type="number" min="1" max="10" value="1"> <button class="quan-plus">+</button>
							</div>
 <a href="#" class="into-basket">В корзину</a>
						</div>
					</div>
				</div>
			</div>
			<div class="catalog-paginacia">
				 <!-- Пагинация --> <a href="#" class="arrow-prev"></a>
				<div class="numbers-page">
 <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
					... <a href="#">22</a>
				</div>
 <a href="#" class="arrow-next"></a>
			</div>
		</div>
	</div>
</div>
 </section> <section class="milovar-catalog-info">
<div class="container">
	<div class="title-content">
		<h3>Деревянные формы</h3>
		<p>
			 Это самый классический вариант при изготовлении мыла с нуля. Их единственным недостатком является то, что потребуется потратить некоторое время на то, чтобы проложить форму бумагой, но даже в этом случае можно «схитрить» и приобрести вкладыш удобного размера, который подходит не только к «родному» пластиковому коробу, но и к большинству форм из дерева.
		</p>
	</div>
	<div class="advan-content">
		<h3>Преимущества деревянных форм для мыла</h3>
		<ul class="advantages">
			<li>За счет жестких стенок кусочки получаются с ровными гранями, в отличие от мыла из силиконовых форм, для которых необходимо дополнительно покупать или делать деревянную опалубку</li>
			<li>Дерево прекрасно проводит тепло, а значит мыло с нуля пройдет гель даже при не самых удачных условиях</li>
			<li>Все формы легко разбираются, что удобно для хранения, а также позволяет без проблем вытаскивать мыло и мыть саму форму</li>
		</ul>
	</div>
</div>
 </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>