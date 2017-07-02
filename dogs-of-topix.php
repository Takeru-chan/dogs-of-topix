<!doctype html>
<html lang="ja"><meta charset="utf-8"><body>
<form action="" method="post">予算：<input type="text" name="budget" size="8" value=""/>万円<input type="submit" value="計算する" /></form>
<?php
$budget=$_POST["budget"]*1000;
$code = array("2914", "4502", "7201", "7203", "7751", "8031", "8316", "8411", "8766", "9437");
$issue = array("日本たばこ産業", "武田薬品工業", "日産自動車", "トヨタ自動車", "キヤノン", "三井物産", "三井住友フィナンシャルグループ", "みずほフィナンシャルグループ", "東京海上ホールディングス", "NTTドコモ");
$rate = array("3.3%", "3.7%", "4.1%", "2.9%", "4.6%", "3.1%", "3.4%", "3.6%", "2.8%", "3.0%");
$price =array("3947", "5709", "1118", "5893", "3816", "1605.5", "4379", "205.4", "4651", "2652");
?>
<table>
<tr><th>証券コード</th><th>銘柄</th><th>配当利回り</th><th>株価</th><th>株数</th><th>約定金額</th><th>手数料</th></tr>
<?php for($i=0;$i<10;$i++): ?>
<?php
$number = (int) (0.5+($budget/$price[$i]));
$cost = $number*$price[$i];
$unit = (int) ($number/100);
$commission = 0;
$unit_price = 100*$unit*$price[$i];
if ($unit_price > 1000000) {
  $commission = (int) (0.5+($unit_price*0.001));
} elseif ($unit_price > 500000) {
  $commission = 1000;
} elseif ($unit_price > 400000) {
  $commission = 400;
} elseif ($unit_price > 300000) {
  $commission = 350;
} elseif ($unit_price > 200000) {
  $commission = 250;
} elseif ($unit_price > 100000) {
  $commission = 180;
} elseif ($unit_price > 0) {
  $commission = 100;
}
$fraction = (int) (0.5+0.005*($number-(100*$unit))*$price[$i]);
if ($fraction == 0) {
  $commission += 0;
} elseif ($fraction < 48) {
  $commission += 48;
} else {
  $commission += $fraction;
}
$total_unit_price += $cost;
$total_commission += $commission;
?>
<tr>
<td style="text-align:center;"><?php echo $code[$i]; ?></td>
<td><?php echo $issue[$i]; ?></td>
<td style="text-align:right;"><?php echo $rate[$i]; ?></td>
<td style="text-align:right;"><?php echo number_format($price[$i]); ?></td>
<td style="text-align:right;"><?php echo number_format($number); ?></td>
<td style="text-align:right;"><?php echo number_format($cost); ?></td>
<td style="text-align:right;"><?php echo number_format($commission); ?></td>
</tr>
<?php endfor; ?>
</table>
<?php
$total_cost = $total_unit_price+$total_commission;
$return = (int) ($total_unit_price*0.0878);
?>
<p style="text-align:right;">※株価は2017年6月30日の終値です。</p>
<p>予算<?php echo number_format($budget*10); ?>円に対し総取得費用は<?php echo number_format($total_cost); ?>円、
うち手数料は<?php echo number_format($total_commission); ?>円。
リターンを8.78%と想定すると、額面で<?php echo number_format($return); ?>円となります。</p>
</body></html>
