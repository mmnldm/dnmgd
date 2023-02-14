<?php
require "action.php";

if (isset($_GET['pro_id'])) {
    $p_id = $_GET['pro_id'];

    $get_pro = "select * from products where product_id=$p_id";
    $run_query = mysqli_query($con, $get_pro);
    $row = mysqli_fetch_array($run_query);

    $qty = $row['product_qty'];
    $pro_cat = $row['product_cat'];
    $pro_name = $row['product_title'];
    $pro_price = $row['product_price'];
    $pro_img = $row['product_image'];
    $second_img = $row['second_image'];
    $pro_desc = $row['product_desc'];
    $formatted_price = number_format($pro_price, '2');
    $color = $row['color'];

    $get_pro_cat = "select * from categories where cat_id=$pro_cat";
    $run_pro_cat = mysqli_query($con, $get_pro_cat);
    $row_pro_cat = mysqli_fetch_array($run_pro_cat);

    $pro_cat_title = $row_pro_cat['cat_title'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DNMGD</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://fonts.cdnfonts.com/css/vcr-osd-mono" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- <link rel="stylesheet" href="./css/tailwind.min.css"> -->
    <script
      src="https://kit.fontawesome.com/1f649878fb.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="font-vcr-osd dark:bg-black dark:text-white">
    <!---NAVBAR -->
    <nav
      class="mx-auto max-w-screen-xl border-b border-black dark:border-white lg:px-auto"
    >
      <div class="flex justify-between py-1 px-2 text-lg lg:text-2xl">
        <div>
          <a class="ml-2 line-through" href="index.php">DNMGD </a>
        </div>

        <div class="nocart flex">
          <a class=" " href="./cart.php"> CART(<span>0</span>) </a>
        </div>
      </div>
    </nav>
    <!--NAVBAR ENDS-->

    <section class="py-4">
      <div class="container max-w-screen-xl mx-auto px-4">
        <!-- breadcrumbs start -->
        <ol
          class="flex justify-center text-black space-x-1 md:space-x-3 items-center dark:text-white uppercase"
        >
          <li class="inline-flex items-center">
            <a class=" " href="shop.php">Home</a>
            <i class="ml-3 text-gray-400 fa fa-chevron-right"></i>
          </li>
          <li class="inline-flex items-center" aria-current="page">
            <a class="hover:text-blue-600" href="shop.php"> MENSWEAR </a>
            <i class="ml-3 text-gray-400 fa fa-chevron-right"></i>
          </li>
          <li class="inline-flex items-center dark:text-white">Detail</li>
        </ol>
        <!-- breadcrumbs end -->
      </div>
      <!-- container .// -->
    </section>

    <section class="py-10">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          <aside>
            <!-- gallery -->
            <div
              class="border border-gray-200 shadow-sm p-3 text-center rounded mb-5"
            >
              <img
                class="object-cover inline-block"
                width="400"
                src="./admin/product_images/<?php echo "$pro_img"; ?>"
                alt="Product title"
              />
            </div>
            <div class="space-x-2 overflow-auto text-center whitespace-nowrap">
              <a
                href="#"
                class="inline-block border border-gray-200 p-1 rounded-md hover:border-blue-500"
              >
                <img class="w-14 h-14" src="./admin/product_images/<?php echo "$pro_img"; ?>" alt="Product title" />
              </a>
              <a
                href="#"
                class="inline-block border border-gray-200 p-1 rounded-md hover:border-blue-500"
              >
                <img
                  class="w-14 h-14 object-cover"
                  src="./admin/product_images/<?php echo "$second_img"; ?>"
                  alt="Product title"
                />
              </a>
            </div>
            <!-- gallery end.// -->
          </aside>
          <main>
            <h2 class="font-semibold text-2xl mb-4">
              <?php echo "$pro_name"; ?>
            </h2>

            <p class="mb-4 font-semibold text-xl">
              <?php echo CURRENCY . " " . "$formatted_price"; ?>
              <span class="text-base font-normal">/<?php echo $qty; ?> box</span>
            </p>

            <p class="mb-4 dark:text-white">
              <?php echo "$pro_desc"; ?>
            </p>

            <ul class="mb-5 dark:text-white">
              <li class="mb-1">
                <b class="font-medium w-36 inline-block">Model#:</b>
                <span>Odsy-1000</span>
              </li>
              <li class="mb-1">
                <b class="font-medium w-36 inline-block">Color:</b>
                <span><?php echo $color; ?></span>
              </li>
              <li class="mb-1">
                <b class="font-medium w-36 inline-block">Delivery:</b>
                <span>Russia, USA & Europe</span>
              </li>
            </ul>

            <!-- action buttons -->
            <div class="flex flex-wrap gap-2">
              <a
                class="px-4 py-2 inline-block text-white bg-yellow-500 border border-transparent rounded-md hover:bg-yellow-600"
                href="checkout.php"
              >
                Buy now
              </a>
              <a
                class="px-4 py-2 inline-block text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700"
                href="#"
              >
                <i class="fa fa-shopping-cart mr-2"></i>
                Add to cart
              </a>
            </div>
            <!-- action buttons .//end -->
          </main>
        </div>
        <!-- grid .// -->
      </div>
      <!-- container .// -->
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
