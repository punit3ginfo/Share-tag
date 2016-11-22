<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );


?>

<?php
try
{
	# Making an API request can throw an exception


	$products = $shopify('GET /admin/products.json', array('published_status'=>'published'));
	$MultipleProduct_id = array();
	foreach($products as $singleproduct)
	{
		$eachProductTag=$singleproduct['tags'];
		if (strpos($eachProductTag, 'shared') !== false) {
			$MultipleProduct_id[]=$singleproduct['id'];
		}
	}



	$MultipleProduct_id_comma_seprated = implode(',', $MultipleProduct_id);

	$shared_products = $shopify('GET /admin/products.json', array('ids'=>$MultipleProduct_id_comma_seprated));

	foreach($shared_products as $singleproduct)
	{
		$title=$singleproduct['title']; // Product Title
		$variants=$singleproduct['variants'];
		$p_id1=$singleproduct['id'];
		$tags=$singleproduct['tags'];
		$OrigonalTag=$singleproduct['tags'];
		$ComparePrice=$singleproduct['compare_at_price'];
		$handle=$singleproduct['handle'];


		$tags = str_replace('shared', '', $tags);
		$tags = str_replace(' ', '', $tags);
		$tags = str_replace(',', 'AA', $tags);

		foreach($variants as $variants){
			$price=$variants['price']; // Product PRice
			$ComparePrice=$variants['compare_at_price'];
		}
		$images=$singleproduct['images'];

		foreach($images as $images){
			$src=$images['src']; //Image Source
		}

		?>
<div class="preview-container" id="post-preview-container">
	<div  class="preview-overflow-container">
		<div class="preview-clearfix">
			<div class="preview-template-container">
				<div class="chat_container" style="overflow: hidden;">
					<div class="sidebar-content-header">
						<div class="content-header-title-container">
							<div class="content-header-title">
								<span class="cc-text-large">
									Preview
								</span>
							</div>
						</div>

						<div class="menu-overflow-container">
							<div class="menu-overflow" style="overflow: hidden; display: flex; justify-content: center; align-items: center;">
								<!-- Preview Section -->
								<?php include 'iphone-preview.php';?>
								<!-- Preview Section -->
							</div>
						</div>
					</div>

					<div id="<?php echo $p_id1; ?>">
						<script>
							$(document).ready(function(){
							  var OrigonalTag = '<?php echo $OrigonalTag; ?>';

							  var pid_1 = '<?php echo $p_id1; ?>';
							  //alert(pid_1);
							  var pattern = /shared/;
							  var pattern1 = / shared/;

							  var exists = pattern.test(OrigonalTag);
							  var exists1 = pattern1.test(OrigonalTag);
							  if(exists || exists1 ){
								var tags_1 = '"<?php echo $tags; ?>"';
								var _id = '#'+ pid_1;
								$(_id).html("<button type='button' class='reset-button'  id='reset-button-<?php echo $p_id1; ?>' onclick='unshareButton("+pid_1+","+tags_1+");'><i class='fa fa-times' aria-hidden='true'></i> Reset</button>");
							  }else{
								var _id = '#'+ pid_1;
								<?php
								if($OrigonalTag == '')
								{
								  $OrigonalTag="shared";
								}
								else{
								   $OrigonalTag=$OrigonalTag.",shared";
								}
								?>
								var tags_1 = '"<?php echo $OrigonalTag; ?>"';

							$(_id).html("<button type='button' class='share-button' id='share-button-<?php echo $p_id1; ?>' onclick='shareButton("+pid_1+","+tags_1+");'><i class='fa fa-bullhorn' aria-hidden='true'></i> Share</button>");
							  }
							});
						</script>
					</div>
					
					<script>
 	function shareButton(pid,tags){

                var access_token='<?php echo $access_token ?>';
 	       var shop='<?php echo $_REQUEST['shop'] ?>';
                var tags_unshare = tags.replace('shared', "");

 	       var tags_unshare = tags_unshare.replace('shared', "");
 		var tags_unshare = tags_unshare.replace(' ', "");

 	       var _id = '#'+ pid;
                $.ajax({
                     url: '/sharebutton.php?pid='+ pid+'&access_token='+access_token+'&shop='+shop+'&tags='+tags,
                     success: function(data){
 			$(_id).html('<button type=button class=reset-button id=reset-button-<?php echo $p_id1; ?>  onclick=unshareButton('+pid+',"'+tags_unshare+'");><i class="fa fa-times" aria-hidden=true></i> Reset</button>');

                     }
                 });
             }
 </script>

 <script>

 	var tags;
 	function unshareButton(pid,tags){
 		var _id = '#'+ pid;
                 var access_token='<?php echo $access_token ?>';
 	        var shop='<?php echo $_REQUEST['shop'] ?>';
 			var tags_1 = tags+',shared';
 		//var tags_1 = '<?php //echo $tags; ?>';
 		if(tags_1== ''){
 			tags_1= 'shared';
 		}

                 $.ajax({
                     url: '/sharebutton.php?pid='+ pid+'&access_token='+access_token+'&shop='+shop+'&tags='+tags,
                     success: function(data){

 			  $(_id).html('<button type="button" class=share-button id=share-button-<?php echo $p_id1; ?>  def onclick=shareButton('+pid+',"'+tags_1+'");><i class="fa fa-bullhorn" aria-hidden=true></i> Share</button>');

                     }
                 });
             }
     </script>

					<div class="content-overflow-container">
						<div  class="preview-content-overflow">
							<!-- Form Section -->
							<?php include 'preview-form.php';?>
							<!-- Form Section -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
