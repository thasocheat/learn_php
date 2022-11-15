<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using POST Method Session And Array</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center mt-3">
                <h1>Stock Keeping Unit</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">

            
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Stock Card Input</h3>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label text-dark">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="form-label text-dark">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product" id="product" placeholder="Enter Product Name">
                            </div>
                            <div class="mb-3">
                                <label for="quailty" class="form-label text-dark">Qty <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quailty" id="quailty" placeholder="Enter Qualty">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label text-dark">Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price">
                            </div>
                            <div class="mb-3">
                                <input type="submit"  name="store" value="store" class="btn btn-outline-primary">
                                <input type="submit"  name="show" value="show" class="btn btn-outline-primary">

                            </div>

                            

                        </form>
                        

                    </div>
                </div>

                
              
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Stock Table Show</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">N</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                 if(isset($_POST['store'])){

                                    // if(isset($_POST['store'])){
                                        $_SESSION[' '][] = array(
                                                            'number'    => '',
                                                $name       ='name'     => $_POST["name"],
                                                $product    ='product'  => $_POST["product"],
                                                $quailty        ='quailty'      => $_POST["quailty"],
                                                $price        ='price'      => $_POST["price"],
                                                            'amount'    => '',

                                                            
                                                $name       = $_POST["name"],
                                                $product    = $_POST["product"],
                                                $quailty        = $_POST["quailty"],
                                                $price        = $_POST["price"],
                                                            
                                            );
                                    
                                    // }
                                    

                                //Loop row one by one when click save or store
                                for($a = 1; $a < count($_SESSION[' ']); $a++){
                                    
                                    ?>
                                    <tr>
                                    <?php
    
                                            //Multiplecation of column Amount for one row inside loop
                                        $_SESSION[' '][$a]['amount'] = 

                                        //Value of Quailty 
                                        (int)$_SESSION[' '][$a]['quailty']

                                        *
                                        //Value of Price
                                        (int)$_SESSION[' '][$a]['price'];

                                            //Loop All Data
                                            foreach($_SESSION[' '][$a] as $key => $detail){
                                
                                                if($key == 'number'){
                                                    echo "<td>$a</td>";
                                                }else if($key == 'name'){
                                                    echo "<td>". $detail ." </td>";
                                                }else if($key == 'product'){
                                                    echo "<td>". $detail ."</td>";
                                                }else if($key == 'quailty'){
                                                    echo "<td>". $detail ."</td>";
                                                }else if($key == 'price'){
                                                    echo "<td>$". $detail ."</td>";
                                                }else if($key == 'amount'){
                                                    echo "<td>$". $detail ."</td>";
                                                }
                                            }
                                                
                                            
                                        
                                    ?>
                                    </tr>
    
                                <?php
                                 }
                                 //Loop Sum or Total of All Amount Column
                                 $sum = 0;
                                 for($b = 1; $b < count($_SESSION[' ']); $b++){ 
                                     $sum += (int)$_SESSION[' '][$b]['amount'];
                                    }
                                    
                                
                                    ?>
                              </tbody>
                        </table>
                            
                            <div class="container col-md-3 float-end bg-light">
                                <div class="input-group">
                                    <h6 class="input-grout-text pt-1 mx-2">Total: <?php echo $sum .'$'; 
                                
                                    ?></h6>
                                  </div>
                            </div> 
                              <?php
}
                              ?>
                    </div>
                </div>
               
            </div>
        </div>
    </div>


   
    
</body>
</html>