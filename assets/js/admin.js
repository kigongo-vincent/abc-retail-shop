class State {

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

const toggleAddProductModal = () => {

    state.toggleProductAdditionModalVisibility()

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