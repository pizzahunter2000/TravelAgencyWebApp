<div class="row row-cols-auto" style="display: flex; justify-content: space-evenly; padding: 0; margin: 0;">
    <?php foreach (($attraction?:[]) as $attraction): ?>
        <div class="col card text-white bg-dark" style="width: 30rem; margin: 10px; padding: 1rem; height: fit-content;">
          <img class="card-img-top" src="/images/<?= ($attraction->image) ?>" alt="<?= ($attraction->image) ?>"
            style="border-radius: 4px;">
          <div class="card-body">
              <h5 class="attraction-title"><?= ($attraction->attr_name) ?></h5>
              <!--<p class="attraction-type"><?= ($attraction->type) ?></p>-->
              <a target="_blank"  href="<?= ($attraction->website) ?>" class="btn btn-primary">Official site</a>
          </div>
        </div>
    <?php endforeach; ?>
</div>
