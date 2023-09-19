<h3 class="text-center text-success font-weight-bold">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-light font-weight-bold text-center">
            <th>SNo</th>
            <th>Category Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light font-weight-bold text-center">
        <?php
        $select_cat = "select * from `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $category_title; ?>
                </td>
                <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i
                            class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>