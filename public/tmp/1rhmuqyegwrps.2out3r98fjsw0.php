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
          <form method="POST" enctype="multipart/form-data">
            <tr>
              <th scope="row" name="id"><?= ($ticket['id']) ?></th>
              <th><?= ($ticket['person']) ?></th>
              <th><?= ($ticket['attraction']) ?></th>
              <th><?= ($ticket['price']) ?> &euro;</th>
              <th>
                  <a class="edit btn btn-dark" title="Edit" name="Edit" data-toggle="tooltip" href="/mainPage">
                    <i class="material-icons">&#xE254;</i>
                  </a>
                  <input type="hidden" name="id" value=<?= ($ticket['id']) ?>>
                  <button class="delete btn btn-dark" title="Delete" name="Delete" data-toggle="tooltip"
                      onclick="return confirm('Are you sure you want to delete this ticket');">
                    <i class="material-icons">&#xE872;</i>
                  </button>
              </th>
            </tr>
          </form>
        <?php endforeach; ?>
    </tbody>
  </table>