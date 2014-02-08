<table>
  <?php if($menu_list): foreach($menu_list as $option): ?>
  <ul>
    <li><a href="<?= $option->getUrl();?>"><?= $option->getName();?></td>
  </ul>
  <?php endforeach; endif;?>
</table>

