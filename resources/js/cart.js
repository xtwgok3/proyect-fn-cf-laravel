function confirmDelete() {
    return confirm("Are you sure you want to delete this item ?");
}

Array.from(document.querySelectorAll('.addToCart')).forEach(function(element) {
    element.addEventListener('click', function() {
        const product = this.getAttribute('data-id');

        fetch(`/add-to-cart/${product}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                },
                body: JSON.stringify({
                    quantity: 1
                })
            })
            .then(resposse => resposse.text())
            .then(data => {
                document.getElementById('cart-icon').innerHTML = data;
            });
    });
});