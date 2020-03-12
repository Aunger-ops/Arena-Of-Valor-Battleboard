<?php
error_reporting(0);
$roleid = "roleid"; //需要获取
$partition = "321"; //需要获取
$area = "321"; //需要获取
$appid = "wx95a3a4d7c627e07d";
$url = "https://mapps.game.qq.com/yxzj/web201605/GetHeroSkin.php?appid=" . $appid . "&area=" . $area . "&partition=" . $partition . "&roleid=" . $roleid . "&r=0." . rand(100000000000000, 999999999999999);
$rank = "1"; //初始化段位为青铜三
$ch1 = curl_init();
curl_setopt_array($ch1, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"Cookie: 1234", //需要获取
		"Referer: https://pvp.qq.com/web201605/personal.shtml",
	),
));
$response = curl_exec($ch1);
curl_close($ch1);
$response = str_replace("var GetHeroSkinResult = ", "", $response);
$result = json_decode($response, true);
$result = $result['data'];
$rank = $result['idip_info']['grade_level']; //段位
$nick = urldecode($result['idip_info']['charac_name']); //昵称
$rankimg = "http://game.gtimg.cn/images/yxzj/web201605/page/rank" . $rank . ".png"; //段位图片
$headimg = urldecode($result['idip_info']['head_url']) . "/96"; //头像,96为头像大小
$fvf_win = $result['history']['five_vs_five_win_num']; //5v5胜场
$ladder_win = $result['history']['ladder_win_num']; //排位胜场
$fvf_rate = ($fvf_win / ($fvf_win + $result['history']['five_vs_five_lose_num'])) * 100; //5v5胜率
$ladder_rate = ($ladder_win / ($ladder_win + $result['history']['ladder_lose_num'])) * 100; //排位胜率
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://mapps.game.qq.com/yxzj/web201605/GetGameInfo.php?appid=" . $appid . "&area=" . $area . "&partition=" . $partition . "&roleid=" . $roleid . "&r=0." . rand(100000000000000, 999999999999999),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"Cookie: 1234", //需要获取
		"Referer: https://pvp.qq.com/web201605/personal.shtml",
	),
));

$response = curl_exec($curl);

curl_close($curl);
$response = str_replace("var result = ", "", $response);
$result = json_decode($response, true);
$result = $result['data']['spider'];
$kda = $result['kda']; //KDA
$survive = $result['survive']; //生存
$battle = $result['battle']; //团战
$grow = $result['grow']; //发育
$hurt_hero = $result['hurt_hero']; //输出
?>
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet/less" href="./static/less/king.css">
<script src="./static/js/less.js"></script>
<div class="king-box">
  <div class="head">
    <a class="user-link">
      <img src="<?php echo $headimg; ?>"><?php echo $nick; ?>
    </a>
    <img class="level" src="./static/gamer.png">
      </div>

  <ul class="num-box">
    <li>
      <span><?php echo $fvf_win; ?></span>
      <b>5V5胜场</b>
    </li>
    <li>
      <span><?php echo $ladder_win; ?></span>
      <b>排位赛胜场</b>
    </li>
    <li>
      <span><?php echo round($fvf_rate, 2); ?>%</span>
      <b>5V5胜率</b>
    </li>
    <li>
      <span><?php echo round($ladder_rate, 2); ?>%</span>
      <b>排位赛胜率</b>
    </li>
  </ul>
  <div class="last-round-box">
    <h2>综合指数</h2>
    <p class="kd-value"><?php echo round($kda * 100 / 10000, 0); ?> %</p>
    <p class="stat-value">
      <span>团战 <?php echo round($battle * 100 / 10000, 0); ?> %</span>
      <span>输出 <?php echo round($hurt_hero * 100 / 10000, 0); ?> %</span>
      <span>发育 <?php echo round($grow * 100 / 10000, 0); ?> %</span>
      <span>生存 <?php echo round($survive * 100 / 10000, 0); ?> %</span></p>
    <img src="<?php echo $rankimg; ?>"></div>
  <span class="cp" title="引用 PVP Tencent 的数据">©PVP Tencent</span></div>
