async function buyProducts()
{
    await fetch("/buycart", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    });
    window.location.reload();
}

async function loadProducts()
{
    let response = await fetch(`/cartproducts`);
    return response.json();
}

export async function init()
{
    let response = await loadProducts();
    let loader = document.querySelector("#loader");

    if(!response.length) {
        let container = document.createElement("div");
        container.classList.add("no-products");
        container.innerText = "Корзина пуста";

        loader.replaceWith(container);
    } else {
        let container = document.createElement("div");
        container.classList.add("cart-container");
        response.forEach(product => {
            container.insertAdjacentElement("beforeend", makeProductLayout(product));
        });

        let button = document.createElement("button");
        button.classList.add.apply(
            button.classList,
            ["btn", "btn-success", "btn-order"]
        );
        button.innerText = "Заказать";
        button.addEventListener("click", buyProducts);

        container.insertAdjacentElement("beforeend", button);

        loader.replaceWith(container);
    }
    return response;
}

export function makeProductLayout(product)
{
    let capsule = document.createElement("div");
    capsule.classList.add("cart-product");

    let productDiv = document.createElement("div");
    productDiv.classList.add("d-flex");

    let photo = document.createElement("img");
    photo.alt = "Computer";
    photo.src = `/public/img/${product["photo"]}`;
    photo.classList.add("cart-img");

    productDiv.insertAdjacentElement("beforeend", photo);

    let link = document.createElement("a");
    link.href = `/product/${product["id"]}`;
    link.innerText = product["name"];

    productDiv.insertAdjacentElement("beforeend", link);

    capsule.insertAdjacentElement("beforeend", productDiv);

    let price = document.createElement("p");
    price.classList.add("cart-product-price");
    price.innerText = product["price"];

    let hryvniaSign = document.createElement("span");
    hryvniaSign.classList.add("hryvnia-sign");
    hryvniaSign.innerText = "₴";

    price.insertAdjacentElement("beforeend", hryvniaSign);

    capsule.insertAdjacentElement("beforeend", price);

    return capsule;
}
