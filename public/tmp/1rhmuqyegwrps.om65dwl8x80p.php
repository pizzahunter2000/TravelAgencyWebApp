<div class="btn-group">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false" id = "dropDownMenuButton"
         data-mdb-toggle="dropdown">
      Filter
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropDownMenuButton">
        <li>
            <a class="dropdown-item" href="#">
                Country &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
                <?php foreach (($countries?:[]) as $country): ?>
                    <li>
                        <a class="dropdown-item" href="#"><?= ($country->country_id) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                Type &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
                <?php foreach (($types?:[]) as $type): ?>
                    <li>
                        <a class="dropdown-item" href="#"><?= ($type->type) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>