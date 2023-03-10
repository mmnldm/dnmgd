<?php
require "action.php";
?>
<?php include './layout/header.php' ?>
    <!--NAVBAR ENDED-->

    <!--  PAGE HEADER -->
    <section class="py-5 sm:py-7 bg-blue-100">
      <div class="container max-w-screen-xl mx-auto px-4">
        <!-- breadcrumbs start -->
        <ol
          class="inline-flex flex-wrap text-gray-600 space-x-1 md:space-x-3 items-center"
        >
          <li class="inline-flex items-center">
            <a class="text-gray-600 hover:text-blue-600" href="#">Home</a>
            <i class="ml-3 text-gray-400 fa fa-chevron-right"></i>
          </li>
          <li class="inline-flex items-center" aria-current="page">
            <a class="text-gray-600 hover:text-blue-600" href="cart.php"> Cart </a>
            <i class="ml-3 text-gray-400 fa fa-chevron-right"></i>
          </li>
          <li class="inline-flex items-center">Order</li>
        </ol>
        <!-- breadcrumbs end -->
      </div>
      <!-- /.container -->
    </section>
    <!--  PAGE HEADER .//END  -->

    <!--CHECKOUT PAGE -->
    <section class="py-10">
      <div class="container max-w-screen-xl mx-auto px-4 dark:bg-black">
        <div class="flex flex-col md:flex-row gap-4 lg:gap-8">
          <main class="md:w-2/3">
            <article
              class="border border-gray-200 shadow-sm rounded p-4 lg:p-6 mb-5 dark:bg-black dark:text-black"
            >
              <h2 class="text-xl font-semibold mb-5 dark:text-black">
                Guest checkout
              </h2>

              <div class="grid grid-cols-2 gap-x-3 dark:text-white">
                <div class="mb-4">
                  <label class="block mb-1"> First name </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>

                <div class="mb-4">
                  <label class="block mb-1"> Last name </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>
              </div>

              <div class="grid lg:grid-cols-2 gap-x-3">
                <div class="mb-4">
                  <label class="block mb-1 dark:text-white"> Phone </label>
                  <div class="flex w-full">
                    <input
                      class="appearance-none w-24 border border-gray-200 bg-gray-100 rounded-tl-md rounded-bl-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400"
                      type="text"
                      placeholder="Code"
                      value="+998"
                    />
                    <input
                      class="appearance-none flex-1 border border-gray-200 bg-gray-100 rounded-tr-md rounded-br-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400"
                      type="text"
                      placeholder="Type phone"
                    />
                  </div>
                </div>

                <div class="mb-4">
                  <label class="block mb-1 dark:text-white"> Email </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="email"
                    placeholder="Type here"
                  />
                </div>
              </div>

              <label class="flex items-center w-max my-4">
                <input checked="" name="" type="checkbox" class="h-4 w-4" />
                <span class="ml-2 inline-block text-gray-500">
                  I agree with Terms and Conditions
                </span>
              </label>

              <hr class="my-4" />

              <h2 class="text-xl font-semibold mb-5 dark:text-white">
                Shipping information
              </h2>

              <!-- radio selection -->
              <div class="grid sm:grid-cols-3 gap-3 mb-6">
                <label
                  class="flex p-3 border border-gray-200 rounded-md bg-gray-50 hover:border-blue-400 hover:bg-blue-50 cursor-pointer"
                >
                  <span
                    ><input name="shipping" type="radio" class="h-4 w-4 mt-1"
                  /></span>
                  <p class="ml-2">
                    <span>Express delivery</span>
                    <small class="block text-sm text-gray-400"
                      >3-4 days via Fedex</small
                    >
                  </p>
                </label>
                <label
                  class="flex p-3 border border-gray-200 rounded-md bg-gray-50 hover:border-blue-400 hover:bg-blue-50 cursor-pointer"
                >
                  <span
                    ><input name="shipping" type="radio" class="h-4 w-4 mt-1"
                  /></span>
                  <p class="ml-2">
                    <span>Express delivery</span>
                    <small class="block text-sm text-gray-400"
                      >3-4 days via Fedex</small
                    >
                  </p>
                </label>
              </div>
              <!-- radio selection .//end -->

              <div class="grid md:grid-cols-3 gap-x-3">
                <div class="mb-4 md:col-span-2">
                  <label class="block mb-1 dark:text-white"> Country* </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>

                <div class="mb-4 md:col-span-1">
                  <label class="block mb-1 dark:text-white"> City* </label>
                  <div class="relative">
                    <select
                      class="block appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    >
                      <option>Select here</option>
                      <option>Second option</option>
                      <option>Third option</option>
                    </select>
                    <i class="absolute inset-y-0 right-0 p-2 text-gray-400">
                      <svg
                        width="22"
                        height="22"
                        class="fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path d="M7 10l5 5 5-5H7z" />
                      </svg>
                    </i>
                  </div>
                </div>
              </div>

              <div class="grid md:grid-cols-3 gap-x-3">
                <div class="mb-4 md:col-span-1">
                  <label class="block mb-1 dark:text-white"> House </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>

                <div class="mb-4 md:col-span-1">
                  <label class="block mb-1 dark:text-white"> Building </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>

                <div class="mb-4 md:col-span-1">
                  <label class="block mb-1 dark:text-white"> ZIP code </label>
                  <input
                    class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                    type="text"
                    placeholder="Type here"
                  />
                </div>
              </div>

              <div class="mb-4">
                <label class="block mb-1 dark:text-white"> Other info </label>
                <textarea
                  placeholder="Type your wishes"
                  class="appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full"
                ></textarea>
              </div>

              <label class="flex items-center w-max my-4">
                <input checked="" name="" type="checkbox" class="h-4 w-4" />
                <span class="ml-2 inline-block text-gray-500 text-xs">
                  Save my information for future purchase
                </span>
              </label>

              <div class="flex justify-end space-x-2">
                <a
                  class="px-5 py-2 inline-block text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-600"
                  href="#"
                >
                  Back
                </a>
                <a
                  class="px-5 py-2 inline-block text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700"
                  href="#"
                >
                  Continue
                </a>
              </div>
            </article>
            <!-- card.// -->
          </main>
          <!--CHECKOUT PAGE ENDED-->

          <!--SUMMARY SECTION-->
          <aside
            class="md:w-1/3 lg:w-1/4 lg:order-last md:order-last order-first"
          >
            <article class="dark:text-white" style="max-width: 350px">
              <h2 class="text-lg font-semibold mb-3">Summary</h2>
              <ul>
                <li class="flex justify-between mb-1">
                  <span>Total price:</span>
                  <span>$245.97</span>
                </li>
                <li class="flex justify-between mb-1">
                  <span>Discount:</span>
                  <span class="text-green-500">- $60.00</span>
                </li>
                <li class="flex justify-between mb-1">
                  <span>TAX:</span>
                  <span>$14.00</span>
                </li>
                <li class="border-t flex justify-between mt-3 pt-3">
                  <span>Total price:</span>
                  <span class="text-gray-900 font-bold">$420.00</span>
                </li>
              </ul>

              <hr class="my-4" />

              <h2 class="text-lg font-semibold mb-3">Items in cart</h2>

              <figure class="flex items-center mb-4 leading-5">
                <div>
                  <div
                    class="block relative w-20 h-20 rounded p-1 border border-gray-200"
                  >
                    <img width="70" height="70" src="img/1.png" alt="Title" />
                    <span
                      class="absolute -top-2 -right-2 w-6 h-6 text-sm text-center flex items-center justify-center text-white bg-gray-400 rounded-full"
                    >
                      1
                    </span>
                  </div>
                </div>
                <figcaption class="ml-3">
                  <p>
                    GoPRO Action Camera <br />
                    Model: G-200
                  </p>
                  <p class="mt-1 text-gray-400">Total: $12.99</p>
                </figcaption>
              </figure>

              <figure class="flex items-center mb-4 leading-5">
                <div>
                  <div
                    class="block relative w-20 h-20 rounded p-1 border border-gray-200"
                  >
                    <img width="70" height="70" src="img/2.png" alt="Title" />
                    <span
                      class="absolute -top-2 -right-2 w-6 h-6 text-sm text-center flex items-center justify-center text-white bg-gray-400 rounded-full"
                    >
                      2
                    </span>
                  </div>
                </div>
                <figcaption class="ml-3">
                  <p>Modern Product Name Here</p>
                  <p class="mt-1 text-gray-400">Total: $12.99</p>
                </figcaption>
              </figure>

              <figure class="flex items-center mb-4 leading-5">
                <div>
                  <div
                    class="block relative w-20 h-20 rounded p-1 border border-gray-200"
                  >
                    <img width="70" height="70" src="img/3.png" alt="Title" />
                    <span
                      class="absolute -top-2 -right-2 w-6 h-6 text-sm text-center flex items-center justify-center text-white bg-gray-400 rounded-full"
                    >
                      5
                    </span>
                  </div>
                </div>
                <figcaption class="ml-3">
                  <p>
                    Another Best Product <br />
                    Name Goes Here
                  </p>
                  <p class="mt-1 text-gray-400">Total: $12.99</p>
                </figcaption>
              </figure>
            </article>
          </aside>
          <!--SUMMARY PAGE ENDED// -->
        </div>
        <!-- grid.// -->
      </div>
      <!-- container.// -->
    </section>

  <?php include './layout/footer.php' ?>

