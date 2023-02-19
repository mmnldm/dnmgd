<?php
require "action.php";
?>
<?php include './layout/header.php' ?>

<!--NAVBAR ENDS-->


    <section class="py-10 ">
		<div class="container max-w-screen-xl mx-auto px-4">
			
<div class="flex flex-col md:flex-row gap-4 ">
	<main  class="md:w-3/4 dark:bg-black ">

		<article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5 dark:bg-black dark:text-white" id="cart_checkout">
	


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
