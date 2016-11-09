<form class="form">
	<!-- TEMPLATE -->
	<div class="form-container" style="height: auto;">
		<div class="form-clearfix" style="border-top: 0px;">
			<span class="cc-text-medium form-text-header templates-show-hide-button">
				Template
				<i id="template-arrow-icon" class="fa fa-chevron-up" aria-hidden="true" style="float: right; line-height: 30px;"></i>
			</span>
		</div>
		<div class="template-show-hide">
			<div class="form-clearfix">
				<div class="form-caption-list-clearfix">
					<a id="product-title-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-title-icon" class="fa fa-times" aria-hidden="true"></i> Product Title
					</a>
					<a id="product-price-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-price-icon" class="fa fa-times" aria-hidden="true"></i> Product Price
					</a>
					<a id="product-comp-price-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-comp-price-icon" class="fa fa-times" aria-hidden="true"></i> Compare Price
					</a>
					<a id="product-type-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i  id="product-type-icon" class="fa fa-times" aria-hidden="true"></i> Product Type
					</a>
					<a id="product-url-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-url-icon" class="fa fa-times" aria-hidden="true"></i> Product Url
					</a>
					<a id="product-description-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-description-icon" class="fa fa-times" aria-hidden="true"></i> Description
					</a>
					<a id="product-collection-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-collection-icon" class="fa fa-times" aria-hidden="true"></i> Collection Title
					</a>
					<a id="product-percent-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-percent-icon" class="fa fa-times" aria-hidden="true"></i> Precent Off
					</a>
					<a id="product-dollars-btn" href="javascript:void(0)" class="button-three-col grey-button">
						<i id="product-dollars-icon" class="fa fa-times" aria-hidden="true"></i> Dollars Saved
					</a>
				</div>
			</div>
			<div class="form-clearfix">
				<span class="cc-text-small">Caption for: Facebook, Google+, Pinterest</span>
				<div class="caption-textarea-container">
					<textarea id="caption-textarea-large" class="caption-textarea"></textarea>
				</div>
				<span class="cc-text-small">Caption for: Twitter (Character Limit: 140)</span>
				<div class="caption-textarea-container" style="margin-bottom: 0px;">
					<textarea id="caption-textarea-small" class="caption-textarea"></textarea>
				</div>
			</div>
		</div>
	</div>
	<!-- CONDITIONS -->
	<div class="form-container">
		<div class="form-clearfix" style="border-top: 0px;">

			<span class="cc-text-medium form-text-header conditions-show-hide-button">
				Conditions
				<i id="condition-arrow-icon" class="fa fa-chevron-up" aria-hidden="true" style="float: right; line-height: 30px;"></i>
			</span>

		</div>
		<div class="conditions-show-hide">
			<div class="form-clearfix">
				<div class="form-3col-clearfix">
					<span>Products must match: </span>
				</div>
				<div class="form-3col-clearfix">
					<input type="checkbox" name="all-conditions" value="all" style="margin-right: 10px;"/>All conditions
				</div>
				<div class="form-3col-clearfix">
					<input type="checkbox" name="any-conditions" value="any" style="margin-right: 10px;"/>Any condition
				</div>
			</div>
			<div class="form-clearfix">
				<div class="form-3col-clearfix">
					<select class="form-select">
						<option>Collection Title</option>
						<option>Product Title</option>
						<option>Product Type</option>
						<option>Product Vendor</option>
						<option>Product Price</option>
						<option>Product Tag</option>
						<option>Compare At Price</option>
						<option>Weight</option>
						<option>Inventory Stock</option>
						<option>Varient Title</option>
					</select>
				</div>
				<div class="form-3col-clearfix">
					<select class="form-select">
						<option>is equal to</option>
						<option>is not equal to</option>
						<option>is greater than</option>
						<option>is less than</option>
						<option>starts with</option>
						<option>ends with</option>
						<option>contains</option>
						<option>does not contain</option>
					</select>
				</div>
				<div class="form-3col-clearfix">
					<input class="form-input" type="text-box" placeholder="Enter condition"/>
				</div>
			</div>
			<div class="form-clearfix">
				<a href="#" class="add-condition-button"><i class="fa fa-plus" aria-hidden="true"></i> Add another condition</a>
			</div>
		</div>

	</div>
	<!-- PRODUCTS -->
	<div class="form-container">
		<div class="form-clearfix" style="border-top: 0px;">
			<span class="cc-text-medium form-text-header products-show-hide-button">
				Products
			</span>
		</div>
	</div>
	<!-- PRODUCT LIST -->

	<!-- HTML Content for Product END    -->

</form>

<script>

var $productTitle = "{{ product.title }}";
var $productPrice = "{{ product.price }}";
var $productComparePrice = "{{ product.compareprice }}";
var $productType = "{{ product.type }}";
var $productUrl = "{{ product.url }}";
var $productDescription = "{{ product.description }}";
var $collectionTitle = "{{ collection.title }}";
var $percentOff = "{{ percent.off }}";
var $dollarsOff = "{{ dollars.off }}";

var $textAreaLarge = $("#caption-textarea-large");

$('#product-title-btn').click(function(){
	if ($("#product-title-btn").hasClass('grey-button')) {
		$($textAreaLarge).val($($textAreaLarge).val() + $productTitle);
		$("#product-title-btn").removeClass("grey-button");
		$("#product-title-btn").addClass("green-button");
		$("#product-title-icon").removeClass("fa-times");
		$("#product-title-icon").addClass("fa-check");
	} else if ($("#product-title-btn").hasClass('green-button')) {
		$('#caption-textarea-large').val(" ");
		$("#product-title-btn").removeClass("green-button");
		$("#product-title-btn").addClass("grey-button");
		$("#product-title-icon").removeClass("fa-check");
		$("#product-title-icon").addClass("fa-times");
	};
});

$('#product-price-btn').click(function(){
	if ($("#product-price-btn").hasClass('grey-button')) {
		$($textAreaLarge).val($($textAreaLarge).val() + $productPrice);
		$("#product-price-btn").removeClass("grey-button");
		$("#product-price-btn").addClass("green-button");
		$("#product-price-icon").removeClass("fa-times");
		$("#product-price-icon").addClass("fa-check");
	} else if ($("#product-price-btn").hasClass('green-button')) {
		$('#caption-textarea-large').val(" ");
		$("#product-price-btn").removeClass("green-button");
		$("#product-price-btn").addClass("grey-button");
		$("#product-price-icon").removeClass("fa-check");
		$("#product-price-icon").addClass("fa-times");
	};
});

</script>
