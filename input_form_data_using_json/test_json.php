<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to use SESSION in PHP</title>

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
                                <label for="name" class="form-label text-dark">User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter User Name">
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="form-label text-dark">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="qty" class="form-label text-dark">Phone Number</label>
                                <input type="text" class="form-control" name="qty" placeholder="Enter Qty">
                            </div> -->
                            <div class="mb-3">
                                <label for="qty" class="form-label text-dark">Enter Qty</label>
                                <input type="number" class="form-control" name="qty" placeholder="Enter Qualty">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label text-dark">Enter Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price">
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
                                    <th scope="col">User Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                            if(isset($_POST['store'])){

                                $form_data = array(
                                    'username' => $_POST['username'],  
                                    'product_name' => $_POST['product_name'], 
                                    'qty' => $_POST['qty'],  
                                    'price' => $_POST['price'],  
                                );

                                if(filesize('result.json') == 0){
                                    $first_recode = array($form_data);
    
                                    $data_to_save = $first_recode;
                                }else{
                                    $old_recode = json_decode(file_get_contents('result.json'));

                                    array_push($old_recode, $form_data);

                                    $data_to_save = $old_recode;
                                    
                                }

                                if(!file_put_contents('result.json', json_encode($data_to_save, JSON_PRETTY_PRINT))){
                                    echo $error = "Error, please try again";
                                }else{
                                    echo $success = "Data Insert Successfully";
                                }
    
                            }

                            // // check if the json file is not exists
                            // if(file_exists('result.json')){
                            //     // var_dump($_POST)
                            //     // load json file 
                            //     $data = file_get_contents('result.json');
                            //     //decode json to assocative array
                            //     $json_arr = json_decode($data, true);
                            // }else{
                            //     // if the file is not exists than create empty json file
                            //     $json_arr = [];
                            // } 
                            // var_dump($json_arr);
                            // // echo $data;

                            // //save input form data into json file
                            // file_put_contents('result.json', json_encode($json_arr, JSON_PRETTY_PRINT));

                            ?>

                            <?php 
                                $json_data = file_get_contents('result.json');
                                $datas = json_decode($json_data, true);

                                if(count($datas) != 0){

                                    // empty array sum
                                    $sum = [];
                                    foreach($datas as $key => $data){

                                        ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $data['username'] ?></td>
                                            <td><?php echo $data['product_name'] ?></td>
                                            <td><?php echo $data['qty'] ?></td>
                                            <td><?php echo $data['price'] . "$" ?></td>
                                            <td><?php echo $data['qty'] * $data['price'] . ".00$" ?></td>
                                        </tr>
                                        
                                        <?php

                                        $total = $data['qty'] * $data['price'];
                                        array_push($sum, $total);  

                                    } 

                                    // echo number_format(array_sum($sum), 2);

                                }

                            ?>
                            </tbody>
                        </table>

                        <div class="container col-md-3 float-end bg-light">
                            <div class="input-group">
                                <h6 class="input-grout-text pt-1 mx-2">Total: <?php echo number_format(array_sum($sum), 2) .'$'; ?></h6>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>



