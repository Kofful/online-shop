async function buyProduct(id)
{
    const result = await fetch(`/product/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    });
    console.log(await result.text());
    //window.location.reload();
}