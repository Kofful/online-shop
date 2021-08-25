async function loadProducts()
{
    let response = await fetch(`/products${window.location.search}`);
    return response.json();
}

export async function init()
{
    let response = await loadProducts();
    let loader = document.querySelector("#loader");

    let container = document.createElement("div");
    container.classList.add("product-container");
    response.data.forEach(product => {
        container.insertAdjacentElement("beforeend", makeProductLayout(product));
    });

    loader.replaceWith(container);
    container.insertAdjacentElement("afterend", makeButtonsLayout(response, response));
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
    shortDescription.innerText = product["short_description"];

    productDiv.insertAdjacentElement("beforeend", shortDescription);

    return capsule;
}

function makeButtonsLayout(data)
{
    let pageButtons = document.createElement("div");
    pageButtons.classList.add("load-more-container");

    if (data.currentPage > 1) {
        let query = new URLSearchParams(window.location.search);
        query.set("page", (data.currentPage - 1).toString());
        let buttonPrev = document.createElement("a");
        buttonPrev.classList.add.apply(
            buttonPrev.classList,
            ["btn", "btn-success", "btn-load-more"]
        );
        buttonPrev.href = `/catalog?${query}`;
        buttonPrev.innerText = "Назад";

        pageButtons.insertAdjacentElement("beforeend", buttonPrev);
    }

    if (data.hasMorePages) {
        let query = new URLSearchParams(window.location.search);
        query.set("page", (data.currentPage + 1).toString());
        let buttonNext = document.createElement("a");
        buttonNext.classList.add.apply(
            buttonNext.classList,
            ["btn", "btn-success", "btn-load-more"]
        );
        buttonNext.href = `/catalog?${query}`;
        buttonNext.innerText = "Вперед";

        pageButtons.insertAdjacentElement("beforeend", buttonNext);
    }

    return pageButtons;
}

