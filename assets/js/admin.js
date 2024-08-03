class State {

    products = []

    options = [

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

    productAdditionModalVisibility = false

    toggleProductAdditionModalVisibility = () => {

        this.productAdditionModalVisibility = !this.productAdditionModalVisibility

        const productAdditionModal = document.getElementById("productAdditionModal")

        if (this.productAdditionModalVisibility) {

            productAdditionModal.style.display = "flex"

        } else {

            productAdditionModal.style.display = "none"

        }

    }

    setProducts = (products) => {

        this.products = products
    }

}

const displayCategories =()=>{
    
    const categoriesContainer = document.getElementById("categories")

    let output = ""

    state.options.forEach(option => {

        output += `<option value="${option.name}">${option.name}</option>`

    })

    categoriesContainer.innerHTML = output

}

const displaySelectedImage = () => {

    const imageFiles = document.getElementById("files")

    const imageDisplayContainer = document.getElementById("image-display")

    const image = URL.createObjectURL(imageFiles.files[0])

    imageDisplayContainer.src = ""
    imageDisplayContainer.src = image
    imageDisplayContainer.style.width = "100%"
    imageDisplayContainer.style.objectFit = "contain"
}

const state = new State()

const ContentRenderer = (container, data, card) => {

    const DisplayContainer = document.querySelector(`.${container}`)

    let output = ""

    data?.length == 0

        ?

        output = "<p style='font-weight: 900; margin-top: 10px'>No items found</p>"

        :

        data.map(item => {

            output += card(item)

        })

    DisplayContainer.innerHTML = output

}

const toggleAddProductModal = () => {

    state.toggleProductAdditionModalVisibility()

}

const getProducts = () => {

    return [

        {
            id: 1,
            name: "Jeans",
            price: "4900",
            category: "jackets",
            sold: false,
            image: "C:/Users/dev/Pictures/pexels-pixabay-65676.jpg"
        },
        {
            id: 2,
            name: "Trousers",
            price: "450",
            category: "jackets",
            sold: true,
            image: "C:/Users/dev/Pictures/pexels-mnzoutfits-1598507.jpg"
        }

    ]

}

const ProductCard = (product) => {

    return (

        `
        <div class="card bg-light w-400">

            <div class="image">

                <img src="${product.image}" alt="">

            </div>

            <div>

                <p>${product.name}</p>

                <footer class="flex align-center justify-between">

                    <p>$${product.price}</p>

                     ${product.sold ? '<div class="bg-dark contain rounded">sold</div>' : ''}

                </footer>

               

            </div>

        </div>
        `

    )

}

// show or hide add product modal 

const toggleAddProductVisibility = () => {

    const popover = document.querySelector(".popover-child")

    globals.profileVisibility = !globals.profileVisibility

    if (globals.profileVisibility) {

        popover.style.display = "block"

    } else {

        popover.style.display = "none"

    }

}



//end show or hide add product modal

window.addEventListener("load", () => {

    displayCategories()

    state.setProducts(getProducts())

    // ContentRenderer("render-products", state.products, ProductCard)


})