<form method="POST" enctype="multipart/form-data" style="margin: 30px;">
    <div class="form-group">
      <label for="personName">Customer Name</label>
      <input type="text" class="form-control" id="personName" name="person" placeholder="Enter name" style="width: 200px;"
        required value="<?= ($ticket->person) ?>">
      <small class="invalid-feedback">Name entered is incorrect</small>
    </div>
    <div class="form-group">
        <label for="attractionName">Attraction Name</label>
        <input type="text" class="form-control" id="attractionName" name="attraction" placeholder="Enter attraction name"
          style="width: 200px;" required value="<?= ($ticket->attraction) ?>">
        <small class="invalid-feedback">Attraction entered is incorrect</small>
    </div>
    <div class="form-group">
        <label for="ticketPrice">Ticket Price</label>
        <input type="text" class="form-control" id="ticketPrice" name="price" placeholder="Enter ticket price"
          style="width: 200px;" required value="<?= ($ticket->price) ?>">
        <small class="invalid-feedback">Price entered is incorrect</small>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="checkbox" required>
      <label class="form-check-label" for="checkbox">I know what I'm doin'</label>
      <small class="invalid-feedback">Attraction entered is incorrect</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <div class="row">
    <?php if ($errorMessage != ''): ?>
      
        <div class="panel panel-default bg-warning text-white">
          <div class="panel-body">
            <?= ($theErrorMessage)."
" ?>
          </div>
        </div>
      
    <?php endif; ?>
  </div>