<html>
<script type="text/javascript" src="/path/to/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/path/to/lib/jquery.jcarousel.min.js"></script>
<body>
<div class='ele3'>
	<div class='ele21'></div>
	<div class='cd_bottom1' style='padding-left: 30px;'>
	<div class='cd_img1'><img id='a"+linkId+"' height='100px' src=''/>
	<input type='file' id='b"+linkId+"' value='"+linkId+"' name='image' value='Выбрать'/></div>
	<div class='cd00'><div class='cd01'>Название</div><div class='cd02'>
	<input name='client_name' size='27' value=''></input>
	</div>
	</div>
	</div>
	</div>
<button onclick=\"return deleteField(this)\" href=\"#\" class='action redbtn' style='margin-left: 30px;'>
<span class='label'>Удалить</span></button>
<script>

for (var i = 0; i <= 7; i++) {
	$(document).ready(function(){
		$(".hider"+i+"").click(function(){
			$("#hidden"+i+"").slideToggle("slow");
			return false;
		});
	});
	}
for (var i = 0; i <= 7; i++) {
	$(document).ready(function(){
			$(".hider4"+i+"").click(function(){
				$("#hidden4"+i+"").slideToggle("slow");
				return false;
			});
		}); 
}


</script>
 
        
</body>
</html>