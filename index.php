<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php hanouti</title>
    <link rel="stylesheet" href="./css/stl.css">

    
</head>

<body>
    <header>
        <h1>Hanouti</h1>
        <h4>Mohamed BOUAGHAD GI 2021</h4>
    </header>
</body>

</html>


    <!-- PHP code -->
    <?php
        $nom = "mohamed";
        $products = array(
            array("id"=>1, "name"=>"hp elitebook", "price"=>8120, "qtt"=> 0, "image"=>"./imgs/1.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>2, "name"=>"Thinkpad X1", "price"=>10110, "qtt"=> 0, "image"=>"./imgs/2.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>3, "name"=>"Macbook pro", "price"=>17219, "qtt"=> 0,"image"=>"./imgs/3.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>4, "name"=>"Thinkpad x280", "price"=>8120, "qtt"=> 0, "image"=>"./imgs/4.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>5, "name"=>"hp elitebook", "price"=>8120,"qtt"=> 0, "image"=>"./imgs/5.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>6, "name"=>"Thinkpad x280", "price"=>8120,"qtt"=> 0, "image"=>"./imgs/6.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>7, "name"=>"hp elitebook", "price"=>8120, "qtt"=> 0,"image"=>"./imgs/7.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>8, "name"=>"hp elitebook", "price"=>8120, "qtt"=> 0,"image"=>"./imgs/8.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>9, "name"=>"Thinkpad x1 youga", "price"=>12200,"qtt"=> 0, "image"=>"./imgs/9.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
            array("id"=>10, "name"=>"Azus Y142", "price"=>8120,"qtt"=> 0, "image"=>"./imgs/10.png", "plus"=>"./imgs/plus.png", "del"=>"./imgs/del.png"),
        );
        echo "<div class='main'>";
            echo "<div class='container'>";
                echo "<div class='content-left'>";
                    $i = 1;
                    foreach($products as $e) {
                        echo "<div id='elm$i' class='prod'>";
                            echo "<img id='pro' src='$e[image]'>";
                            echo "<img id='img$i' class='plus' src='$e[plus]'>";
                            echo "<div class='info'>";
                                echo "<h4>$e[name]<h4>";
                                echo "<h4>$e[price]<h4>";
                            echo "</div>";
                        echo "</div>";
                        $i++;
                    } 
                echo "</div>";
                echo "<div class='content-right'>";
                    echo "<div id='entr'>";
                        echo "<input id='search' type='text' placeholder='Search'>";
                        echo "<button id='sear'>Search</button>";
                    echo "</div>";
                    echo "<h4 id='totale'>Totale : <span id='total'>00</span> DH</h4>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    ?>



    <!-- JavaScript code -->
    <script>
        var js_products = <?php echo json_encode($products); ?>;
        let addProduct = document.querySelector(".content-right");
        let totalPrice = document.getElementById("total");

        // Ajout d'un produit au panier
        function addProducts(js_products) {
            js_products.forEach(element => {
            let elm = document.createElement("div")
            elm.setAttribute("class", "pr")
            elm.setAttribute("id", `pr${element.id}`)
            elm.innerHTML = ""
            elm.innerHTML += `
            <h4>${element.name}</h4>
            <h4>${element.price}DH</h4>
            <h4 id="qtt${element.id}">${element.qtt}</h4>
            <img id="del${element.id}" src="${element.del}" >
        `
            let pl = document.getElementById(`img${element.id}`);
            addProduct.appendChild(elm)
            pl.onclick = function() {
                elm.style.display = "flex"
                let qtt = document.getElementById(`qtt${element.id}`)
                qtt.innerHTML = parseInt(qtt.innerHTML) + 1
                totalPrice.innerHTML = parseInt(totalPrice.innerHTML) + element.price
            }
        })
    }
        addProducts(js_products);


        // Suppression d'un produit du panier
        function delProd(js_products) {
            js_products.forEach(element => {
                let pr = document.getElementById(`pr${element.id}`)
                let del = document.getElementById(`del${element.id}`)
                let qtt = document.getElementById(`qtt${element.id}`)
                del.onclick = function() {
                    qtt.innerHTML = parseInt(qtt.innerHTML) - 1
                    totalPrice.innerHTML = parseInt(totalPrice.innerHTML) - element.price
                    if (parseInt(qtt.innerHTML) <= 0) {
                        pr.style.display = "none"
                    }
                }
            })
        }

        delProd(js_products)

        let search = document.getElementById("search")
        let btns = document.getElementById("sear")

        // recherche des des produits contenant le texte saisie dans la zone recherche
        function searchfun(js_products) {
            js_products.forEach(element => {
            let elm = document.getElementById(`elm${element.id}`)
                btns.addEventListener("click", function() {
                    if ((search.value) !== (element.name)) {
                        elm.style.display = "none"
                        console.log(search.value)
                    }
                })
            })
    }

    searchfun(js_products)
    </script>