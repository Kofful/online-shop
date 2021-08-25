import {makeProductLayout} from "./cart";

async function loadProducts()
{
    let response = await fetch(`/historyproducts`);
    return response.json();
}

export async function init()
{
    let response = await loadProducts();
    let loader = document.querySelector("#loader");

    if(!response.length) {
        let container = document.createElement("div");
        container.classList.add("no-products");
        container.innerText = "Пока нет покупок";

        loader.replaceWith(container);
    } else {
        let container = document.createElement("div");
        container.classList.add("cart-container");
        response.forEach(product => {
            container.insertAdjacentElement("beforeend", makeProductLayout(product));
        });

        loader.replaceWith(container);
    }
    return response;
}
