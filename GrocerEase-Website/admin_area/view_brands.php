<h3 class="text-center text-success font-weight-bold">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-light font-weight-bold text-center">
            <th>SNo</th>
            <th>Brand Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light font-weight-bold text-center">
        <?php
        $select_cat = "select * from `brands`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $brand_title; ?>
                </td>
                <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>' type="button" class="text-light "
                        data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary font-weight-bold " data-dismiss="modal"><a
                        href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-success font-weight-bold">
                    <a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                        class="text-light text-decoration-none ">Yes</a>
                </button>
            </div>
        </div>
    </div>
</div>