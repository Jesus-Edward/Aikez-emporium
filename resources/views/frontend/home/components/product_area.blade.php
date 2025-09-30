 {{-- <style>
     /* body {
      font-family: Arial, sans-serif;
      background: #1e1e1e;
      color: #fff;
      display: flex;
      justify-content: center;
      padding: 40px;
    } */

     .cards-container {
         display: flex;
         flex-direction: column;
         gap: 25px;
         max-width: 350px;
     }

     .prod-card {
         width: 400px;
         background: #2b2b2b;
         border-top-left-radius: 12px;
         border-top-right-radius: 5px;
         border-bottom-left-radius: 5px;
         border-bottom-right-radius: 8px;
         padding: 20px;
         text-align: center;
         box-shadow: 0 1px 13px #6a4bff;
         transition: transform 0.3s;
         position: relative;
     }

     .prod-card::before {
         content: "";
         position: absolute;
         top: 66px;
         left: -24px;
         width: 25px;
         height: calc(100% - 50px);
         background: #6a4bff;
         border-bottom-left-radius: 12px;
         border-top-left-radius: 5px;

     }

     .prod-card::after {
         content: "";
         position: absolute;
         left: -24px;
         bottom: -25px;
         height: 25px;
         width: 120px;
         background: #6a4bff;
         border-bottom-left-radius: 5px;
         border-bottom-right-radius: 5px;
     }

     .top-strip {
         position: absolute;
         background: #6a4bff;
         top: -24px;
         width: 120px;
         right: 0;
         height: 25px;
     }

     .top-strip::before {
         position: absolute;
         content: "";
         top: 0px;
         width: 25px;
         background: #6a4bff;
         right: -25px;
         height: 250px;
     }

     .prod-card:hover {
         transform: translateY(-5px);
     }

     .prod-card img {
         width: 120px;
         height: 120px;
         border-radius: 50%;
         /* circular product image */
         object-fit: cover;
         border: 3px solid #5c2ecc;
         box-shadow: 0 0 10px rgba(92, 46, 204, 0.5);
         margin-bottom: 15px;
     }

     .prod-card h3 {
         font-size: 18px;
         margin: 10px 0 5px;
         color: #fff;
     }

     .prod-card p.price {
         font-size: 16px;
         font-weight: bold;
         color: #a88ef9;
         margin: 0 0 15px;
     }

     .prod-card button {
         background: #5c2ecc;
         border: none;
         padding: 10px 20px;
         color: #fff;
         font-size: 14px;
         font-weight: bold;
         border-radius: 6px;
         cursor: pointer;
         transition: background 0.3s;
     }

     .prod-card button:hover {
         background: #4520a0;
     }
 </style> --}}
 <div class="services-area-two pb-70">
     <div class="container">
         <div class="section-title text-center">
             <h2>Our Resort Services and All Other Details</h2>
         </div>

         <div class="option-item">
             <div class="menu-icon">
                 <a href="javascript:;" class="burger-menu menu-icon-one">
                     <i class="bx bx-menu"></i>
                 </a>
             </div>
         </div>

         <div class="row pt-45">
            <div class="col-lg-4 col-s-6">
                <div class="room-item">
                    <a href="room-details.html">
                        <img src="{{ asset("frontend/assets/img/room/room-img7.jpg") }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="room-details.html">Granites</a></h3>
                        <ul>
                            <li>320</li>
                            <li><span>Per SQM</span></li>
                        </ul>
                        <a href="book.html" class="book-btn">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-s-6">
                <div class="room-item">
                    <a href="room-details.html">
                        <img src="{{ asset("frontend/assets/img/room/room-img2.jpg") }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="room-details.html">Marbles</a></h3>

                        <ul>
                            <li>300</li>
                            <li><span>Per SQM</span></li>
                        </ul>
                        <a href="book.html" class="book-btn">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-s-6">
                <div class="room-item">
                    <a href="room-details.html">
                        <img src="{{ asset("frontend/assets/img/room/room-img8.jpg") }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="room-details.html">Pure Stone</a></h3>

                        <ul>
                            <li>340</li>
                            <li><span>Per SQM</span></li>
                        </ul>
                        <a href="book.html" class="book-btn">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-s-6">
                <div class="room-item">
                    <a href="room-details.html">
                        <img src="{{ asset("frontend/assets/img/room/room-img4.jpg") }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="room-details.html">Chinese Granite</a></h3>

                        <ul>
                            <li>360</li>
                            <li><span>Per SQM</span></li>
                        </ul>
                        <a href="book.html" class="book-btn">Buy Now</a>
                    </div>
                </div>
            </div>
         </div>
     </div>
 </div>
