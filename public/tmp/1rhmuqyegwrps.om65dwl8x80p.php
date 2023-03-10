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
                <li>
                    <a class="dropdown-item" href="/viewAttractions">No Filter</a>
                </li>
                <?php foreach (($countries?:[]) as $country): ?>
                    <li>
                        <a class="dropdown-item" href="/viewAttractionsInACountry/<?= ($country['id']) ?>">
                            <?= ($country['country_name']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                Type &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
                <li>
                    <a class="dropdown-item" href="/viewAttractions">No Filter</a>
                </li>
                <?php foreach (($types?:[]) as $type): ?>
                    <li>
                        <a class="dropdown-item" href="/viewAttractionsOfAType/<?= ($type['id']) ?> ">
                            <?= ($type['type']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>