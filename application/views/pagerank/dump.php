<style type="text/css">
.zebra {
  background-color: #ddd;
}
.ip { color #555 }
</style>

<?php  /*  $j=0; < ?= ($j++%5 == 5)? 'class="zebracol"':'' ? > */ ?>

<p><?= sizeof($sites) ?> sites</p>

<table style="background-color:#fff;">
  <thead>
    <tr>
      <th>&nbsp;</th>
      <!--th>&nbsp;</th-->
      <?php $y=0; foreach($dates as $d): ?> 
      <th><?= date('n/j',$d)?><?= ($y != date('Y',$d)) ? '/'.$y=date('Y',$d) : '' ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>  
    <?php $i=0; foreach($sites as $site => $ranks): ?>
      <tr <?= ($i++%3 == 0)? 'class="zebra"' : '' ?>>
        <th><?=$site?></th>
        <? /* <td class="ip">< ?= join(",", $ips[$site]) ? ></td> */ ?>
        <?php foreach($dates as $d): ?>
          <td><?= (isset($ranks[$d])) ? $ranks[$d] : '&nbsp;' ?></td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  