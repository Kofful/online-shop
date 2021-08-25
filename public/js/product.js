export async function buyProduct(id)
{
    const result = await fetch(`/product/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    });
    window.location.reload();
}

export async function getProductInfo() {
    const id = window.location.href.split("/")[4];
    const result = await fetch(`/productinfo/${id}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
    let json = await result.json();
    return json;
}