window.addEventListener('DOMContentLoaded', function() {
    // read link
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const product_name = urlParams.get('name')

    switch (product_name) {
        case "ayam geprek":
            generateComponent("component/ayam-geprek.html", product_name)
            break;
        case "ayam crispy":
            generateComponent("component/ayam-crispy.html", product_name)
            break;
        case "lele goreng":
            generateComponent("component/lele-goreng.html", product_name)
            break;
        case "udang bakar":
            generateComponent("component/udang-bakar.html", product_name)
            break;
        case "ikan goreng":
            generateComponent("component/ikan-goreng.html", product_name)
            break;
        case "ikan bakar":
            generateComponent("component/ikan-bakar.html", product_name)
            break;
        case "tempe tahu":
            generateComponent("component/tempe-tahu.html", product_name)
            break;
        case "ayam goreng":
            generateComponent("component/ayam-goreng.html", product_name)
            break;
        case "teh es":
            generateComponent("component/teh-es.html", product_name)
            break;
        case "es jeruk":
            generateComponent("component/es-jeruk.html", product_name)
            break;
        case "es teh susu":
            generateComponent("component/es-teh-susu.html", product_name)
            break;
        case "es coklat":
            generateComponent("component/choco.html", product_name)
            break;
        default:
            generateComponent("component/not-found.html","")
            break;
    }

    countItem()
})

function generateComponent(sourceFile, productName)
{
    // get element title
    var productTitle = document.querySelector('#product-name')
    productTitle.innerText = productName.toUpperCase()

    // return source file component
    return $('.product-container').load(sourceFile)
}

// add to cart
function addItem()
{
    let itemName = document.querySelector('#product-name').innerText
    let price = document.querySelector('#price').innerText
    let imagePath = document.querySelector('#image-item').src

    // set localstograge
    if(localStorage.getItem("items-cart") !== null)
    {
        var items = JSON.parse(localStorage.getItem(("items-cart")))
    }
    else
    {
        var items = []
    }

    items.push(
        {
            "name" : itemName,
            "price" : price,
            "image" : imagePath,
            "total" : 1
        }
    )
    localStorage.setItem("items-cart", JSON.stringify(items))

    return window.location.reload()
}

function countItem()
{
    let countNumber = document.querySelector('#cart-count')
    let count = document.querySelector('#total-items-on-cart')
    if(localStorage.getItem('items-cart') !== null || JSON.parse(localStorage.getItem('items-cart')).length > 0)
    {
        count.innerText = JSON.parse(localStorage.getItem('items-cart')).length
        countNumber.classList.add('visible')
    }
}