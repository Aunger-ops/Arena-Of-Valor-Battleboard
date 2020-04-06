<?php
error_reporting(0);
$roleid    = "owanlsn3YymkM9J2xwfCtXUg04n0"; //需要获取
$partition = "3214"; //需要获取
$area      = "3"; //需要获取
$appid     = "wx95a3a4d7c627e07d";
$url       = "https://mapps.game.qq.com/yxzj/web201605/GetHeroSkin.php?appid=" . $appid . "&area=" . $area . "&partition=" . $partition . "&roleid=" . $roleid . "&r=0." . rand(100000000000000, 999999999999999);
$rank      = "1"; //初始化段位为青铜三
$ch1       = curl_init();
curl_setopt_array($ch1, array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING       => "",
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => "GET",
    CURLOPT_HTTPHEADER     => array(
        "Cookie: pgv_pvi=328039424; ptui_loginuin=1796245767; RK=BrgM4eQ3Ui; ptcz=2c9ef16d8d50477add548a19bc0ce19342d7dbc143394b960df4962dbf9343b4; pgv_pvid=662004960; lskey=0001000056f9ad793240e57b06508950e6707bd8ce2d3ebbcf6867a3ecfc7a3862913c243ec83793fd15c39e; LW_uid=O1k5J844P58041Z2P9p142T8q4; eas_sid=f1c59864w5G0t192O991O2P9S8; PTTuserFirstTime=1584489600000; PTTosSysFirstTime=1584489600000; PTTosFirstTime=1584489600000; ts_uid=662004960; TGLoginJSCurDomain=tgideas.qq.com; psrf_qqaccess_token=76EF9FF47CF43F3C67C7C40B7F06F5F3; psrf_qqopenid=5C111A38941A2FAFD9EAA564F649E829; psrf_qqrefresh_token=4A89FEBC011F77A0FF422DB9E6888362; psrf_qqunionid=5DD478149840BA4E2571921361BF17BC; psrf_access_token_expiresAt=1592753777; pgv_info=ssid=s7275500579; pgv_si=s1845413888; _qpsvr_localtk=0.7841715528134732; LW_sid=b1856895Z154P4K2h7b0c1P2t1; isHostDate=18346; isOsSysDate=18346; isOsDate=18346; weekloop=0-0-12-13; ts_last=pvp.qq.com/web201605/personal.shtml; eas_entry=https%3A%2F%2Fopen.weixin.qq.com%2Fconnect%2Fqrconnect%3Fappid%3Dwx95a3a4d7c627e07d%26scope%3Dsnsapi_login%26redirect_uri%3Dhttps%253A%252F%252Fpvp.qq.com%252Fcomm-htdocs%252Fmilo_mobile%252Fwxlogin.html%253Fappid%253Dwx95a3a4d7c627e07d%2526sServiceType%253Dpvp%2526originalUrl%253Dhttps%25253A%25252F%25252Fpvp.qq.com%25252Fweb201605%25252Fpersonal.shtml%26state%3D1%26login_type%3Djssdk%26self_redirect%3Dtrue%26styletype%3D%26sizetype%3D%26bgcolor%3D%26rst%3D%26style%3Dblack; wxcode=021m3fZh2H6ugE0vFgWh2N94Zh2m3fZQ; openid=owanlsn3YymkM9J2xwfCtXUg04n0; access_token=31_zaPY_iAXoVg_S_uwbOQWPT8cSt5qiGBE_Tw8Z66l1IXKq5TyPjFrStRuhn-CEs8zOemIwkVXy42GJgo4dZ7MIEU5saKRzFuu4B_zvGq101I; acctype=wx; appid=wx95a3a4d7c627e07d; pvpqqcomrouteLine=index_personal_personal; PTTDate=1585144293056; IED_LOG_INFO2=userUin%3Dowanlsn3YymkM9J2xwfCtXUg04n0%26nickName%3D%26userLoginTime%3D1585144359; PVP_PERSONAL_DATA_owanlsn3YymkM9J2xwfCtXUg04n0=areaid%3D3%26areaname%3D%25E5%25BE%25AE%25E4%25BF%25A1204%25E5%258C%25BA-%25E6%2589%25B6%25E6%25A1%2591%25E8%258A%25B1%25E5%25BC%2580%26roleid%3Dowanlsn3YymkM9J2xwfCtXUg04n0%26rolename%3D%25E5%258F%25AB%25E6%2588%2591%25E4%25BA%258E%25E6%2599%258F%25E5%2590%25A7%26checkparam%3Dyxzj%257Cyes%257C%257C3%257Cowanlsn3YymkM9J2xwfCtXUg04n0*%257Cowanlsn3YymkM9J2xwfCtXUg04n0%257C%257C3214%257C%2525E5%25258F%2525AB%2525E6%252588%252591%2525E4%2525BA%25258E%2525E6%252599%25258F%2525E5%252590%2525A7*%257C%257C%257C1585144359%26md5str%3D0A8093C2A989C6CBD39B7492A1939E7F%26roleareaid%3D3%26sPartition%3D3214", //需要获取
        "Referer: https://pvp.qq.com/web201605/personal.shtml",
    ),
));
$response = curl_exec($ch1);
curl_close($ch1);
$response = str_replace("var GetHeroSkinResult = ", "", $response);
$result   = json_decode($response, true);

if ($result['iRet'] != "-12") {
    $res = $result['data'];
} else {
    $myfile = fopen("king_data.txt", "r") or die("Please do your first authorization.");
    $res    = fread($myfile, filesize("king_data.txt"));
    $res    = json_decode($res, true);

    fclose($myfile);
}
$rank        = $res['idip_info']['grade_level']; //段位
$nick        = urldecode($res['idip_info']['charac_name']); //昵称
$rankimg     = "http://game.gtimg.cn/images/yxzj/web201605/page/rank" . $rank . ".png"; //段位图片
$headimg     = urldecode($res['idip_info']['head_url']) . "/96"; //头像,96为头像大小
$fvf_win     = $res['history']['five_vs_five_win_num']; //5v5胜场
$ladder_win  = $res['history']['ladder_win_num']; //排位胜场
$fvf_rate    = ($fvf_win / ($fvf_win + $res['history']['five_vs_five_lose_num'])) * 100; //5v5胜率
$ladder_rate = ($ladder_win / ($ladder_win + $res['history']['ladder_lose_num'])) * 100; //排位胜率

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL            => "https://mapps.game.qq.com/yxzj/web201605/GetGameInfo.php?appid=" . $appid . "&area=" . $area . "&partition=" . $partition . "&roleid=" . $roleid . "&r=0." . rand(100000000000000, 999999999999999),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING       => "",
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => "GET",
    CURLOPT_HTTPHEADER     => array(
        "Cookie: pgv_pvi=328039424; ptui_loginuin=1796245767; RK=BrgM4eQ3Ui; ptcz=2c9ef16d8d50477add548a19bc0ce19342d7dbc143394b960df4962dbf9343b4; pgv_pvid=662004960; lskey=0001000056f9ad793240e57b06508950e6707bd8ce2d3ebbcf6867a3ecfc7a3862913c243ec83793fd15c39e; LW_uid=O1k5J844P58041Z2P9p142T8q4; eas_sid=f1c59864w5G0t192O991O2P9S8; PTTuserFirstTime=1584489600000; PTTosSysFirstTime=1584489600000; PTTosFirstTime=1584489600000; ts_uid=662004960; TGLoginJSCurDomain=tgideas.qq.com; psrf_qqaccess_token=76EF9FF47CF43F3C67C7C40B7F06F5F3; psrf_qqopenid=5C111A38941A2FAFD9EAA564F649E829; psrf_qqrefresh_token=4A89FEBC011F77A0FF422DB9E6888362; psrf_qqunionid=5DD478149840BA4E2571921361BF17BC; psrf_access_token_expiresAt=1592753777; pgv_info=ssid=s7275500579; pgv_si=s1845413888; _qpsvr_localtk=0.7841715528134732; LW_sid=b1856895Z154P4K2h7b0c1P2t1; isHostDate=18346; isOsSysDate=18346; isOsDate=18346; weekloop=0-0-12-13; ts_last=pvp.qq.com/web201605/personal.shtml; eas_entry=https%3A%2F%2Fopen.weixin.qq.com%2Fconnect%2Fqrconnect%3Fappid%3Dwx95a3a4d7c627e07d%26scope%3Dsnsapi_login%26redirect_uri%3Dhttps%253A%252F%252Fpvp.qq.com%252Fcomm-htdocs%252Fmilo_mobile%252Fwxlogin.html%253Fappid%253Dwx95a3a4d7c627e07d%2526sServiceType%253Dpvp%2526originalUrl%253Dhttps%25253A%25252F%25252Fpvp.qq.com%25252Fweb201605%25252Fpersonal.shtml%26state%3D1%26login_type%3Djssdk%26self_redirect%3Dtrue%26styletype%3D%26sizetype%3D%26bgcolor%3D%26rst%3D%26style%3Dblack; wxcode=021m3fZh2H6ugE0vFgWh2N94Zh2m3fZQ; openid=owanlsn3YymkM9J2xwfCtXUg04n0; access_token=31_zaPY_iAXoVg_S_uwbOQWPT8cSt5qiGBE_Tw8Z66l1IXKq5TyPjFrStRuhn-CEs8zOemIwkVXy42GJgo4dZ7MIEU5saKRzFuu4B_zvGq101I; acctype=wx; appid=wx95a3a4d7c627e07d; pvpqqcomrouteLine=index_personal_personal; PTTDate=1585144293056; IED_LOG_INFO2=userUin%3Dowanlsn3YymkM9J2xwfCtXUg04n0%26nickName%3D%26userLoginTime%3D1585144359; PVP_PERSONAL_DATA_owanlsn3YymkM9J2xwfCtXUg04n0=areaid%3D3%26areaname%3D%25E5%25BE%25AE%25E4%25BF%25A1204%25E5%258C%25BA-%25E6%2589%25B6%25E6%25A1%2591%25E8%258A%25B1%25E5%25BC%2580%26roleid%3Dowanlsn3YymkM9J2xwfCtXUg04n0%26rolename%3D%25E5%258F%25AB%25E6%2588%2591%25E4%25BA%258E%25E6%2599%258F%25E5%2590%25A7%26checkparam%3Dyxzj%257Cyes%257C%257C3%257Cowanlsn3YymkM9J2xwfCtXUg04n0*%257Cowanlsn3YymkM9J2xwfCtXUg04n0%257C%257C3214%257C%2525E5%25258F%2525AB%2525E6%252588%252591%2525E4%2525BA%25258E%2525E6%252599%25258F%2525E5%252590%2525A7*%257C%257C%257C1585144359%26md5str%3D0A8093C2A989C6CBD39B7492A1939E7F%26roleareaid%3D3%26sPartition%3D3214", //需要获取
        "Referer: https://pvp.qq.com/web201605/personal.shtml",
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$response = str_replace("var result = ", "", $response);
$result   = json_decode($response, true);
if ($result['iRet'] != "-12") {
    $result = $result['data']['spider'];
} else {
    $myfile = fopen("king_data.txt", "r") or die("Please do your first authorization.");
    $result = fread($myfile, filesize("king_data.txt"));
    $result = json_decode($result, true);
    fclose($myfile);
}

$kda       = $result['kda']; //KDA
$survive   = $result['survive']; //生存
$battle    = $result['battle']; //团战
$grow      = $result['grow']; //发育
$hurt_hero = $result['hurt_hero']; //输出
$arr_meg   = array_merge($result, $res);
if ($result != null && $res != null) {
    file_put_contents('king_data.txt', print_r(json_encode($arr_meg), true));
}
?>
<meta name="viewport" content="width=device-width,user-scalable=0">
<link rel="stylesheet/less" href="./static/less/king.css">
<script src="./static/js/less.js"></script>
<script type="text/javascript">var _hmt=_hmt||[];!function(){var e=document.createElement("script");e.src="https://hm.baidu.com/hm.js?fe34b9a1ed05edfef1b30971cd3517ee";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}()</script>
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
    <p class="kd-value">
        <?php echo round($kda * 100 / 10000, 0); ?>%</p>
    <p class="stat-value"> <span>团战 <?php echo round($battle * 100 / 10000, 0); ?> %</span>
        <span>输出 <?php echo round($hurt_hero * 100 / 10000, 0); ?> %</span>
        <span>发育 <?php echo round($grow * 100 / 10000, 0); ?> %</span>
        <span>生存 <?php echo round($survive * 100 / 10000, 0); ?> %</span>
        <div class="bdsharebuttonbox" style="float:right ">
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
        </div>
    </p>
    <img src="<?php echo $rankimg; ?>" id="level">
</div>

  <span class="cp" title="引用 PVP Tencent 的数据">©PVP Tencent - Power By <a href="https://www.webaun.cn" style="color:white;" target="_blank">Aunger</a> - Themes By <a href="http://mouto.org/" style="color:white;" target="_blank">卜卜口</a>
  </span></div>
<script type="text/javascript">
    var level = document.getElementById("level").src;
    window._bd_share_config = {
        "common": {
            "bdPopTitle": "我的王者战绩",
            /* 此处填写要分享标题 */ "bdSnsKey": {},
            "bdText": "快来围观我的王者战绩",
            /* 此处填写要分享内容 */ "bdMini": "2",
            "bdMiniList": false,
            "bdPic": level,
            /* 此处填写要分享图片地址 */ "bdStyle": "0",
            "bdSize": "16"
        },
        "share": {}
    };
    with(document) 0[
        (getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>