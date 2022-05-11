<?php

@include 'configu.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};



if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

     

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="u-clearfix u-image u-shading u-section-1" id="sec-9e05">
      <div class="u-align-left u-clearfix u-sheet u-sheet-1" align="center"></div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-c1c0">
      <div class="u-clearfix u-sheet u-sheet-1" align="center">
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-left-cell u-size-40 u-layout-cell-1">
                    <div class="u-container-layout">
                      <img class="u-image u-image-1" src="images/desktopimgsoftindexd.st.jpg">
                    </div>
                  </div>
                  
              <div class="u-size-30 u-size-60-md" align="center">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-3">
                    
                  </div>
                  <div class="u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4" align="center">
                    <div class="u-container-layout">
                      <img class="u-border-16 u-border-palette-5-base u-image u-image-2" src="images/desktopimgwomanindexpufferd.st.jpg">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
              <div class="u-size-30 u-size-60-md" align="center">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-left-cell u-size-40 u-layout-cell-3">
                    <div class="u-container-layout">
                      <img class="u-image u-image-3" src="images/slidemd09.st.jpg">
                      <img class="u-image u-image-4" src="images/8245350800_2_1_1.jpg">
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-4">
                      <h2 class="u-custom-font u-font-georgia u-text u-text-2">WEEKLY FASHION TRENDS FOR MEN</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="carousel_58f1" class="u-carousel u-slide u-block-b9c3-1" data-u-ride="carousel" data-interval="5000">
      
      
        
       
      
    </section>
    <section class="u-clearfix u-section-7" id="carousel_bfd1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1" align="center">
                <div class="u-container-layout u-container-layout-1">
                  <img class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-1" src="images/desktopimagen01d.st.jpg">
                  <img class="u-image u-image-2" src="images/desktopimagen01d.st-23.jpg">
                  <h2 class="u-custom-font u-font-georgia u-text u-text-1">PUFFER PARKA</h2>
                  <h5 class="u-text u-text-2">35.95 EUR</h5>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2" align="center">
                <div class="u-container-layout u-container-layout-2">
                  <img class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-3" src="images/desktopimagedesktop.st2.jpg">
                  
                  <h2 class="u-custom-font u-font-georgia u-text u-text-3">SWEATSHIRT WITH SEQUINNED SLOGAN</h2>
                  <h5 class="u-text u-text-4">17.95 EUR</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-8" id="sec-1bb5">
      <div class="u-clearfix u-expanded-width u-layout-wrap">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-image u-layout-cell u-left-cell u-size-12 u-size-20-md u-image-1">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-20-md u-image-2">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-20-md u-image-3">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-30-md u-image-4">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-right-cell u-size-12 u-size-30-md u-image-5">
              <div class="u-container-layout"></div>
            </div>
          </div>
        </div>
      </div>
    </section>



<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>.jpg" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      
      <input type="submit" value="add to panier" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>







<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>