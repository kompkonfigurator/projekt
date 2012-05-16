<?php

# domain stats

$totalreq = Sql_Fetch_Row_Query(sprintf('select count(*) from %s',$GLOBALS['tables']['user']));
$total = $totalreq[0];

$req = Sql_Query(sprintf('select lcase(substring_index(email,"@",-1)) as domain,count(email) as num from %s group by domain order by num desc limit 50',$GLOBALS['tables']['user']));
$ls = new WebblerListing($GLOBALS['I18N']->get('Top 50 domains with more than 5 emails'));
while ($row = Sql_Fetch_Array($req)) {
  if ($row['num'] > 5) {
    $ls->addElement($row['domain']);
    $ls->addColumn($row['domain'],$GLOBALS['I18N']->get('num'),$row['num']);
    $perc = sprintf('%0.2f',($row['num'] / $total * 100));
    $ls->addColumn($row['domain'],$GLOBALS['I18N']->get('perc'),$perc);

  }
}
print $ls->display();

?>