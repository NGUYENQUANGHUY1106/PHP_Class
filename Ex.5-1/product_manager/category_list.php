<?php include '../view/header.php'; 
  require_once('../model/database.php');

  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }
  
  
  $query = ' SELECT * FROM categories 
             ORDER BY categoryID ';
             $categories = $db ->query($query);
?>
<div id="main">

    <h1 class="top">Category List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
    <?php foreach($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName'];  ?></td>
            <td>
            <form action="delete_category.php" method="post"
                        id="delete_product_form">
                        <input type="hidden" name="category_id"
                            value="<?php echo $category['categoryID']; ?>"/>
                        <input type="submit" value="Delete"/>
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    <form action="./product_add.php" method="post"
          id="add_category_form">

        <label>Name:</label>
        <input type="input" name="name" />
        <input id="add_category_button" type="submit" value="Add"/>
    </form>
    <br />

    <!-- add form for adding a category here -->

    <p><a href="index.php?action=list_products">List Products</a></p>

</div>
<?php include '../view/footer.php'; ?>