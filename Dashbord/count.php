
<div class="home-stats">
			<div class="container text-center">
				<h1>Dashboard</h1>
				<div class="row">
					<div class="col-md-3">
						<div class="stat st-members">
							<i class="fa fa-users"></i>
							<div class="info">
								Total Users
								<span>
									<a href="users.php">
                                        <?php 
                                        echo $fun->checkItem('UserID','users') ?>
                                    </a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="stat st-pending">
							<i class="fa fa-user-plus"></i>
							<div class="info">
								Pending Members
								<span>
									<a href="pendings.php?do=users">
										<?php echo $fun->checkItem('RegStatus','users',0) ?>
									</a>
								</span>
							</div>
						</div>
					</div>
        <div class="col-md-3">
            <div class="stats st-items">
                Total Categories
                <span>
                    <a href="categories.php">
                        <?php echo $fun->countItems('ID', 'categories')
                        ?>
                    </a>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats st-comments">
                Pending Categories
                <span>
                    <a href="pendings.php?do=categories">
                        <?php echo $fun->checkItem('Reg_status', 'categories', 0)?>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="stats st-members">
                Total Items
                <span>
                    <a href="items.php">
                        <?php echo $fun->countItems('Item_ID', 'items') ?>
                    </a>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats st-pending">
                Pending Items
                <span>
                    <a href="pendings.php?do=items">
                        <?php echo $fun->checkItem('Status', 'items', 0)?>
                    </a>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats st-items">
                Total Comments
                <span>
                    <a href="comments.php">
                        <?php echo $fun->countItems('c_id', 'comments')?>
                    </a>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats st-comments">
                Pending Comments
                <span> <a href="pendings.php?do=comments">
                        <?php echo $fun->checkItem('status', 'comments', 0)?>
                    </a></span>
            </div>
        </div>
    </div>
</div>