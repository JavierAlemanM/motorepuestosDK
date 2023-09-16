const processListCart = () =>{
    $('#productsCart').html('');
    let products = JSON.parse(localStorage.getItem('productos'));
    let sumaTotal = 0;
    products.forEach(product => {
        $('#productsCart').append(`
            <tr class="cart-table__row">
                <td class="cart-table__column cart-table__column--image">
                    <div class="image image--type--product">
                        <a href="producto_detalle" class="image__body">
                            <img class="image__tag" src="assets/images/products/producto.jpg" alt="">
                        </a>
                    </div>
                </td>
                <td class="cart-table__column cart-table__column--product">
                    <a href="#" class="cart-table__product-name">${product.producto}</a>
                </td>
                <td class="cart-table__column cart-table__column--price" data-title="precio">${monedaCop(product.precio)}</td>
                <td class="cart-table__column cart-table__column--quantity" data-title="unidades">
                    <div class="cart-table__quantity input-number">
                        <input class="form-control input-number__input" type="number" min="1" value="${product.cantidad}">
                        <div class="input-number__add"></div>
                        <div class="input-number__sub"></div>
                    </div>
                </td>
                <td class="cart-table__column cart-table__column--total" data-title="Total">${monedaCop(product.total)}</td>
                <td class="cart-table__column cart-table__column--remove">
                    <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                        <svg width="12" height="12">
                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                C11.2,9.8,11.2,10.4,10.8,10.8z">
                            </path>
                        </svg>
                    </button>
                </td>
            </tr>
        `);

        sumaTotal = sumaTotal+product.total;

        $("#subTotal").html("");
        $("#totalFinal").html("");
        $("#subTotal").html(monedaCop(sumaTotal));
        $("#totalFinal").html(monedaCop(sumaTotal));

    });

}

let products = JSON.parse(localStorage.getItem('productos'));
console.log(products);

function unificarProductos(array) {
    const productosUnificados = [];
  
    array.forEach((producto) => {
      const index = productosUnificados.findIndex((p) => p.codigo === producto.codigo);
  
      if (index === -1) {
        productosUnificados.push({ ...producto });
      } else {
        productosUnificados[index].cantidad = String(
          parseInt(productosUnificados[index].cantidad) + parseInt(producto.cantidad)
        );
        productosUnificados[index].total += producto.total;
      }
    });
  
    return productosUnificados;
  }

  const productosUnificados = unificarProductos(products);
console.log(productosUnificados);
processListCart();