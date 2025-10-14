<?php
    $pageTitle = "Create Profile";
    $pageDesc  = "This page lets the user create a profile";
    require_once './include/Database.php';
    $success = null;
    // 1. check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // 2. Get the submitted data
        $username = trim($_POST['username']);
        $bio = trim($_POST['bio']);
        // 3. the $_FILES superglobal holds information about the uploaded file
        $imageFile = $_FILES['Profile_image'];
        // 4. Validate and create the record using the OOP method
        if($db->create($username, $bio, $imageFile)){
            $success = "Profile Published";
        }
    }
    require './template/header.php';
?>
    <main>
        <section class="row">
            <h1 class="mb-4">Create New User Profile</h1>   
            <div class="col-4">
                <a href="index.php" class="btn btn-secondary mb-3">View Users</a>
            </div>
        </section>
        <section class="messageRow row">
            <?php if($success): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <?php if($db->error): ?>
                <div class="alert alert-danger" role="alert">
                    Error: <?php echo $db->error; ?>
                </div>
            <?php endif; ?>
        </section>
        <section class="createRow row">
            <form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">    
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">
                </div>    
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" required><?php echo htmlspecialchars($bio ?? ''); ?></textarea>
                </div>   
                <div class="mb-3">
                    <label for="Profile_image" class="form-label">Profile Image</label>
                    <input class="form-control" type="file" id="Profile_image" name="Profile_image" required>
                    <small class="text-muted">Allowed: JPG, PNG, GIF. Max 2MB.</small>
                </div>      
                <button type="submit" class="btn btn-primary">Publish User</button>
            </form>
        </section>
    </main>
<?php require './template/footer.php'; ?>