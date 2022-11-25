<div class="px-3 py-4 bg-dark text-white" style="box-shadow: 0 -5px 10px #9c73b8 inset; width: 100%;">
  <div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
        <span class="fs-3" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;font-size: 70px; font-weight: 600; color: rgb(255, 255, 255);;
        background-clip: text; -webkit-background-clip: text;
        text-shadow: 2px 2px 5px #9c73b8">Attractions</span>
      </a>

      <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
        <li>
          <a href="#" class="nav-link text-secondary">
            Home
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-secondary">
            Contact
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="container-fluid px-5 py-5" style = "background-image: linear-gradient(rgb(195, 139, 215),
  rgba(157, 173, 223)); width: 100%;">
  <ul class="row row-cols-auto" style="width: auto; display: flex; justify-content: space-evenly;
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
</div>
