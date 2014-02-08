<table>
  <tr>
    <th>Email</th>
    <th>Nombre</th>
    <th>DNI</th>
    <th>Genero</th>
    <th>Vip</th>
    <th>Observaciones</th>
  </tr>

  <?php if($user_list): foreach($user_list as $user): ?>
  <tr>
    <td><?= $user->getEmail();?></td>
    <td><?= $user->getNombre();?></td>
    <td><?= $user->getDni();?></td>
    <td><?= $user->getGenero();?></td>
    <td><?php if($user->getVip()) echo "Si";else echo "No";?></td>
    <td><?= $user->getObservaciones();?></td>
  </tr>
  <?php endforeach; endif;?>
</table>

