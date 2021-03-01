<div class="columns is-centered is-four-fifths">
    <form action="sign-up.php" onsubmit="isFormOk()" class="box" method="post">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="firstname">Firstname</label>
                    <div class="control">
                        <input id="firstname" name="firstname" class="input" type="text" placeholder="Chris">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" for="lastname">Lastname</label>
                    <div class="control">
                        <input id="lastname" name="lastname" class="input" type="text" placeholder="Redfield">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="username">Username</label>
                    <div class="control">
                        <input id="username" name="username" class="input" type="text" placeholder="C_Red_73">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="email">Email</label>
                    <div class="control">
                        <input id="email" name="email" class="input" type="email" placeholder="Redfield@Stars.com">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="password">Password</label>
                    <div class="control">
                        <input id="password" name="password" class="input" type="password" placeholder="********">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="ssn">Social Security Number</label>
                    <div class="control">
                        <input id="ssn" name="ssn" class="input" type="number" placeholder="322 656 968">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="phone-number">Phone Number</label>
                    <div class="control">
                        <input id="phone-number" name="phone-number" class="input" type="text" placeholder="450-559-1548">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="address">Address</label>
                    <div class="control">
                        <input id="address" name="address" class="input" type="text" placeholder="16 Avenue, Racoon City">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label class="radio">
                        <input type="radio" value="Male" name="gender">
                        Male
                    </label>
                    <label class="radio">
                        <input type="radio" value="Female" name="gender">
                        Female
                    </label>
                    <label class="radio" disabled>
                        <input type="radio" value="Apache_Helicopter" name="gender">
                        Apache Helicopter
                    </label>
                </div>
            </div>
        </div>
        <button class="button form-button">Register</button>
    </form>
</div>
</div>