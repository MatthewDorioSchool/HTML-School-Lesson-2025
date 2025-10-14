<?php
     
    $pageTitle = "View User profiles";
    $pageDesc  = "This page will allow the user to add their name, image, and bio";
    require_once './include/Database.php';
    
    $users = $db->read();
    
    if($users === false){
        $readError = "<p>No Users found</p>";
    }
    require './template/header.php';
?>
 <main>
        <section class="row">
            <h1 class="mb-4">Show The world YOU</h1>
            <div class="col-4">
                <a href="create.php" class="btn btn-success mb-3">Add yourself</a>
            </div>
        </section>
        <section class="messageRow row">
            <?php if(isset($readError)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $readError; ?>
                </div>
            <?php endif; ?>
        </section>
        <section class="ProfileRow row">
            <?php if($users && count($users) > 0): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User#</th>
                        <th>Profile Pic</th>
                        <th>UserName</th>
                        <th>Bio</th>
                        <th>Date Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($user['image_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($user['username']); ?>" 
                                     class="user-img">
                            </td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['bio']); ?></td>
                            <td><?php echo htmlspecialchars($user['date_joined']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="alert alert-info">
                    No users found, try adding yourself.
                </div>
            <?php endif; ?>
        </section>
    </main>
<?php require './template/footer.php'; ?>