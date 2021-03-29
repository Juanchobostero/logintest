<?php 
require_once 'includes/header.php'; 
?>
<section class="content">
    
    <div class="form-login">
        <H1>Create user</H1>
        <hr>
        <form id="form-reg" class="form" action="controllers/register.php"  method="POST">
            <div class="form-group">
                <input 
                class="name" 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Name"
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
                >
                <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : '' ?>
                <small></small>
            </div>
            <div class="form-group">
                <input 
                class="password" 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Password"
                >
                <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : '' ?>
                <small></small>
            </div>
            <hr>
            <div class="buttons">
                <button type="submit" class="btn-login">Submit</button>
            </div>
        </form>
        <?php dropErrors() ?>
    </div>
</section>

<?php 
require_once 'includes/footer.php'; 
?>