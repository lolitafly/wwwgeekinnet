<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
	<head>
		<meta charset="utf-8">
		<title>超级英雄连连看游戏排名</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,target-densitydpi=medium-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<script src="/Public/Marvel2/js/jquery-1.11.2.min.js"></script>
		<script>
			$(document).ready(function(){
				$("tbody tr").each(function(i){
					this.style.backgroundColor=['#f3f3f3','#fff'][i%2];
				});
			});
		</script>
		<style type="text/css">
			table{width:100%;text-align: center;margin-top:5px;border: none;}
			table thead th{}
			table tbody tr td{padding:10px 3px;border:none;}
			table tfoot td{padding-top:10px;}
		</style>
	</head>
	<body>
		<?php if(empty($list)): ?><div class="nodata">暂无排名信息</div><?php endif; ?>
		<?php if(!empty($list)): ?><table>
				<thead>
					<th>排名</th>
					<th>得分</th>
					<th>手机号</th>
				</thead>
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($i); ?></td>
							<td><?php echo ($vo["max(score)"]); ?></td>
							<td><?php echo ($vo["phone"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table><?php endif; ?>
	</body>
</html>