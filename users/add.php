<div class="container">
    <h1 class="text-center member-header">Add New User</h1>
    <form class="edit" action="?do=Insert" method="POST" enctype="multipart/form-data">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Image</span>
            <input type="file" class="form-control" name="image" required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Username</span>
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Password</span>
            <input type="password" class="password form-control" name="password" placeholder="password" autocomplete="new-password" required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Email</span>
            <input type="text" class="form-control" name="email" placeholder="email" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Job</span>
            <input type="text" class="form-control" name="job" placeholder="User Job" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Full Name</span>
            <input type="text" class="form-control" name="full" placeholder="full name" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <input class="btn btn-primary save" type="submit" value="Add User" />
        </div>
    </form>
</div>