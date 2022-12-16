<!-- Main -->
<div id="main">

<!-- Content -->
    <section id="content" class="main">

        <!-- Text -->
        <!-- Form -->
            <section>
                <form method="post" action="add_passenger-config.php">
                    <div class="row gtr-uniform">
                        <div class="col-4 col-12-xsmall">
                            <h2>First Name</h2>
                            <input type="text" name="passengerFirstName" id="passengerFirstName" onchange="saveValue(this)" value="" placeholder="First Name" required/>
                        </div>
                        <div class="col-4 col-12-xsmall">	
                            <h2>Middle Name</h2>
                            <input type="text" name="passengerMiddleName" id="passengerMiddleName" onchange="saveValue(this)" value="" placeholder="Middle Name" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h2>Last Name</h2>
                            <input type="text" name="passengerLastName" id="passengerLastName" onchange="saveValue(this)" value="" placeholder="Last Name" required/>
                        
                        </div>
                        
                        <div class="col-6">
                            <h2>Gender</h2>
                            <select name="passengerGender" onchange="saveValue(this)" id="passengerGender" >
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                
                            </select>
                        </div>

                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Birthdate</h2>
                            <input type="date" name="passengerBirthday" id="passengerBirthday" onchange="saveValue(this)" value="" placeholder="MM/DD/YY" />
                        </div>

                        
                        <div class="col-6 col-12-xsmall">
                            <h2>Age</h2>
                            <input type="text" name="passengerAge" id="passengerAge" onchange="saveValue(this)" value="" placeholder="Age" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Email</h2>
                            <input type="email" name="passengerEmail" id="passengerEmail" onchange="saveValue(this)" value="" placeholder="Email" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Contact Number</h2>
                            <input type="text" name="passengerContactNum" id="passengerContactNum" onchange="saveValue(this)" value="" placeholder="************" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <h2>Nationality</h2>
                            <input type="text" name="passengerNationality" id="passengerNationality" onchange="saveValue(this)" value="" placeholder="Nationality" required/>
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Passenger Type</h2>
                            <select name="passengerType" id="passengerType">
                                <option value="Normal">Normal</option>
                                <option value="Infant">Infant</option>
                                <option value="Unaccompanied Minor">Unaccompanied Minor</option>
                                <option value="Handicapped">Handicapped</option>
                                <option value="Medically OK for travel">Medically OK for travel</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                
                            </select>
                        </div>
                        
                        
                    </div>
                </form>
            </section>
    </section>
</div>