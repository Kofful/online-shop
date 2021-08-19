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