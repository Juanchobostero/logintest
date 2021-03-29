<?php 
require_once 'includes/header.php'; 
$user = get_user($db, $_GET['id']);
$user_edit = mysqli_fetch_assoc($user);
?>
<section class="content">
    
    <div class="form-login">
        <H1>Edit user</H1>
        <hr>
        <form id="form-edit" class="form" action="controllers/update.php?id=<?=$user_edit['id']?>"  method="POST">
            <div class="form-group">
                <input 
                class="name" 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Name"
                value="<?=$user_edit['name']?>"
                >
                <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : '' ?>
                <small></small>
                
            </div>
            <div class="form-group">
                <input 
                class="mail" 
                type="mail" 
                id="email" 
                name="email" 
                placeholder="Email"
                value="<?=$user_edit['email']?>"
                >
                <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : '' ?>
                <small></small>
            </div>
            <hr>
            <div class="buttons">
                <button type="submit" class="btn-login">Update</button>
            </div>
        </form>
        <?php dropErrors() ?>
    </div>
</section>

<?php 
require_once 'includes/footer.php'; 
?>