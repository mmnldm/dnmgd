<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DNMGD -- HOME PAGE</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/video.css" />
    <link href="https://fonts.cdnfonts.com/css/vcr-osd-mono" rel="stylesheet" />
    <link rel="stylesheet" href="css/photoswipe-dynamic-caption-plugin.css" />
    <link rel="stylesheet" href="css/photoswipe.css" />
    <link rel="shortcut icon" href="favicon/favicon.jpeg" type="image/x-icon" />
  </head>
  <body class="font-vcr-osd min-h-screen w-full h-full">
    <header class="">
      <video id="bgVideo" autoplay loop muted defaultmuted playsinline>
        <!-- Video is embedded in the WEBM format -->
        <source src="vid/bg-vid.mp4" type="video/mp4" />
      </video>
    </header>

    <!--NAVBAR-->
    <div class="">
      <nav class="py-2 lg:sticky top-0 z-30">
        <div class="max-w-xl mx-1 md:mx-auto lg:mx-auto relative border">
          <div class="flex justify-between">
            <div
              class="bg-white bg-opacity-10 backdrop-blur-lg drop-shadow-lg px-5 py-2 md:px-10 md:py-5 shadow-xl border-r"
            >
              <a
                class="strike text-2xl text-center text-white md:text-4xl tracking-widest strike"
                href="index.php"
                >DNMGD
              </a>
            </div>
            <div
              class="bg-white bg-opacity-10 backdrop-blur-lg drop-shadow-lg px-5 py-2 md:px-10 md:py-5 shadow-xl border-l"
            >
              <a
                class="text-2xl text-center text-white md:text-4xl tracking-widest"
                href="shop.php"
                >SHOP
              </a>
            </div>
          </div>
        </div>
      </nav>

      <!--NAVBAR ENDS-->

      <section id="home" class="flex lg:px-8">
        <!--VIDEO DOCUMENTARY-->
        <div class="mx-auto justify-center px-4 text-white">
          <video
            class="rounded-lg w-full"
            controls
            preload="auto"
            poster="./vid/thumbnail.png"
          >
            <source src="./vid/vid.mp4" type="" />
          </video>
          <p class="mt-1 lg:text-xl text-center">DNMGD DCMNTRY</p>
        </div>
      </section>
      <!--VIDEO DOCU ENDS HERE-->

      <!--PHOTO GRIDS -->
      <section class="flex contain px-2 w-full">
        <div
          class="grid grid-cols-3 gap-2 lg:grid-cols-3 lg:gap-3 scroll px-4 py-4 pswp-gallery"
          id="gallery"
        >
          <div class="pswp-gallery__item">
            <a
              href="./imgs/001.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/001.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Diesel Resort (2023)</b><br />ullamcorper ultricies nisi, nam
              eget dui, etiam rhoncus, maecenas tempus, tellus eget condimentum
              rhoncus, sem quam semper libero<br />32 x 37 x 1.8 inches
            </div>
          </div>

          <div class="pswp-gallery__item">
            <a
              href="./imgs/002.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/002.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Diesel Resort (2023)</b><br />ullamcorper ultricies nisi, nam
              eget dui, etiam rhoncus, maecenas tempus, tellus eget condimentum
              rhoncus, sem quam semper libero<br />32 x 37 x 1.8 inches
            </div>
          </div>

          <div class="pswp-gallery__item">
            <a
              href="./imgs/003.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/003.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Vivamus elementum (2016)</b><br />ullamcorper ultricies nisi,
              nam eget dui, etiam rhoncus, maecenas tempus, tellus eget
              condimentum rhoncus, sem quam semper libero<br />32 x 37 x 1.8
              inches
            </div>
          </div>

          <div class="pswp-gallery__item">
            <a
              href="./imgs/004.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/004.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Diesel Resort (2023)</b><br />ullamcorper ultricies nisi, nam
              eget dui, etiam rhoncus, maecenas tempus, tellus eget condimentum
              rhoncus, sem quam semper libero<br />32 x 37 x 1.8 inches
            </div>
          </div>

          <div class="pswp-gallery__item">
            <a
              href="./imgs/005.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/005.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Diesel Resort (2023)</b><br />ullamcorper ultricies nisi, nam
              eget dui, etiam rhoncus, maecenas tempus, tellus eget condimentum
              rhoncus, sem quam semper libero<br />32 x 37 x 1.8 inches
            </div>
          </div>

          <div class="pswp-gallery__item">
            <a
              href="./imgs/006.webp"
              data-pswp-width="1669"
              data-pswp-height="2500"
              target="_blank"
            >
              <img src="imgs/006.webp" alt="EDITORIAL 1" />
            </a>
            <div class="pswp-caption-content">
              <b>Diesel Resort (2023)</b><br />ullamcorper ultricies nisi, nam
              eget dui, etiam rhoncus, maecenas tempus, tellus eget condimentum
              rhoncus, sem quam semper libero<br />32 x 37 x 1.8 inches
            </div>
          </div>

          <p class="text-white">EDITORIAL</p>
        </div>
      </section>

      <!--PHOTO GRIDS ENDS-->

      <!--FOOTER STARTS-->

      <footer class="mt-2 text-white text-center">
        <div
          class="container justify-center grid gap-1 max-w-screen-xl mx-auto px-1 uppercase"
        >
          <a href="">general info</a>
          <a href="">contact</a>
          <a href="">terms </a>
          <a href="">privacy</a>
          <a href="">archive</a>
        </div>
      </footer>
      <!--FOOTER ENDS-->
    </div>

    <script type="module">
      import PhotoSwipeLightbox from "./js/photoswipe-lightbox.esm.js";
      import PhotoSwipeDynamicCaption from "./js/photoswipe-dynamic-caption-plugin.esm.js";

      const smallScreenPadding = {
        top: 0,
        bottom: 0,
        left: 0,
        right: 0,
      };
      const largeScreenPadding = {
        top: 30,
        bottom: 30,
        left: 0,
        right: 0,
      };
      const lightbox = new PhotoSwipeLightbox({
        gallerySelector: "#gallery",
        childSelector: ".pswp-gallery__item",
        // optionaly adjust viewport
        paddingFn: (viewportSize) => {
          return viewportSize.x < 700 ? smallScreenPadding : largeScreenPadding;
        },
        pswpModule: () =>
          import("https://unpkg.com/photoswipe@beta/dist/photoswipe.esm.js"),
      });

      const captionPlugin = new PhotoSwipeDynamicCaption(lightbox, {
        mobileLayoutBreakpoint: 700,
        type: "auto",
        mobileCaptionOverlapRatio: 1,
      });

      lightbox.init();
    </script>
  </body>
</html>
