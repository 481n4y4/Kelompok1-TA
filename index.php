<?php
include "layout/header.php"
?>

        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-secondary text-center rounded p-4">
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <h6 class="mb-0">Salse & Revenue</h6>
                  <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <div class="h-100 bg-secondary rounded p-4">
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <h6 class="mb-0">Calender</h6>
                  <a href="">Show All</a>
                </div>
                <div id="calender"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sales Chart End -->        

        
<?php
include "layout/footer.php"
?>