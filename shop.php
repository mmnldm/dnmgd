<?php
require "action.php";
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>DNMGD</title>
<link rel="stylesheet" href="./css/style.css" />
<link rel="stylesheet" href="./css/strike.css" />

<link href="https://fonts.cdnfonts.com/css/vcr-osd-mono" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.css" rel="stylesheet" type="text/css" />
<script src="https://kit.fontawesome.com/1f649878fb.js" crossorigin="anonymous"></script>
</head>
  <body class="font-vcr-osd dark:bg-black dark:text-white">
    <!---NAVBAR -->
    <nav
      class="mx-auto max-w-screen-xl border-b border-black dark:border-white lg:px-auto"
    >
      <div class="flex justify-between py-1 px-2 text-lg lg:text-2xl">
        <div>
          <a class="ml-2 strike" href="index.php">DNMGD </a>
        </div>

        <div class="nocart flex">
          <a class=" " href="./cart.php"> CART(<span>0</span>) </a>
        </div>
      </div>
      <div class="flex gap-5 justify-center">
        <a href="shop.php">MENSWEAR</a>
        <a href="woshop.php">WOMENSWEAR</a>
      </div>
    </nav>
    <!--NAVBAR ENDS-->

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
                        <a
                          class='inline-block dark:text-white text-black text-center border-transparent rounded-md hover:text-blue-700'
                          href='#'
                        >
                          Add to cart
                        </a>
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

    <footer>
      <!--FOOTER SECTION BEGINS HERE-->
      <section class="border-t border-black dark:border-white">
        <div class="container max-w-screen-xl mx-auto px-4">
          <div class="flex flex-wrap">
            <aside class="w-full md:w-1/3 lg:w-1/4 mb-5 tracking-wider">
              <ul class="mt-2">
                <li>
                  <a href="#"> MEDIA </a>
                </li>
                <li>
                  <a href="#"> ARCHIVE </a>
                </li>
                <li>
                  <a href="#"> INSTAGRAM </a>
                </li>
              </ul>
            </aside>
          </div>
        </div>
      </section>
    </footer>
    <!--FOOTER SECTION ENDS HERE-->
  </body>
</html>
