<?php
$query = "SELECT * FROM posts";

$result = mysqli_query($conn, $query);


$fetchData = mysqli_fetch_all($result, MYSQLI_ASSOC);






?>



<section class="mt-4">
    <div class="container ">

        <div class="row">

            <?php foreach ($fetchData as $data) : ?>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-title my-3 text-center">
                            <h3>

                                <?php
                                echo $data["title"];
                                ?>
                            </h3>
                        </div>
                        <hr>
                        <div class="card-description">
                            <p class="text-center">
                                <?php
                                echo $data["description"];
                                ?>
                            </p>
                        </div>
                        <hr>
                        <p class="card-text text-center">
                            <?php
                            echo $data["text"];
                            ?>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>



</section>