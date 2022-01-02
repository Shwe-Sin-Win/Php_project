<?php
require 'dbconnect.php';
 include ('BackEnd_header.php');

 $sql="SELECT * FROM users";
 $stmt=$conn->prepare($sql);
 $stmt->execute();

 $users=$stmt->fetchAll();


  ?>

    <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> User Lists </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($users as $user): 
                                                $id=$user['id'];
                                                $name=$user['name'];
                                                $photo=$user['profile'];   

                                        ?>
                                        <tr>
                                            <td> 
                                                <?php echo $i++; ?> 
                                            </td>
                                            <td> 
                                                <img src="<?=$photo ?>" class="img-fluid w-25">
                                                <?= $name ?> 
                                            </td>
                                            <td>
                                                <a href="userdetail.php?id=<?= $id; ?>" class="btn btn-primary">
                                                    <i class="icofont-info"></i>
                                                </a>

                                                <a href="useredit.php?id=<?= $id ?>" class="btn btn-warning">
                                                    <i class="icofont-ui-settings"></i>
                                                </a>

                                                <a href="userdelete.php?id=<?= $id ?>" class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

<?php include ('BackEnd_footer.php'); ?>   