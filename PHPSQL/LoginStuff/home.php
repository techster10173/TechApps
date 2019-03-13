<?php
    session_start();
    if($_SESSION["kyahaiuser"] == ""){
        header("Location:landing.html");
    }
?>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<nav class="navbar navbar-light bg-light justify-content-between">
  <form class="form-inline">
      <a class="navbar-brand">Thank you for logging in
          <?php
                echo $_SESSION["kyahaiuser"];
          ?>
      </a>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" type="button">Make Tweet</a>
    <a href="logout.php"><button class="btn btn-outline-success" type="button">Logout</button></a>

  </form>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Democrat</th>
      <th scope="col">Neutral</th>
      <th scope="col">Republican</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">New Tariff</div>
  <div class="card-body">
    <h5 class="card-title">Article 1</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	  <a href="#" style="color: white">Open Article</a>
  </div>
</div></td>
		<td><div class="card bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">New Tariff</div>
  <div class="card-body">
    <h5 class="card-title">Article 2</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	  	  <a href="#" style="color: black">Open Article</a>
  </div>
</div></td>
      <td><div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">New Tariff</div>
  <div class="card-body">
    <h5 class="card-title">Article 3</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	  	  <a href="#" style="color: white">Open Article</a>
  </div>
</div></td>
    </tr>
  </tbody>
</table>
