<?php
require_once '../Controller/categorieC.php';

$categorieC = new categorieC();
$categories=$categorieC->affichercategorie(); 
if (isset($_POST['categorie']) && isset($_POST['search'])){
    $list = $categorieC->afficherproduits($_POST['categorie']);
}
?>

<div class="form-container">
    <form action="" method ="POST">
        <div class="row">
            <div class="col-25">
                <label>Search: </label>
            </div>
            <div class="col-75">
                <select name="categorie" id="categorie">
                    <?php
                    foreach ($categories as $categorie){
                        ?>
                    <option
                        value="<?= $categorie['id']?>"
                        <?php if(isset($_POST['search']) && $categorie['id']== $_POST['categorie']) { ?>
                            selected
                        <?php } ?>

                    >
                     <?= $categorie['id'] ?>
                     
                    </option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Search" name= "search"  >
        </div>
    </form>
</div>
<?php if(isset($_POST['search'])){ ?>
    <section class="container">
    
    <div class="shop-items">
        <?php
         foreach($list as $produit){
             ?>
             <div class="shop-item">
                 <strong class="shop-item-title"> <?= $produit['nom'] ?> </strong>
                 <div class="shop-item-details">
                     <span class="shop-item-price"> <?= $produit['prix'] ?> dt. </span>
                </div>
                </div>
                <?php 
         }
         ?>
         </div>
        </section>
        <?php
         }
         ?>


