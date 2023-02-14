<?php
require "action.php";
?>
<?php include './layout/header.php' ?>

<!--NAVBAR ENDS-->


    <section class="py-10 ">
		<div class="container max-w-screen-xl mx-auto px-4">
			
<div class="flex flex-col md:flex-row gap-4 ">
	<main  class="md:w-3/4 dark:bg-black ">

		<article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5 dark:bg-black dark:text-white">
			
			<!-- item-cart -->
			<div class="flex flex-wrap lg:flex-row gap-5 mb-4">
				<div class="w-full lg:w-2/5 xl:w-2/4">
					<figure class="flex leading-5">
						<div>
							<div class="block w-16 h-16 rounded border border-gray-200 overflow-hidden">
								<img src="img/100.png" alt="Title">
							</div>
						</div>
						<figcaption  class="ml-3">
							<p><a href="#" class="hover:text-blue-600">Modern Product Name Goes Here as demo </a></p>
							<p class="mt-1 text-gray-400"> Color: Yellow, Type: Jeans </p>
						</figcaption>
					</figure>
				</div>

				<div>
					<div class="leading-5">
						<p class="font-semibold not-italic">$1156.00</p>
						<small class="text-gray-400"> $460.00 / per item </small> 
					</div>
				</div>
				<div class="flex-auto">
					<div class="float-right">
						<a class="px-4 py-2 inline-block  bg-white shadow-sm border border-gray-200 rounded-md hover:bg-red-500 dark:bg-black dark:hover:bg-red-600 " href="#">  Remove </a>
					</div>
				</div>
			</div> <!-- item-cart end// -->

			<hr class="my-4">

			<!-- item-cart -->
			<div class="flex flex-wrap lg:flex-row gap-5 mb-4">
				<div class="w-full lg:w-2/5 xl:w-2/4">
					<figure class="flex leading-5">
						<div>
							<div class="block w-16 h-16 rounded border border-gray-200 overflow-hidden">
								<img src="img/2.png" alt="Title">
							</div>
						</div>
						<figcaption  class="ml-3">
							<p><a href="#" class="hover:text-blue-600">Travel Bag Jeans Blue Color Modern</a></p>
							<p class="mt-1 text-gray-400"> Color: Yellow, Type: Jeans </p>
						</figcaption>
					</figure>
				</div>

				<div>
					<div class="leading-5">
						<p class="font-semibold not-italic">$92.00</p>
						<small class="text-gray-400"> $34.00 / per item </small> 
					</div>
				</div>
				<div class="flex-auto">
					<div class="float-right">
						<a class="px-4 py-2 inline-block  bg-white shadow-sm border border-gray-200 rounded-md hover:bg-red-500 dark:bg-black dark:hover:bg-red-600 " href="#">  Remove </a>
					</div>
				</div>
			</div> <!-- item-cart end// -->

			<hr class="my-4">

			<!-- item-cart -->
			<div class="flex flex-wrap lg:flex-row gap-5 mb-4">
				<div class="w-full lg:w-2/5 xl:w-2/4">
					<figure class="flex leading-5">
						<div>
							<div class="block w-16 h-16 rounded border border-gray-200 overflow-hidden">
								<img src="img/3.png" alt="Title">
							</div>
						</div>
						<figcaption  class="ml-3">
							<p><a href="#" class="hover:text-blue-600">Great product name</a></p>
							<p class="mt-1 text-gray-400"> Color: Blue, Type: Original </p>
						</figcaption>
					</figure>
				</div>

				<div>
					<div class="leading-5">
						<p class="font-semibold not-italic">$980.00</p>
						<small class="text-gray-400"> $120.00 / per item </small> 
					</div>
				</div>
				<div class="flex-auto">
					<div class="float-right">
						<a class="px-4 py-2 inline-block  bg-white shadow-sm border border-gray-200 rounded-md hover:bg-red-500 dark:bg-black dark:hover:bg-red-600 " href="#">  Remove </a>
					</div>
				</div>
			</div> <!-- item-cart end// -->

			<hr class="my-4">

			<h6 class="font-bold">Free Delivery within 1-2 weeks</h6>
			<p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

		</article> <!-- card end.// -->

	</main>




                </article>
            </main class=" ">
    
            <aside class="md:w-1/4 ">
        
                <article class="border border-gray-200 bg-white shadow-sm rounded dark:bg-black mb-5 p-3 lg:p-5">
        
                    <ul class="mb-5">
                        <li class="flex justify-between text-black dark:text-white  mb-1"> 
                            <span>Total price:</span> 
                            <span>$245.97</span>
                        </li>
                        <li class="flex justify-between text-black dark:text-white  mb-1"> 
                            <span>Discount:</span> 
                            <span class="text-green-500">- $60.00</span>
                        </li>
                        <li class="flex justify-between text-black dark:text-white  mb-1"> 
                            <span>Shipping:</span> 
                            <span>$14.00</span>
                        </li>
                        <li class="text-lg font-bold border-t flex justify-between mt-3 pt-3"> 
                            <span>Total price:</span> 
                            <span class="text-green-500">$420.00</span>
                        </li>
                    </ul>
        
                    <a class="px-4 py-3 mb-2 inline-block  text-lg w-full text-center font-medium text-white bg-black border bord dark:bg-black dark:text-white  er-transparent rounded-md hover:bg-green-700" href="checkout.php"> Checkout </a>
        
                    <a class="px-4 py-3 inline-block  text-lg w-full text-center font-medium text-black dark: bg-white shado dark:bg-black dark:text-white w-sm border border-gray-200 rounded-md" href="index.php"> Back to shop </a>
        
                </article> <!-- card end.// -->
                
            
        </aside>
        </div>


    </div>

</section>

<?php include './layout/footer.php' ?>
