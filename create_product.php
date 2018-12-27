<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$product = new Product($db);
$category = new Category($db);
// Set page headers
$page_title = "Create Product";
include_once "layout_header.php";

    // contents will be here
    echo "<div class='right-button-margin'>";
        echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
    echo "</div>";
?>
    <!-- HTML form for creating products -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
        <table class='table table-hover table-responsive table-bordered'>
    
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' class='form-control' /></td>
            </tr>
    
            <tr>
                <td>Price</td>
                <td><input type='text' name='price' class='form-control' /></td>
            </tr>
    
            <tr>
                <td>Description</td>
                <td><textarea name='description' class='form-control'></textarea></td>
            </tr>
    
            <tr>
                <td>Category</td>
                <td>
                    <?php
                        //Read the product categories from the database
                        $stmt =  $category->read();
                        //put them in a select dropdown
                        echo '<select name="category_id" class="form-control"></select>';
                            echo '<option>Select Category...</option>';

                            while($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_category);
                                echo '<option value="{$id}">{$name}</option>';
                            }
                        echo '</select>';
                    ?>
                </td>
            </tr>
    
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Create</button>
                </td>
            </tr>
    
        </table>
    </form>
<?php
//footer
include_once "layout_footer.php";
?>