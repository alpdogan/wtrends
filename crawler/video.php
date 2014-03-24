﻿
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script> 
	<script src="http://jwpsrv.com/library/WDs5oEH+EeKiUCIACp8kUw.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<title>wtbot</title>
</head>
<body>
<?php

require 'facebook-php-sdk/src/facebook.php';

define('APPID', '527185024046973');
define('APPSECRET', '91eb44f09b978f4b897df7d53f09e542');
define('ACCESSTOKEN', 'CAAAAAYsX7TsBAK2O1OQPO56rJzHo0fFGbk4C3e3ZC6bs2ZC54Pnf3ZA4BVisYQeQmbbsB0zmFnp7latXKbQwZC6l61ZATZC0gnqBY3fuQ4nPUDO6lNabYY2nuKPB5GMZCpYP48Lt3PkgaCq4xhZAPBGdqCZCZBbWRg1MxPvgke4gjL0eP59WCkaosfwU4ej7mpBfwZAE6pLH2EfzHRNUS7NZBvZBsf27CPayPTJYZD');


$config = array(
  'appId' => APPID,
  'secret' => APPSECRET,
);

$facebook = new Facebook($config);

$facebook->setAccessToken(ACCESSTOKEN);

$page = $_GET['page'];

$result = $facebook->api('/'.$page.'?fields=name,id,likes,posts.limit(100).fields(caption,type,description,actions,created_time,status_type,likes,comments.fields(from,message,like_count))', 'get', array('access_token'=>ACCESSTOKEN));

?>
	<header id="top-nav" style="top: 0px;position: fixed;z-index: 3;">
        <div id="logo">
            <a href="/">Komikli</a>
        </div>
	            
 	</header>
 <div id="content">
<?php

foreach ($result["posts"]["data"] as $post) {
	
	$postType = $post["type"];
	if($postType=='video')
	{
		$id = $post["id"];
		$postDetail = $facebook->api('/'.$id, 'get', array('access_token'=>ACCESSTOKEN));

		$title = $postDetail["name"];
		$description = $postDetail["message"];
		$likes = $postDetail["likes"]["count"];
		$picture = $postDetail['picture'];
		$source = $postDetail['source'];


 ?>
		
    <div id="list-item">
        <input type="text" class="list-item-title" id="<?php GetInputName($id,"title") ?>" style="width:100%" value="<?php echo $title ?>"/>
        <input type="text" class="list-item-title" id="<?php GetInputName($id,"description") ?>" style="width:100%" value="<?php echo $description ?>"/>
        <div class="list-item-content">
            <div id='<?php echo $id ?>'></div>
            <script type='text/javascript'>
                jwplayer('<?php echo $id ?>').setup({
                    file: '<?php echo $source ?>',
                    image: '<?php echo $picture ?>',
                    title: '<?php echo $title ?>',
                    width: '100%',
                    aspectratio: '16:9',
                    fallback: 'false',
                    primary: 'flash'
                });
            </script>
        </div>
        <div class="list-item-detail">
            <div class="list-item-sourcedetail">
                <div class="list-item-site facebook">
                </div>
                <div class="list-item-source"><a target="_blank" href="#">Paylasman</a> | Likes : <?php echo $likes ?></div>
            </div>
            <div class="list-item-form">

            	<input id="<?php GetInputName($id,"source") ?>" value="<?php echo $source ?>"	type="hidden"></input>
            	<input id="<?php GetInputName($id,"picture") ?>" value="<?php echo $picture ?>"	type="hidden"></input>
            	<input id="<?php GetInputName($id,"page") ?>" value="<?php echo $page ?>"		type="hidden"></input>
                <button class="addToSite" data-contentid="<?php echo $id ?>">Youtube'a at</button>
            </div>
        </div>
    </div>

<?php }
}
?>
	</div>


<script type="text/javascript">
    $(function(){
        $(".addToSite").click(function(){
            var that = $(this);
            var contentId = $(this).data("contentid");
            var sourceUrl = $("#"+contentId+"-source").val();
            var title = $("#"+contentId+"-title").val();
            var description = $("#"+contentId+"-description").val();
            console.log(contentId);
            $.ajax({
                type: "post",
                url : "upload.php",
                data : {  title: title, description: description, source: sourceUrl  },
                success: function(result){
                    that.parent().parent().parent().hide();
                }
            });    
            //http://localhost:8888/wtrends/crawler/upload.php?title=asdassssssd&description=asdassssssd&source=https://scontent.xx.fbcdn.net/hvideo-ash3/v/t42.1790-2/1554690_813167315364262_579721247_n.mp4?oh=31230e7dd618b25f9ac183d22cb20a3d&oe=5332A024
        });
        
    });

</script>
</body>
</html>

<?php 

function GetInputName($contentId,$inputName)
{
	echo $contentId."-".$inputName;
}
?>


