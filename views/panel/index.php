<?php
    $title = 'Dashboard';
    require_once "header.php";
?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                <h2 class="font-w600 mb-2 mr-auto ">Dashboard</h2>
            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <h4 class="text-center">Map</h4>
                            <div class="cp-user-referral-content">

                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

<?php require_once "footer.php"; ?>