<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-brain"></i>BrainCare</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?php echo $actual_link . $dir_path . '/index.php'; ?>" class="nav-item nav-link active">Home</a>
                <a href="<?php echo $actual_link . $dir_path . '/about.php'; ?>" class="nav-item nav-link">About</a>
                <a href="<?php echo $actual_link . $dir_path . '/education.php'; ?>" class="nav-item nav-link">Education</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?php echo $actual_link . $dir_path . '/price.php'; ?>" class="dropdown-item">Pricing Plan</a>
                        <a href="<?php echo $actual_link . $dir_path . '/team.php'; ?>" class="dropdown-item">Our Dentist</a>
                        <a href="<?php echo $actual_link . $dir_path . '/testimonial.php'; ?>" class="dropdown-item">Testimonial</a>
                        <a href="<?php echo $actual_link . $dir_path . '/appointment.php'; ?>" class="dropdown-item">Appointment</a>
                    </div>
                </div> -->
                <a href="<?php echo $actual_link . $dir_path . '/registerForm.php'; ?>" class="nav-item nav-link">Register</a>
                <a href="<?php echo $actual_link . $dir_path . '/contact.php'; ?>" class="nav-item nav-link">Contact</a>
            </div>
            <!-- <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button> -->
            <!-- <a href="<?php echo $actual_link . $dir_path . '/appointment.php'; ?>" class="btn btn-primary py-2 px-4 ms-3">Take Test</a> -->

            

<?php if(isset($_SESSION['isLoggedIn'])){ ?>
    <a href="<?php echo $actual_link . $dir_path . '/dashboard/dashboard/user.php'; ?>" >
    <button class="btn btn-outline-info py-2 px-4 ms-3">

        Welcome <?php echo $_SESSION['name'] ?> 
    </button>
</a>
    <?php } ?>
    
    <?php if(!isset($_SESSION['isLoggedIn'])){ ?>
        <a href="<?php echo $actual_link . $dir_path . '/loginForm.php'; ?>" >
        <button class="btn btn-outline-info py-2 px-4 ms-3"">Log In</button>
        
    </a>
    <?php } ?>
        </div>
    </nav>
    <!-- Navbar End -->
