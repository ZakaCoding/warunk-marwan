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
            generateComponent("component/luna-dress.html", product_name)
            break;
        case "udang bakar":
            generateComponent("component/luna-dress.html", product_name)
            break;
        case "ikan goreng":
            generateComponent("component/luna-dress.html", product_name)
            break;
        case "ikan bakar":
            generateComponent("component/luna-dress.html", product_name)
            break;
        case "tempe tahu":
            generateComponent("component/luna-dress.html", product_name)
            break;
        case "ayam goreng":
            generateComponent("component/luna-dress.html", product_name)
            break;
        default:
            generateComponent("component/not-found.html","")
            break;
    }
})

function generateComponent(sourceFile, productName)
{
    // get element title
    var productTitle = document.querySelector('#product-name')
    productTitle.innerText = productName.toUpperCase()

    // return source file component
    return $('.product-container').load(sourceFile)
}