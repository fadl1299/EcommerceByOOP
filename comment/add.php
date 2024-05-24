<div class="container">
    <h1 class="text-center member-header">Add New Comment</h1>
    <form class="edit" action="?do=Insert" method="POST">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Comment</span>
            <input type="text" class="form-control" name="comment" placeholder="Comment" aria-label="Comment" aria-describedby="addon-wrapping" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Item</span>
            <select id="test" name="item">
                <option value="0"> </option>
                <?php

                $get_data = new Manage_Comments;

                $data =  $get_data->select_item('items', 'Item_ID', 'Name');

                ?>
            </select>
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">User</span>
            <select id="test" name="user">
                <option value="0"> </option>
                <?php
                $get_data = new Manage_Comments;

                $data =  $get_data->select_item('users', 'UserID', 'Username');

                ?>
            </select>
        </div>
        <div class="input-group flex-nowrap">
            <input class="btn btn-primary save" type="submit" value="Add Comment" />
        </div>
    </form>
</div>