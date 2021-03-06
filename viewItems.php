<?php if ($this->session->userdata('loggedin')) {
    include 'loggedin/header.php';
}
else{
    include 'partials/header.php';
}

?>


<!-- Page Content -->
<div class="container" style="min-height: 402px;">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Welcome
        <small><?php echo $this->session->userdata('full_name'); ?>..</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo base_url(); ?>">Home</a>
        </li>
        <li class="breadcrumb-item active">View Items</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
            <div class="list-group text-center" >
                <a href="<?php echo base_url('Manager/Home'); ?>" class="list-group-item active">Profile</a>
                <a href="<?php echo base_url('Register/RegisterUser'); ?>" class="list-group-item">Register New User</a>
                <a href="<?php echo base_url('ManageUsers/viewUsers'); ?>" class="list-group-item">Manage User</a>
                <a href="<?php echo base_url('itemController/addItem'); ?>" class="list-group-item">Add Item Details</a>
<!--                <a href="--><?php //echo base_url('itemController/viewAll'); ?><!--" class="list-group-item">View Item Details</a>-->
                <a href="<?php echo base_url('itemController/viewItems'); ?>" class="list-group-item">View,Update or Delete an Item </a>

            </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
            <?php if ($this->session->flashdata('success')) {?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php  } ?>
            <!-- error messages  -->
            <?php if ($this->session->flashdata('error')) {?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php  } ?>


            <!-- validation messages for taking inputs -->
            <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>','</div>');
            ?>

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <h1>Item Details</h1><br>
                </div>

<!--                <div class="col-lg-4 mb-4">-->
<!--                    <div class="profile-header-container">-->
<!--                        <div class="profile-header-img">-->
<!--                            <img class="img-circle" src="--><?php //echo base_url(); ?><!--assets/images/profile.jpg" style="width: 200px; height: 200px; position: absolute;" />-->
<!--                        </div>-->
<!--                    </div><tbody>-->
<!--                </div>-->
            </div>


            <?php echo form_open('itemController/searchItem',['class'=>'form-inline']); ?>
            <div class="form-group ">
                <input type="text" class="form-control col-lg-8 " id="exampleInputEmail1" placeholder="Enter any keyword.." name="search">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default">Search</button>
            </div>
            <?php echo form_close(); ?>
            <br>


            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>Item Id</th>
                        <th>Item Name</th>
                        <th>Unit Price</th>
                        <th>Item Category</th>
                        <th>Quantity</th>
                        <th>Unit of Measurment</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php if (count($records)): ?>
                        <?php foreach ($records as $row): ?>

                    <tr>
                        <td><?php echo $row->shop_item_id ?></td>
                        <td><?php echo $row->item_name; ?></td>
                        <td><?php echo $row->unit_price; ?></td>
                        <td><?php echo $row->item_category;?></td>
                        <td><?php echo $row->quantity;?></td>
                        <td><?php echo $row->measuring_unit;?></td>
                        <td><?php echo $row->item_description; ?></td>
                        <td><a href="editUser/<?php echo $row->shop_item_id ?>"><button type='button' class='btn btn-primary' >Edit</button></a>        </td>
                        <td><a href="deleteItem/<?php echo $row->shop_item_id ?>"><button type='submit' class='btn btn-danger' name='delete'>Remove</button></a>        </td>

                    </tr>

                    <?php endforeach; ?>
                    <?php else: ?>

                        <br>
                        <p style="margin-bottom: 50px;">No such an item in the database with the given index</p>
                    <?php endif ?>

                    </tbody>
                </table>
            </div>

            <p> </p>
        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'loggedin/footer.php'; ?>
