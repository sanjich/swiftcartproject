const banners = document.querySelectorAll('.banner');
    let currentIndex = 0;

    function showBanner(index) {
      banners.forEach((banner, i) => {
        banner.classList.toggle('active', i === index);
      });
    }

    function rotateBanner() {
      currentIndex = (currentIndex + 1) % banners.length;
      showBanner(currentIndex);
    }

    // Rotate banners every 2 seconds
    setInterval(rotateBanner, 3000);

     // Car data for each brand
     const gadgetData = {
      Apple: [
        {
          name: ' Apple Watch Series 10',
          type: 'Watch',
          Old_price: 20000,
          price: 18000,
          image: './image/Gadgets/g-2.jpg',
        },
        {
          name: ' AirPods Pro (2nd generation) USB‐C',
          type: 'AirPods',
          Old_price: 34000,
          price: 26000,
          image: './image/Gadgets/g-3.jpg',
        },
        {
          name: 'Apple 20W USB-C Power Adapter',
          type: 'Adapter',
          Old_price: 4000,
          price: 3000,
          image: './image/Gadgets/g-4.jpg',
        },
        {
          name: 'MacBook Pro M3 Pro',
          type: 'Watch',
          Old_price: 241500,
          price: 231500,
          image: './image/Laptop/laptop-4.jpg',
        },
      ],
      Samsung: [
        {
          name: 'Galaxy S24 Ultra 5G',
          type: 'phone',
          Old_price: 113500,
          price: 103500,
          image: './image/Phones/phones-4.jpg',
        },
        {
          name: 'Galaxy A15 5G',
          type: 'phone',
          Old_price: 35000,
          price: 24500,
          image: './image/Phones/phones-5.jpg',
        },
        {
          name: 'Galaxy S24 FE 5G',
          type: 'phone',
          Old_price: 70000,
          price: 64500,
          image: './image/Phones/phones-6.jpg',
        },
        {
          name: 'Galaxy M35 5G',
          type: 'phone',
          Old_price: 25000,
          price: 22700,
          image: './image/Phones/phones-7.jpg',
        },
      ],
      
      JBL: [
        {
          name: 'JBL Flip 6 Portable Waterproof Speaker',
          type: 'Speaker',
          Old_price: 13000,
          price: 10900,
          image: './image/Gadgets/g-5.jpg',
        },
        {
          name: ' JBL GO 4 Portable Waterproof Speaker',
          type: 'Watch',
          Old_price: 8000,
          price: 5150,
          image: './image/Gadgets/g-6.jpg',
        },
        {
          name: 'JBL Tune 235NC TWS Earbuds',
          type: 'Earbuds',
          Old_price: 10500,
          price: 9000,
          image: './image/Gadgets/g-7.jpg',
        },
        {
          name: 'JBL Tune 520BT Over Ear Headphone',
          type: 'Headphone',
          Old_price: 4800,
          price: 4500,
          image: './image/Gadgets/g-8.jpg',
        },
      ],
      OnePlus: [
        {
          name: 'OnePlus 12R 5G',
          type: 'phone',
          Old_price: 57000,
          price: 53000,
          image: './image/Phones/phones-8.jpg',
        },
        {
          name: 'OnePlus Nord CE4 Lite 5G',
          type: 'phone',
          Old_price: 29000,
          price: 26800,
          image: './image/Phones/phones-9.jpg',
        },
        {
          name: 'OnePlus Nord N30 SE 5G',
          type: 'phone',
          Old_price: 20000,
          price: 18000,
          image: './image/Phones/phones-10.jpg',
        },
        {
          name: ' OnePlus 12',
          type: 'Watch',
          Old_price: 25000,
          price: 20000,
          image: './image/Phones/phones-11.jpg',
        },
      ],
      Google: [
        {
          name: 'Pixel 8',
          type: 'Watch',
          Old_price: 56000,
          price: 53000,
          image: './image/Phones/phones-12.jpg',
        },
        {
          name: 'Pixel 9',
          type: 'phone',
          Old_price: 120000,
          price: 108000,
          image: './image/Phones/phones-13.jpg',
        },
        {
          name: 'Pixel 7 Pro',
          type: 'phone',
          Old_price: 56000,
          price: 49000,
          image: './image/Phones/phones-14.jpg',
        },
        {
          name: 'Pixel 9 Pro',
          type: 'phone',
          Old_price: 110000,
          price: 109000,
          image: './image/Phones/phones-15.jpg',
        },
      ],
    };

    // Change car cards dynamically
    function changeBrand(brand) {
      const cardsContainer = document.getElementById('gadgets-section');
      cardsContainer.innerHTML = '';

      gadgetData[brand].forEach((gadget) => {
        cardsContainer.innerHTML += `
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl transition-shadow duration-300">
        <!-- Product Image with Hover Effect -->
        <div class="relative group">
          <img 
            src="${gadget.image}" 
            alt="${gadget.name}" 
            class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
          />
          <!-- Stock Indicator -->
          <span class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">
            In Stock
          </span>
        </div>
        
        <!-- Product Details -->
        <div class="p-4">
          <!-- Product Name -->
          <h2 class="text-lg font-semibold text-gray-800 truncate">
          ${gadget.name}
          </h2>
          
          <!-- Product Price -->
          <p class="text-gray-500 mt-2 text-sm">
            <span class="text-red-500 line-through">৳ ${gadget.Old_price}</span> ৳ ${gadget.price}
          
          <!-- Add to Cart Button -->
          <button class="mt-4 w-full text-white bg-gray-800 hover:bg-gray-900 py-2 rounded-lg transition duration-300">
            Add to Cart
          </button>
        </div>
      </div>

        `;
      });
      
    }

    

  // Set default brand
  changeBrand('Apple', document.querySelector('.brand-tab'));

  