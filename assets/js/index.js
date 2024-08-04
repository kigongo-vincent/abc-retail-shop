const options = [

    {
        name: "appliances",
        image: "../../assets/images/appliances.png"
    },
    {
        name: "jackets",
        image: "../../assets/images/jackets.png"
    },
    {
        name: "laptop",
        image: "../../assets/images/laptop.png"
    },
    {
        name: "make-up",
        image: "../../assets/images/make-up.png"
    },
    {
        name: "phones",
        image: "../../assets/images/phones.png"
    },
    {
        name: "shoes",
        image: "../../assets/images/shoes.png"
    },
    {
        name: "speakers",
        image: "../../assets/images/speakers.png"
    },
    {
        name: "t-shirts",
        image: "../../assets/images/t-shirt.png"
    },

]

const displayCategories = () => {

    const categoriesContainer = document.getElementById("categories")

    if (categoriesContainer) {

        let output = ""

        options.forEach(option => {

            output += `<option value="${option.name}">${option.name}</option>`

        })

        categoriesContainer.innerHTML = output

    }

}

// products list 
let products = []

const getProducts = async () => {

    const url = "http://localhost/abc%20retaill%20shop/controllers/getProducts.php"

    const response = await fetch(url)

    if (response.status == 200) {

        const data = await response.json()

       if(data?.status == 200){

        products = data?.data?.map(item => ({

            id: parseInt(item[0]),
            name: item[1],
            price: parseInt(item[2]),
            image: item[3],
            status: item[4],
            category: item[5]

        }));

        ContentRenderer("products", products, ProductCard, "products")

       }

    } else {
        console.error("failed to connect to server")
    }
}

// global variables 
const globals = {

    selected_products: [],

    selected_category: "",

    productsModalVisibility: false,

    profileVisibility: false

}
// end global variables 

// pending orders display 

const SingleRenderer = (element, content) => {

    const node = document.getElementById(`${element}`)

    if (node) {

        if (globals.selected_products.length != 0) {

            node.innerHTML += `<span>${content}</span>`

        } else {

            node.innerHTML = `<img onclick="toggleProductsModalVisibility()" src="../../assets/icons/cart.svg" alt="">`

        }

    }

}
//end pending orders display 


// set filter for the products 

const setCategory = (category) => {

    globals.selected_category = category

    ContentRenderer("options", options, OptionCard)

    ContentRenderer(

        "products",
        products.filter(product => product.category == category), ProductCard,
        "products"

    )

}

// end set filter for the products 



// single card for an option 

const OptionCard = (option) => {

    return (

        `<div role="button" class=${option.name == globals.selected_category ? 'bg-dark' : 'bg-light'} onclick ="setCategory('${option.name}')">
        
                <img src="${option.image}" height="40px" alt="">

                <p>${option.name}</p>

        </div>
        `

    )

}

// end single card for an option 

// add or remove a product from the cart 

const selectProduct = (id) => {

    if (!globals.selected_products.some(product => product == parseInt(id))) {

        globals.selected_products.push(parseInt(id))

        SingleRenderer("selected_products_count", globals.selected_products.length)

        setCategory(products.find(product => product.id == id)?.category)

    } else {

        globals.selected_products = globals.selected_products.filter(Id => Id != parseInt(id))

        ContentRenderer("products", products, ProductCard, "products")

        displaySelectedProducts()

        setCategory(products.find(product => product.id == id)?.category)

        SingleRenderer("selected_products_count", globals.selected_products.length)

    }
}

// end add or remove a product from the cart 



// single card for a product 

const ProductCard = (product) => {

    let is_selected = globals.selected_products.some(id => id == product.id)

    return (

        `
        <div class="card w-47">

            <div class="image">

                <img src="../../uploads/${product.image}" alt="">

            </div>

            <div>

                <p>${product.name}</p>

                <footer>

                    <p>$${product.price}</p>

                    <button onclick = "selectProduct('${product.id}')">

                        <img height="15px" src="../../assets/icons/${is_selected ? 'delete.svg' : 'cart-add.svg'}" alt="">

                        <span>${is_selected ? "remove from cart" : "add to cart"}</span>

                    </button>

                </footer>

                </div>

        </div>
        `

    )

}

// end single card for a product 



// flatlist for products or options 

const ContentRenderer = (container, data, card, type) => {

    const DisplayContainer = document.querySelector(`.${container}`)

    let output = ""

    data?.length == 0

        ?

        output = "<p style='font-weight: 900; margin-top: 10px'>No items found</p>"

        :

        data.map(item => {

            output += card(item)

        })

    if(DisplayContainer){

        DisplayContainer.innerHTML = output

    }

}

//end flatlist for products or options 



// show or hide profile 

const toggleProfileVisibility = () => {

    const popover = document.querySelector(".popover-child")

    globals.profileVisibility = !globals.profileVisibility

    if (globals.profileVisibility) {

        popover.style.display = "block"

    } else {

        popover.style.display = "none"

    }

}

//end show or hide profile


const placeOrder = () => {

    const baseURL = "http://localhost/abc%20retaill%20shop/controllers/addOrder.php"

    const params = {

        products: globals.selected_products,

    }

    const queryString = new URLSearchParams(params).toString();

    const fullURL = `${baseURL}?${queryString}`;

    window.location.href = fullURL

}


// show or hide products model 

const toggleProductsModalVisibility = () => {

    displaySelectedProducts()

    const selectedProductsModal = document.getElementById("selected_products_modal")

    globals.productsModalVisibility = !globals.productsModalVisibility

    if (globals.productsModalVisibility) {

        selectedProductsModal.style.display = "flex"

    } else {

        selectedProductsModal.style.display = "none"

    }

}

//end show or hide products model 



// display selected products 

const displaySelectedProducts = () => {

    let total = document.querySelector(".total")

    let selected_products_list = []

    let sum = 0

    globals.selected_products.forEach(id => {

        selected_products_list.push(products.find(product => product.id === id))

    });

    selected_products_list?.forEach(product => sum += parseInt(product?.price))

    total.innerText = `$${sum}`


    ContentRenderer("selected_products", selected_products_list, ProductCard, "products")

}

// end display selected products 


const Logout = () => {

    const sure = confirm("Are you sure you want to logout?");

    if (sure) {

        window.location.href = "../../components/logout.php"

    }

}


// load all js on screen visibility 

window.addEventListener("DOMContentLoaded", () => {
        displayCategories()
        getProducts()


        SingleRenderer("selected_products_count", globals.selected_products.length)

        ContentRenderer("options", options, OptionCard)

        ContentRenderer("products", products, ProductCard, "products")


})
