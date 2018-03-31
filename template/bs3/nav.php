<?php 
	$url=basename($_SERVER['REQUEST_URI']);
	$dir=basename(getcwd());
	if($dir=="discuss3") $path_fix="../";
	else $path_fix="";
 	if(isset($OJ_NEED_LOGIN)&&$OJ_NEED_LOGIN&&(
                  $url!='loginpage.php'&&
                  $url!='lostpassword.php'&&
                  $url!='lostpassword2.php'&&
                  $url!='registerpage.php'
                  ) && !isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
 
           header("location:loginpage.php");
           exit();
        }

	if($OJ_ONLINE){
		require_once($path_fix.'include/online.php');
		$on = new online();
	}
?>
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation" >
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $OJ_HOME?>"><?php echo $OJ_NAME?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
	      <?php $ACTIVE="class='active'"?>

<?php if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){ ?> <!--로그인이 되어있으면-->
<?php $sid=$_SESSION[$OJ_NAME.'_'.'user_id']; ?>
  
  <!--admin일때-->
  <?php if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
              <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php"><?php echo $MSG_CONTEST?></a></li>
              <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php"><?php echo $MSG_STATUS?></a></li>
              <li <?php if ($dir=="discuss3") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>bbs.php"><?php echo $MSG_BBS?></a></li>
              <li <?php if ($url=="faqs.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.php"><?php echo $MSG_FAQ?></a></li>

	      <?php if (isset($OJ_PRINTER)&& $OJ_PRINTER){ ?>
              <li <?php if ($url=="printer.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>printer.php"><?php echo $MSG_PRINTER?></a></li>
	      <?php }?>
              <li <?php if ($url=="problemset.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>problemset.php"><?php echo $MSG_PROBLEMS?></a></li>
              <li <?php if ($url=="category.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>category.php"><?php echo $MSG_SOURCE?></a></li>
              <li <?php if ($url=="ranklist.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>ranklist.php"><?php echo $MSG_RANKLIST?></a></li>
	     <!--추가 드랍박스 메뉴
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
             -->
   <?php } else {?>
   <!--일반회원일때-->
              <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php?user_id=<?php echo $sid?>"><?php echo $MSG_CONTEST?></a></li>
              <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php?user_id=<?php echo $sid?>"><?php echo $MSG_STATUS?></a></li>
              <li <?php if ($dir=="discuss3") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>bbs.php"><?php echo $MSG_BBS?></a></li>
              <li <?php if ($url=="faqs.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.php"><?php echo $MSG_FAQ?></a></li>

   <?php } ?>
<?php } else { ?>
   <!-- 비회원 상태 메뉴 -->
             <li <?php if ($url=="faqs.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>faqs.php"><?php echo $MSG_FAQ?></a></li>
<?php } ?>
            </ul>
	    <ul class="nav navbar-nav navbar-right">
	    <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="profile">Login</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
<script src="<?php echo $path_fix."template/$OJ_TEMPLATE/profile.php?".rand();?>" ></script>
              <!--<li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
	    </ul>
	    </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


