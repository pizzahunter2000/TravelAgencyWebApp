<ul class="row row-cols-auto" style="display: flex; justify-content: space-evenly;
      list-style-type: none;">
    <?php foreach (($attraction?:[]) as $attraction): ?>
      <li style="align-content: center;">
        <div class="col card text-white bg-dark mb-3" style="width: 20rem; margin: 10px;">
          <img class="card-img-top" src="/images/<?= ($attraction->image) ?>" alt="<?= ($attraction->image) ?>"
            style="max-width: 18rem; margin: 1rem; border-radius: 4px;">
          <div class="card-body">
              <h5 class="attraction-title"><?= ($attraction->attr_name) ?></h5>
              <p class="attraction-type"><?= ($attraction->type) ?></p>
              <a href="#" class="btn btn-primary">Official site</a>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
</ul>
