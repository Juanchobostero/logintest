<?php 
require_once 'includes/header.php'; 
require_once 'includes/msg.php'; 
?>
<section class="content">
    <?php if(isset($_SESSION['user'])): ?>
        <div class="users-wrap">
            <h3>SYSTEM USERS</h3>
            <button onclick="register()" class="new-user">Add user</button>
            <?php if(isset($_SESSION['done'])): ?>
                <div class="alert-success"><?=$_SESSION['done']?></div>
            <?php endif; ?>
            <?php if(isset($_SESSION['deleted'])):?>
                <div class="alert-success"><?=$_SESSION['deleted']?></div>
            <?php endif; ?>
            <hr>
            <div class="users">
                <table>
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $users = get_users($db);
                        while($user = mysqli_fetch_assoc($users)):?>
                            <tr>
                            <td data-label="Name"><?=$user['name']?></td>
                            <td data-label="Email"><?=$user['email']?></td>
                            <td>
                            <?php if($user['id'] != $_SESSION['user']['id']): ?>
                                <a href="edit.php?id=<?=$user['id']?>"><button class="update">Update</button></a>
                                <a href="controllers/delete.php?id=<?=$user['id']?>"><button class="delete">Delete</button></a>
                            <?php endif; ?>
                            </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>
    <?php else: ?>
        <div class="form-login">
            <H1>Login</H1>
            <hr>
            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alert-error"><?=$_SESSION['error_login']?></div>
            <?php endif; ?>
            <form id="form-vali" class="form" action="controllers/login.php"  method="POST">
                
                <div class="form-group">
                    <input class="mail" type="mail" id="email" name="email" placeholder="Email" autocomplete="off">
                    
                    <small></small>
                </div>
                <div class="form-group">
                    <input class="password" type="password" id="password" name="password" placeholder="Password" autocomplete="off">
                    <small></small>
                </div>
                
                <hr>
                <div class="buttons">
                    <button type="submit" class="btn-login">Submit</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
        
</section>

<?php 
require_once 'includes/footer.php'; 
?>