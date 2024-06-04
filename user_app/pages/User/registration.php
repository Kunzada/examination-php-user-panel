<div class="main_container">
    <div class="container4">
        <header>Registration</header>

        <form method="post" enctype="multipart/form-data">

            <?php if (!empty($error) && isset($error)) { ?>

                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php } ?>

            <?php if (!empty($success) && isset($error)) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>

            <?php } ?>
            <div class="fields">
                <div class="input-field">
                    <label>Name</label>
                    <input type="text" placeholder="Enter your name" name="username" required>
                </div>

                <div class="input-field">
                    <label>Surname</label>
                    <input type="text" placeholder="Enter your name" name="surname" required>
                </div>

                <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" placeholder="Enter birth date" name="birthday" required>
                </div>

                <div class="input-field">
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>



                <div class="input-field">
                    <label>Gender</label>
                    <select name="gender" required>
                        <option disabled selected>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Others</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="input-field">
                    <label>Profile Picture</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="input-field">
                    <label>Mobile Number</label>
                    <div class="select-box">
                        <div class="selected-option">
                            <div>
                                <span class="iconify" data-icon="flag:gb-4x3"></span>
                                <strong>+44</strong>
                            </div>
                            <input type="tel" name="phone_number" placeholder="Phone Number">
                        </div>
                        <div class="options">
                            <input type="text" class="search-box" placeholder="Search Country Name">
                            <ol>

                            </ol>
                        </div>
                    </div>
                </div>
                <button class="sumbit">
                    Отправить
                </button>

            </div>
    </div>








    </form>
    <script src="/user/js/auth.js"></script>
</div>
</div>