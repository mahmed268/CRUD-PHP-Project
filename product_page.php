<?php include_once 'layouts/header.php' ?>
<?php include_once 'layouts/navbar.php' ?>
<?php include_once 'layouts/link.php' ?>

<body>

    <?php include_once 'layouts/navbar.php' ?>

    <?php
    require_once 'vendor/autoload.php';

    use Pondit\Product;

    $producutObject = new Product;
    
    $producut = $producutObject->show($_GET['id']);

    ?>


    <div class="container">

        <!-- <div class="p-2">
            </div> -->

        <div class="row my-5">
            <div class="col-6 ">
                <img src="assets/images/<?php echo $producut['picture'] ?>" height="auto" width="100%" alt="">
            </div>
            <div class="col-6 pl-5">

                <div class="row">
                    <div>
                        <h4><?php echo "Model No : ". $producut['title'] ?></h4>
                        <p class="text-black"><?php echo "Description : ". $producut['description'] ?></p>
                    </div>
                    <div class="col-8">
                        <h4> <?php echo  $producut['price']." Tk" ?></h4>
                        <p><del class="text-danger">$300.00</del> <span class="badge
                                    bg-danger">Save More</span> </p>


                    </div>
                    <div class="col-4 text-end">
                        <h5 class="text-success">IN STOCK</h5>
                        <P class="m-0 text-muted">Unit of Measure price</P>
                        <p class="text-muted"> Minimum Order Qty 1 </p>
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <h6>Qantity</h6>
                    <div>
                        <button class="btn btn-group btn-secondary">-</button>
                        <button disabled class="btn btn-group">6</button>
                        <button class="btn btn-group btn-secondary">+</button>
                        <button class="btn btn-warning">Buy Now</button>
                    </div>

                    <div class="mt-3">
                        <ul>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                        <h6>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Laboriosam, aut?</h6>
                        <p>Lorem, ipsum dolor sit amet consectetur
                            adipisicing elit. Libero, sit? </p>
                    </div>
                </div>


            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <ul>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <ul>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <ul>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                    </div>
                </div>


                <div class="mt-3">

                </div>

            </div>
        </div>

        <?php include_once 'layouts/footer.php'; ?>