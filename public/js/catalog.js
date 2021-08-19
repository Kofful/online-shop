async function loadProducts()
{
    let response = await fetch("/products");
    return response.json();
}

async function init()
{
    let products = await loadProducts();
    let loader = document.querySelector("#loader");

    let container = document.createElement("div");
    container.classList.add("product-container");
    products.forEach(product => {
        container.insertAdjacentElement("beforeend", makeProductLayout(product));
    });

    loader.replaceWith(container);
}

function makeProductLayout(product)
{
    let capsule = document.createElement("div");
    capsule.classList.add("product-capsule");

    let productDiv = document.createElement("div");
    productDiv.classList.add("product");

    capsule.insertAdjacentElement("beforeend", productDiv);

    let link = document.createElement("a");
    link.href = `/product/${product["id"]}`;
    link.classList.add("product-link");

    let photo = document.createElement("img");
    photo.alt = "photo";
    photo.src = `/public/img/${product["photo"]}`;
    photo.classList.add("product-img");

    link.insertAdjacentElement("beforeend", photo);

    let name = document.createElement("p");
    name.classList.add("product-name");
    name.innerText = product["name"];

    link.insertAdjacentElement("beforeend", name);

    productDiv.insertAdjacentElement("beforeend", link);

    let price = document.createElement("p");
    price.classList.add("product-price");
    price.innerText = product["price"];

    let hryvniaSign = document.createElement("span");
    hryvniaSign.classList.add("hryvnia-sign");
    hryvniaSign.innerText = "₴";

    price.insertAdjacentElement("beforeend", hryvniaSign);

    productDiv.insertAdjacentElement("beforeend", price);

    let shortDescription = document.createElement("p");
    shortDescription.classList.add("short-description");
    shortDescription.innerText = product["shortDescription"];

    productDiv.insertAdjacentElement("beforeend", shortDescription);

    return capsule;
}

init().then();