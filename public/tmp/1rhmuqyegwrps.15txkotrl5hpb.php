<table class="table table-dark table-striped" style="-webkit-box-shadow: 0 10px 6px -6px #777;
        -moz-box-shadow: 0 10px 6px -6px #777;
        box-shadow: 0 10px 6px -6px #777;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Favourite Attraction</th>
        <th scope="col">Account</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach (($people?:[]) as $person): ?>
          <form method="POST" enctype="multipart/form-data">
            <tr>
              <th scope="row" name="id"><?= ($person['id']) ?></th>
              <th><?= ($person['title']) ?> <?= ($person['name']) ?></th>
              <th><?= ($person['favourite_attraction']) ?></th>
              <th><?= ($person['account']) ?></th>
            </tr>
          </form>
        <?php endforeach; ?>
    </tbody>
  </table>