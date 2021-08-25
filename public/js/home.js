import {makeProductLayout} from "./catalog"

async function loadProducts()
{
    let response = await fetch(`/brandnewproducts`);
    return response.json();
}

export async function init()
{
    let response = await loadProducts();
    let loader = document.querySelector("#loader");

    let container = document.createElement("div");
    container.classList.add("product-container");
    response.forEach(product => {
        container.insertAdjacentElement("beforeend", makeProductLayout(product));
    });

    loader.replaceWith(container);
}
