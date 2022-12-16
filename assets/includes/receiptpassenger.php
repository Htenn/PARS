<!-- Main -->
<div id="main">

<!-- Content -->
    <section id="content" class="main">

        <!-- Text -->
        <!-- Form -->
            <section>
                <form method="post" action="add_passenger-config.php">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <h2>Passenger</h2>
                        </div>
                        <?php
                        
                        $con = mysqli_connect("localhost", "root", "", "id17946631_pars");
                        
                           
                            
                            $result = mysqli_query($con,"SELECT passengerFirstName, passengerMiddleName, passengerLastName, passengerNationality, passengerGender, flight.flightNumber, flightSeatNumber, flightSeatClass, flightOrigin, flightDestination, timeDepartOrigin, timeArriveDestination FROM passenger INNER JOIN flightseat ON passenger.passengerID = flightseat.passengerID INNER JOIN flight ON flightseat.flightNumber = flight.flightNumber");
                            
                            


                            while($row=mysqli_fetch_array($result))
                            {
                            
                        ?>

                         <div class="col-4 col-12-xsmall"> 
                            <h2>First Name: <?= $row["passengerFirstName"]; ?> </h2>
                            
                        </div>
                        <div class="col-4 col-12-xsmall">	
                            <h2>Middle Name: <?= $row["passengerMiddleName"]; ?> </h2>
                            
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h2>Last Name: <?= $row["passengerLastName"]; ?> </h2>
                            
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Nationality: <?= $row["passengerNationality"]; ?> </h2>
                            
                        </div>
                        
                        <div class="col-6">
                            <h2>Gender: <?php if ($row["passengerGender"] == 1)
                                                echo "Male";
                                                else
                                                echo "female"; ?>
                                                </h2>
                            
                        </div>
                       

                       
                        <div class="col-7 col-12-xsmall">
                            <h2>Flight No.:  <?= $row["flightNumber"];?></h2>
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            
                            <h2>Seat No.: <?= $row["flightSeatNumber"];?></h2>
                            
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Class Type: <?= $row["flightSeatClass"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Origin: <?= $row["flightOrigin"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Destination: <?= $row["flightDestination"];?></h2>
                            
                        </div>
                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Departure Time: <?= $row["timeDepartOrigin"];?></h2>
                            
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Arrival Time: <?= $row["timeArriveDestination"];?></h2>
                            
                        </div>
                            
                        <?php
                        }
                        ?>
                        
                        
                        
                        
                        
                    </div>
                </form>
            </section>
    </section>
</div>