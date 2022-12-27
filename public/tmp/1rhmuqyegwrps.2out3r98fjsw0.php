<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Attraction</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach (($tickets?:[]) as $ticket): ?>
            <tr>
                <th scope="row"><?= ($ticket['id']) ?></th>
                <th><?= ($ticket['person']) ?></th>
                <th><?= ($ticket['attraction']) ?></th>
                <th><?= ($ticket['price']) ?> &euro;</th>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>