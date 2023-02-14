<?php
require "action.php";
?>

<?php include './layout/header.php' ?>
    <!--NAVBAR ENDS-->

    <div class="container">
        <div class="grid-cols-12" id="product_msg">
        </div>
    </div>

    <section class="py-12">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
        >
        <?php
        $product_query = "SELECT * FROM products ORDER BY `product_id` DESC LIMIT 0,4";
        $run_query = mysqli_query($con, $product_query);
        if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
                $pro_id    = $row['product_id'];
                $pro_title = $row['product_title'];
                $pro_image = $row['product_image'];
                $pro_price = $row['product_price'];
                $formatted_price = number_format($pro_price, '2');
                echo "
                <div class='border border-black dark:border-white'>
                  <!--PRODUCT CARD -->
                  <article class='shadow-sm rounded'>
                    <a href='product.php?pro_id=$pro_id' class='block relative p-1'>
                      <img
                        src='./admin/product_images/$pro_image'
                        class='mx-auto w-auto'
                        height='350'
                        alt='Product title here'
                      />
                    </a>
                    <div class='p-4 dark:text-white'>
                      <a
                        href='product.php?pro_id=$pro_id'
                        class='block text-black-600 mb-3 hover:text-blue-500'
                      >$pro_title</a>

                      <div class='flex justify-between text-xl tracking-wide'>
                        <p class='font-semibold'>" . CURRENCY . " $formatted_price</p>

                         <button class='btn btn-addto-cart add' pid='$pro_id' id='product'>
                              Add To Cart
                          </button>
                    
                      </div>
                    </div>
                  </article>
                </div>";
            }
        }
        ?>
        </div>
      </div>
    </section>

  <?php include './layout/footer.php' ?>