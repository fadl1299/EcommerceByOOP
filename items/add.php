<div class="container">
     <h1 class="text-center member-header">Add New Categories</h1>
     <form class="edit" action="?do=Insert" method="POST" enctype="multipart/form-data">
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Image</span>
             <input type="file" class="form-control" name="image" required="required">
         </div>
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Name</span>
             <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping" autocomplete='off' required="required">
         </div>
         <div class="input-group flex-nowrap">
             <span class="input-group-text" id="addon-wrapping">Description Category</span>
             <input type="text" class="password form-control" name="desc" placeholder="Description" aria-label="Description" aria-describedby="addon-wrapping" autocomplete="off" required="required">
         </div>
         <div class="input-group flex-nowrap">
             <input class="btn btn-primary save" type="submit" value="Add Category" />
         </div>
     </form>
 </div>