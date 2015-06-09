<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<!-- head头部分开始 -->
<head>
	<!-- head头部分开始 -->
	<meta charset="UTF-8">
	<title><?php echo ($article['current']['title']); ?>-<?php echo (C("WEB_NAME")); ?></title>
	<meta name="keywords" content="<?php echo ($article['current']['category']['keywords']); ?>" />
	<meta name="description" content="<?php echo ($article['current']['description']); ?>" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="author" content="baijunyao,admin@baijunyao.com">
	<script type="text/javascript" src="/Public/static/js/jquery-2.0.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
<script type="text/javascript" src="/Public/static/bootstrap-3.3.4/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/js/html5shiv.min.js"></script>
<script type="text/javascript" src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/Public/static/iCheck-1.0.2/icheck.min.js"></script>
<link rel="stylesheet" href="/Public/static/iCheck-1.0.2/skins/all.css">
<script>
$(document).ready(function(){
  $('.icheck').iCheck({
    checkboxClass: "icheckbox_square-blue",
    radioClass: "iradio_square-blue",
    increaseArea: "20%"
  });
});
</script>

	<script type="text/javascript">
		saveLoginUrl="<?php echo U('Home/User/save_login_url','','',true);?>";
		logoutUrl="<?php echo U('Home/User/logout','','',true);?>";
	</script>
	<script type="text/javascript" src="/Template/default/Home/Public/js/oauth.js"></script>
	<link rel="stylesheet" href="/Template/default/Home/Public/css/index.css">
	<?php echo (C("WEB_STATISTICS")); ?>
<!-- head头部分结束 -->
	<script type="text/javascript" src="/Public/static/ueditor1_4_3/third-party/SyntaxHighlighter/shCore.js"></script>
	<link rel="stylesheet" href="/Public/static/ueditor1_4_3/third-party/SyntaxHighlighter/shCoreDefault.css">
	<script type="text/javascript">
		SyntaxHighlighter.all();
		saveLoginUrl="<?php echo U('Home/User/save_login_url','','',true);?>";
		logoutUrl="<?php echo U('Home/User/logout','','',true);?>";
	</script>
	<script type="text/javascript" src="/Template/default/Home/Public/js/oauth.js"></script>
	<link rel="stylesheet" href="/Template/default/Home/Public/css/index.css">
	<?php echo (C("WEB_STATISTICS")); ?>
</head>
<!-- head头部分结束 -->
<body>
<!-- 顶部导航开始 -->
<!-- 顶部导航开始 -->
<div id="nav">
	<div class="b-inside">
		<div class="logo">
			<div class="code">
				<p class="php">&lt;?php</p>
				<p class="echo">echo</p>
			</div>
			<p class="word">
				'<img src="/Template/default/Home/Public/image/logo.jpg" alt="">'
				<span>;</span>
			</p>
			<a href="<?php echo U('Home/Index/index');?>"></a>
		</div>
		<ul class="category">
			<li class="cname <?php if((!isset($_GET['cid'])) and (!isset($article['category']['cid'])) and (cut_str(__INFO__,'/',-1) != 'chat')): ?>action<?php endif; ?>" >
				<a href="<?php echo U('Home/Index/index');?>">首页</a>
			</li>
			<?php if(is_array($categorys)): foreach($categorys as $key=>$v): ?><li class="cname <?php if(($_GET['cid']== $v['cid']) or ($article['category']['cid'] == $v['cid'])): ?>action<?php endif; ?>">
					<a href="<?php echo U('Home/Index/category',array('cid'=>$v['cid']));?>"><?php echo ($v['cname']); ?></a>
				</li><?php endforeach; endif; ?>
			<li class="cname <?php if(cut_str(__INFO__,'/',-1) == 'chat'): ?>action<?php endif; ?> ">
				<a href="<?php echo U('Home/Index/chat');?>">随言碎语</a>
			</li>
			<li class="cname">
				<a href="http://git.oschina.net/shuaibai123/thinkbjy" target="_blank">thinkbjy</a>
			</li>
		</ul>
		<ul id="login-word" class="user">
			<?php if(session('user.id')): ?><li class="user-info">
					<span><img src="<?php echo session('user.head_img') ;?>"/></span>
					<span><?php echo session('user.nickname') ;?></span>
					<span><a href="<?php echo U('Home/User/logout');?>">退出</a></span>
				</li>
			<?php else: ?>	
				<li class="login" onclick="showlogin()">登陆</li><?php endif; ?>
			
		</ul>
	</div>
</div>
<!-- 顶部导航结束 -->
<!-- 顶部导航结束 -->

<!-- 主体部分开始 -->
<div id="content">
	<div class="b-inside">
		<!-- 左侧列表开始 -->
		<div class="left">
			<div class="article">
				<h1 class="title"><?php echo ($article['current']['title']); ?></h1>
				<ul class="metadata">
					<li class="date">作者：<?php echo ($article['current']['author']); ?></li>
					<li class="date">发布时间：<?php echo (date('Y-m-d H:i:s',$article['current']['addtime'])); ?></li>
					<li class="category">分类：<a href="<?php echo U('Home/Index/category',array('cid'=>$v['cid']));?>"><?php echo ($article['current']['category']['cname']); ?></a>
					<?php if(!empty($article['current']['tag'])): ?><li class="tags ">标签：
							<?php if(is_array($article['current']['tag'])): foreach($article['current']['tag'] as $key=>$v): ?><a href="<?php echo U('Home/Index/tag',array('tid'=>$v['tid']));?>"><?php echo ($v['tname']); ?></a><?php endforeach; endif; ?>
						</li><?php endif; ?>							
				</ul>
				<div class="content-word">
					<?php echo ($article['current']['content']); ?>
					<?php if(($article['current']['is_original']) == "1"): ?><p class="copyright">
							<?php echo (C("COPYRIGHT_WORD")); ?>
						</p><?php endif; ?>
					<ul class="prev-next">
						<li class="prev">
							上一篇：
							<?php if(empty($article['prev'])): ?><span>没有了</span>
							<?php else: ?>
								<a href="<?php echo U('Home/Index/article',array('cid'=>isset($_GET['cid'])?$_GET['cid']:0,'tid'=>isset($_GET['tid'])?$_GET['tid']:0,'aid'=>$article['prev']['aid']));?>"><?php echo ($article['prev']['title']); ?></a><?php endif; ?>
						</li>
						<li class="next">
							下一篇：
							<?php if(empty($article['next'])): ?><span>没有了</span>
							<?php else: ?>
								<a href="<?php echo U('Home/Index/article',array('cid'=>isset($_GET['cid'])?$_GET['cid']:0,'tid'=>isset($_GET['tid'])?$_GET['tid']:0,'aid'=>$article['next']['aid']));?>"><?php echo ($article['next']['title']); ?></a><?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
			<div class="comment">
				<!-- 畅言评论系统开始 -->
				<div id="SOHUCS" sid="<?php echo ($_GET['aid']); ?>"></div>
				<?php echo (C("CHANGYAN_COMMENT")); ?>
				<!-- 畅言评论系统结束 -->
			</div>
		</div>
		<!-- 左侧列表结束 -->

		<!-- 右侧内容开始 -->
		<!-- 通用右部区域开始 -->
<div class="right">
	<div class="tags">
		<h4 class="title">热门标签</h4>
		<ul class="tags-ul">
			<?php $tag_i=0 ?>
			<?php if(is_array($tags)): foreach($tags as $k=>$v): $tag_i++ ?>
				<?php $tag_i=$tag_i==5?1:$tag_i ?>
				<li class="tname">
					<a class="tstyle-<?php echo ($tag_i); ?>" href="<?php echo U('Home/Index/tag',array('tid'=>$v['tid']));?>" target="_blank"><?php echo ($v['tname']); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="recommend">
		<h4 class="title">置顶推荐</h4>
		<p class="recommend-p">
			<?php	 $recommend=M('Article')->field('aid,title')->where("is_show=1 and is_delete=0 and is_top=1")->limit(10)->select(); foreach ($recommend as $k => $field) { $url=U('Home/Index/article',array('aid'=>$field['aid'])); ?><a class="recommend-a" href="<?php echo U('Home/Index/article',array('aid'=>$field['aid']));?>" target="_blank"><?php echo ($k+1); ?>：<?php echo ($field['title']); ?></a><?php } ?>
		</p>
	</div>
	<div class="search">
		<form class="form-inline"  role="form" action="<?php echo U('Home/Index/search');?>" method="get">
			<input class="search-text" type="text" name="search_word">
			<input class="search-submit" type="submit" value="全站搜索">
		</form>
	</div>
	<div class="link">
		<h4 class="title">友情链接</h4>
		<p class="link-p">
			<?php if(is_array($links)): foreach($links as $k=>$v): ?><a class="link-a" href="<?php echo ($v[url]); ?>" target="_blank"><?php echo ($v['lname']); ?></a><?php endforeach; endif; ?>
		</p>
	</div>
</div>
<!-- 通用右部区域结束 -->
		<!-- 右侧内容结束 -->
	</div>
</div>
<!-- 主体部分结束 -->

<!-- 通用底部文件开始 -->
<!-- 通用底部文件开始 -->
<div id="foot">
	<div class="b-inside">
		本站使用自主开发的<a href="http://git.oschina.net/shuaibai123/thinkbjy" target="_blank">thinkbjy</a>开源博客程序搭建  © 2014-2015 baijunyao.com 版权所有 ICP证：豫ICP备14009546号-3
	</div>
</div>
<!-- 通用底部文件结束 -->
<!-- 通用底部文件结束 -->

<!-- 登陆框开始 -->
<!-- 登录模态框开始 -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
      </div>
      <ul class="modal-body">
        <!-- <span id="qqLoginBtn"></span> -->
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>'qq'));?>"><img src="/Template/default/Home/Public/image/qq-login.png" alt=""></a>
        </li>
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>'sina'));?>"><img src="/Template/default/Home/Public/image/sina-login.png" alt=""></a>
        </li>
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>'douban'));?>"><img src="/Template/default/Home/Public/image/douban-login.png" alt=""></a>
        </li>
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>'renren'));?>"><img src="/Template/default/Home/Public/image/renren-login.png" alt=""></a>
        </li>
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>'kaixin'));?>"><img src="/Template/default/Home/Public/image/kaixin-login.png" alt=""></a>
        </li>
        <li class="login-img">
            <a href="<?php echo U('Home/User/oauth_login',array('type'=>''));?>"><img src="" alt=""></a>
        </li>
      </ul>

    </div>
  </div>
</div>
<!-- 登录模态框结束 -->
<!-- 登陆框结束 -->
</body>
</html>