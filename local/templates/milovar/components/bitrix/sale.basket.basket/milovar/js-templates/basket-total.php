<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div class="basket-checkout-container" data-entity="basket-checkout-aligner">
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y'){
			?>

            <div id="coupon-modal" class="coupon-modal show-is">
                <div class="coupon-modal__box">
                    <div class="coupon-modal__close">
                        <span></span>
                    </div>

                    <div class="coupon-modal__title">
                        <span>Ввести промокод</span>
                    </div>

                    <div class="basket-coupon-section coupon-modal__body">
                        <div class="basket-coupon-block-field">
                            <div class="form">
                                <div class="form-group" style="position: relative;">
                                    <input type="text" class="form-control coupon-modal__body-input" id="" placeholder="Введите промокод" data-entity="basket-coupon-input">
                                    <span class=" basket-coupon-block-coupon-btn coupon-modal__body-but">Активировать</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
			<?
		}
		?>
		<div class="basket-checkout-section">
			<div class="basket-checkout-section-inner<?=(($arParams['HIDE_COUPON'] == 'Y') ? ' justify-content-between' : '')?>">
                <div class="basket-checkout-block basket-checkout-block-scidos">
                    <span class="basket-checkout-block-scidos__img"></span>
                    <div class="basket-checkout-block__info">
                        <span class="basket-checkout-block__title">Ваша скидка:</span>
                        <span class="basket-checkout-block__text">500 руб.</span>
                    </div>
                </div>

                <div class="basket-checkout-block basket-checkout-block-pred-scidos">
                    <div class="basket-checkout-block__info">
                        <span class="basket-checkout-block__title">До след. скидки:</span>
                        <span class="basket-checkout-block__text">14 500 руб.</span>
                    </div>
                </div>

                <div class="basket-checkout-block basket-checkout-block-sum">
                    <div class="basket-checkout-block__info">
                        <span class="basket-checkout-block__title">Сумма заказа:</span>
                        <span class="basket-checkout-block__text">14 500 руб.</span>
                    </div>
                </div>

				<div class="basket-checkout-block basket-checkout-block-total">
					<div class="basket-checkout-block-total-inner">
						<div class="basket-checkout-block-total-description">
                            <div class="basket-checkout-block__info">
                                <span class="basket-checkout-block__title">Вес заказа:</span>
                                <span class="basket-checkout-block__text">
                                    {{#WEIGHT_FORMATED}}
                                    {{{WEIGHT_FORMATED}}}
                                        {{#SHOW_VAT}}<br>{{/SHOW_VAT}}
                                    {{/WEIGHT_FORMATED}}

                                    {{#SHOW_VAT}}
                                        <?=Loc::getMessage('SBB_VAT')?>:{{{VAT_SUM_FORMATED}}}
                                    {{/SHOW_VAT}}
                                </span>
                            </div>
						</div>
					</div>
				</div>

				<div class="basket-checkout-block basket-checkout-block-total-price">
					<div class="basket-checkout-block-total-price-inner">
						{{#DISCOUNT_PRICE_FORMATED}}
							<div class="basket-coupon-block-total-price-old">
								{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}
							</div>
						{{/DISCOUNT_PRICE_FORMATED}}


						<div class="basket-coupon-block-total-price-current" data-entity="basket-total-price">
							{{{PRICE_FORMATED}}}
						</div>

						{{#DISCOUNT_PRICE_FORMATED}}
							<div class="basket-coupon-block-total-price-difference">
								<?=Loc::getMessage('SBB_BASKET_ITEM_ECONOMY')?>
								<span style="white-space: nowrap;">{{{DISCOUNT_PRICE_FORMATED}}}</span>
							</div>
						{{/DISCOUNT_PRICE_FORMATED}}
					</div>
				</div>

				<div class="basket-checkout-block basket-checkout-block-btn">
					<button class="btn btn-lg btn-primary basket-btn-checkout{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
						data-entity="basket-checkout-button">
						<?=Loc::getMessage('SBB_ORDER')?>
					</button>

                    <div class="button-promo">
                        <a href="#" class="button-promo-link js-modal-coupon">Ввести промокод</a>
                    </div>
				</div>
			</div>
		</div>

		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
		?>
			<div class="basket-coupon-alert-section">
				<div class="basket-coupon-alert-inner">
					{{#COUPON_LIST}}
					<div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
						<span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
					</div>
					{{/COUPON_LIST}}
				</div>
			</div>
			<?
		}
		?>
	</div>
</script>