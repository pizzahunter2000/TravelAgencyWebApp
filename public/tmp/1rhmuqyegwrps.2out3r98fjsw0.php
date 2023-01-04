<table class="table table-dark table-striped" style="-webkit-box-shadow: 0 10px 6px -6px #777;
        -moz-box-shadow: 0 10px 6px -6px #777;
        box-shadow: 0 10px 6px -6px #777;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Attraction</th>
        <th scope="col">Price</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach (($tickets?:[]) as $ticket): ?>
            <tr>
                <th scope="row"><?= ($ticket['id']) ?></th>
                <th><?= ($ticket['person']) ?></th>
                <th><?= ($ticket['attraction']) ?></th>
                <th><?= ($ticket['price']) ?> &euro;</th>
                <th>
                  <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                  <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                </th>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>