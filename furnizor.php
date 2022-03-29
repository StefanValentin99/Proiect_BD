<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Bun venit la Flanco!</title>

    </head>
    <body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>


<!-- Butonul insereaza -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Insereaza </button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id_furnizor</th>
      <th scope="col">Nume</th>
      <th scope="col">Strada</th>
      <th scope="col">Numar</th>
      <th scope="col">Mail</th>
      <th scope="col">Telefon</th>
      <th scope="col">Judet</th>
      <th scope="col">Localitate</th>
    </tr>
  </thead>
  <tbody>
      
<?php

include "config.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "temabd";

$conn = connectDB($servername ,$username,$password,$database);
   
$result = $conn->query("SELECT * FROM furnizor");

while($row = $result->fetch_row()){

?>
    <tr>
      <th scope = "row"><?php echo $row[0]; ?></th>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $row[4]; ?></td>
      <td><?php echo $row[5]; ?></td>
      <td><?php echo $row[6]; ?></td>
      <td><?php echo $row[7]; ?></td>
    
    </tr>
<?php
   
}

?>
   
  </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Inserati date </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <form action="furnizor.php" method="post">
                
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Nume</span>
                <input type="text" class="form-control" name="nume_1" id="basic-url" aria-describedby="basic-addon3">
                </div>
        

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Strada</span>
                <input type="text" class="form-control"  name="nume_2" id="basic-url" aria-describedby="basic-addon3">
                </div>

        
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Numar</span>
                <input type="text" class="form-control"   name="nume_3" id="basic-url" aria-describedby="basic-addon3">
                </div>


                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Mail</span>
                <input type="text" class="form-control"   name="nume_4" id="basic-url" aria-describedby="basic-addon3">
                </div>

        
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Telefon</span>
                <input type="text" class="form-control"   name="nume_5" id="basic-url" aria-describedby="basic-addon3">
                </div>


                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Judet</span>
                <input type="text" class="form-control"   name="nume_6" id="basic-url" aria-describedby="basic-addon3">
                </div>


                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Localitate</span>
                <input type="text" class="form-control"   name="nume_7" id="basic-url" aria-describedby="basic-addon3">
                </div>

                <button type="submit" name="submit12" class="btn btn-primary"> Salveaza </button>
    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Inchide </button>
      </div>
    </div>
  </div>
</div>

<?php

    if(isset($_POST['submit12'])){

        $name1=$_POST['nume_1'];
        $name2=$_POST['nume_2'];
        $name3=$_POST['nume_3'];
        $name4=$_POST['nume_4'];
        $name5=$_POST['nume_5'];
        $name6=$_POST['nume_6'];
        $name7=$_POST['nume_7'];
     
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "temabd";

        $conn=connectDB($servername ,$username,$password,$database);
        $sql="INSERT INTO furnizor VALUES('', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6','$name7')";

        if ($conn->query($sql) === TRUE) {
            echo "Inserare reusita";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

    }

?>